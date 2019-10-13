<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($username)
    {
        return $this->renderProfile($username);
    }

    public function profile()
    {
        return $this->renderProfile();
    }

    private function renderProfile($username = null)
    {
        $providers = ['github', 'facebook', 'instagram', 'twitter', 'linkedin'];
        $profile = $username ? User::where('username', $username)->firstOrFail() : auth()->user();
        $data = [
            'title' => $profile->name,
            'user' => $profile,
            'providers' => $providers,
        ];

        return view('theme::contents.profile', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Profile',
            'user' => auth()->user(),
        ];
        return view('theme::contents.profile', $data);
    }

    public function password()
    {
        $data = [
            'title' => 'Edit Password',
            'user' => auth()->user(),
        ];
        return view('theme::contents.profile', $data);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        if ($request->password) {
            $this->validate($request, [
                'password' => 'required|confirmed|string|min:6',
            ]);

            if ($this->updatePassword($user, $request)) {
                return redirect()->route('profile')->withAlert([
                    'type' => 'success',
                    'title' => 'Your Password has been Successfully Updated',
                ]);
            }
        }


        $this->validate($request, User::validationRules($user->id));

        if ($request->phone[0] == 0) {
            $request->offsetSet('phone', ltrim($request->phone, '0'));
        }

        if (!str_contains($request->phone, '+62')) {
            $request->offsetSet('phone', '+62' . $request->phone);
        }

        $user->fill($request->all());

        if (!$user->save()) {
            abort('Maaf saat ini tidak dapat di proses');
            return false;
        }

        return redirect()->route('profile')->withAlert([
            'type' => 'success',
            'title' => 'Your Profile has been Successfully Updated',
        ]);
    }

    private function updatePassword($user, Request $request)
    {
        $user->password = bcrypt($request->password);
        return $user->save();
    }
}
