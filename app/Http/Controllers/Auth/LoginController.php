<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('theme::contents.login', $data);
    }

    protected function authenticated(Request $request, $user)
    {
        // update last login
        $user->last_login_at = now();
        $user->save();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }
}
