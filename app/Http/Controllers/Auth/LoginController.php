<?php

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
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo() {
        if(auth()->user()->role=='visitor') {
            $redirectTo = RouteServiceProvider::VISITOR;
        } else if(auth()->user()->role=='administrator') {
            $redirectTo = RouteServiceProvider::HOME;
        } else if(auth()->user()->role=='approver') {
            $redirectTo = RouteServiceProvider::APPROVER;
        } else if(auth()->user()->role=='transactor') {
            $redirectTo = RouteServiceProvider::TRANSACTOR;
        } else {
            $redirectTo = back();
        }
        return $redirectTo;
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
