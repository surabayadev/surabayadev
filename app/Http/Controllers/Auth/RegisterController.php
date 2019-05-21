<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';

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
        $request->offsetSet('username', str_slug($request->get('name')));
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'province' => 'sometimes|required',
            'city' => 'sometimes|required',
            'address' => 'sometimes|required',
            'phone' => 'required|numeric',
        ], [], [
            'name' => 'Nama Lengkap',
            'phone' => 'Telepon',
            'email' => 'Alamat Email',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'role_id' => Role::USER,
            'username' => $data['username'],
            'email' => $data['email'],
            'province' => array_get($data, 'province'),
            'city' => array_get($data, 'city'),
            'address' => array_get($data, 'address'),
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
