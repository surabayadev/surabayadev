<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('theme::contents.register', $data);
    }

    public function register(Request $request)
    {
        app()->setLocale('id');
        $username = str_slug($request->get('name') .'-'. str_random(4));
        $request->offsetSet('username', $username);
        $this->validator($request->all())->validate();

        // Check if email already imported by check last_login_at equal to null
        // if found, instead of create new
        // Update that existing data with new input
        $user = User::where('email', $request->email)->whereNull('last_login_at')->first();
        if ($user) {
            $user->fill($this->fillUserData($request->all()));
            $user->save();
        } else {
            $user = User::create($this->fillUserData($request->all()));
            event(new Registered($user));
        }
        $user->sendEmailVerificationNotification();

        $this->guard()->login($user);

        // update last login
        $user->last_login_at = now();
        $user->save();

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|alpha_dash|max:255',
            // 'email' => 'required|string|email|max:255|unique:users',
            'email' => Rule::unique('users')->where(function ($query) {
                return $query->whereNotNull('last_login_at');
            }),
            'password' => 'required|string|min:6',
            'province' => 'sometimes|required',
            'city' => 'sometimes|required',
            'address' => 'sometimes|required',
            'phone' => 'required|numeric',
            'g-recaptcha-response' => 'recaptcha',
        ], [], [
            'name' => 'Nama Lengkap',
            'phone' => 'Telepon',
            'email' => 'Alamat Email',
        ]);
    }

    protected function fillUserData(array $data)
    {
        return [
            'name' => $data['name'],
            'role_id' => Role::USER,
            'username' => $data['username'],
            'email' => $data['email'],
            'province' => array_get($data, 'province'),
            'city' => array_get($data, 'city'),
            'address' => array_get($data, 'address'),
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ];
    }
}
