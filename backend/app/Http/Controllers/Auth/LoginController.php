<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->type == 'department_admin') {
                return redirect()->intended('/departments/home');
            } else if (auth()->user()->type == 'attachee') {
                return redirect()->intended('/attachee/home');
            } else if (auth()->user()->type == 'dipca_admin') {
                return redirect()->intended('/dipca/home');
            } else if (auth()->user()->type == 'central_services_admin') {
                return redirect()->intended('/central-services/home');
            } else {
                return redirect()->intended(route('home'));
            }
        } else {
            // if unsuccessful, then redirect back to the login with the form data
            return back()->with(
                'error',
                'The provided credentials do not match our records.'
            )->onlyInput('email');
        }

    }
}