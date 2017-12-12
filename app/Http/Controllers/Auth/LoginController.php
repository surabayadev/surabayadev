<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'user';
    }

    protected function credentials(Request $request)
    {
        $input = [
            'password' => $request->get('password'),
        ];

        if (!filter_var($request->get('user'), FILTER_VALIDATE_EMAIL) === false) {
            $input['email'] = $request->get('user');
        } else {
            $input['username'] = $request->get('user');
        }

        return $input;
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect('/');
    }
}
