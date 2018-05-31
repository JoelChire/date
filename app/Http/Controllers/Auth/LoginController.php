<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

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
      protected $redirectTo = '/docentes';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
        if (auth()->user()->role==0) {
            return '/administrador';
        }
        elseif (auth()->user()->role==1) {
            return '/coordinador';
        }
        elseif (auth()->user()->role==2) {
            return '/tutor';
        }
        elseif (auth()->user()->role==3) {
            return '/docentes';
        }
        elseif (auth()->user()->role==4) {
            return '/estudiantes';
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
