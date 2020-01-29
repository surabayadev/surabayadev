<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserSocial;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    public function redirectToProvider($socialName)
    {
        if ($socialName === 'github') {
            return Socialite::driver($socialName)
                ->scopes(['read:user', 'public_repo'])
                ->redirect();
        }

        if ($socialName === 'facebook') {
            return Socialite::driver($socialName)->redirect();
        }
    }

    /**
     * Obtain the user information from Social Account
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($socialName)
    {
        try {
            $provider = Socialite::driver($socialName);
            $providerUser = $provider->user();

            // TODO:
            // 1. Social Account is exists, make user login
            $userSocial = $this->checkUserSocial($providerUser, $socialName);
            if ($userSocial) {
                $this->loginBySocialAccount($userSocial, $providerUser);
                return redirect()->route('profile');
            }

            // 2. Social Account doesn't exists, register it then associate it to the user
            $user = $this->createSocial($providerUser, $socialName);

            if (auth()->user()) {
                $routeName = 'profile';
                $message = "Your {$socialName} account connected successfully";
            } else {
                auth()->login($user);
                $routeName = 'profile.edit';
                $message = "You already success login by {$socialName}. Now complete your profile details.";
            }

            return redirect()->route($routeName)->withAlert([
                'type' => 'success',
                'title' => $message,
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function checkUserSocial($providerUser, $socialName)
    {
        $userSocial = UserSocial::with('user')
            ->where('provider', $socialName)
            ->where('provider_id', $providerUser->getId())
            ->first();

        if ($userSocial && $userSocial->user) {
            return $userSocial;
        }

        return false;
    }

    private function loginBySocialAccount(UserSocial $userSocial, $providerUser)
    {
        if (!auth()->check()) {
            auth()->login($userSocial->user);
        }
    }

    private function createSocial($providerUser, $socialName)
    {
        // $token = $providerUser->token;
        // $tokenSecret = $providerUser->tokenSecret;

        // 1. Create UserSocial
        $userSocial = new UserSocial([
            'token' => $providerUser->token,
            'provider' => $socialName,
            'provider_id' => $providerUser->getId(),
            'email' => $providerUser->getEmail(),
            'avatar' => $providerUser->getAvatar(),
        ]);

        // 2. If there are logged in user
        // Connect to that logged in user
        if ($auth = auth()->user()) {
            $auth->socials()->save($userSocial);
            return $auth;
        }

        // 2.1 If there is NO logged in user
        // Create user based on Social Email, then associate it, then login.
        $user = User::where('email', $providerUser->getEmail())->first();
        if (!$user) {
            $user = $this->createUser($providerUser, $socialName);
        }

        // 3. associate to the social account if doesn't exists
        if (!$user->hasSocial($socialName)) {
            $user->socials()->save($userSocial);
        }

        return $user;
    }

    private function createUser($providerUser, $socialName)
    {
        $username = $providerUser->getNickname() ?: str_slug($providerUser->getName());
        $userData = [
            'role_id' => Role::USER,
            'email' => $providerUser->getEmail(),
            'name' => $providerUser->getName(),
            'username' => $username . '-' . mt_rand(10, 100),
            'password' => bcrypt(str_random(10)),
        ];

        if ($socialName === 'github') {
            $userData['github'] = $providerUser->getNickname();
        } elseif ($socialName === 'facebook') {
            $userData['facebook'] = $providerUser->getNickname();
        }

        $user = User::create($userData);
        $user->markEmailAsVerified();

        return $user;
    }
}
