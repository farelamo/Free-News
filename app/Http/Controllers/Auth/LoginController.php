<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers; 
// (lokasi di vendor/laravel/framework/src/illuminate/Foundation/Auth/AuthenticatesUsers)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



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
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function sendLoginResponse(Request $request){
        $data = $request->input();
        if (Auth::attempt([
            'email' => $data['email'], 
            'password' => $data['password'],
            'is_verified' => '1'
        ])){
            return redirect('/admin/home')->with('toast_success', 'Anda berhasil Login ! !');
        }else {
            return redirect('/login')->with('warning', 'Akun belum di ACC ! !');
        }
    }
}