<?php
/**
 * @Author: Ifmuela
 * @Date:   2020-06-12 04:38:42
 * @Last Modified by:   Ifmuela
 * @Last Modified time: 2020-06-12 04:47:24
 */
 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = 'admin';
    protected function redirectTo()
    {
        if (auth()->user()->role == 'Super Admin' || auth()->user()->role == 'Admin') {

            if (auth()->user()->status == 0) return 'logout';

            return '/admin';
        } else if (auth()->user()->role == 'Manager') {

            if (auth()->user()->status == 0) return 'logout';
            
            return '/admin';
        } else {
            return 'logout';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
