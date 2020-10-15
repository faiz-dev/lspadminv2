<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        $this->middleware('guest')->except('logout','keluar');
    }

    public function adminShowLogin()
    {
        return view('auth.adminlogin');
    }

    public function adminActionLogin(Request $request)
    {
        $credentials = (object) $request->only('username', 'password');        
        
        if (Auth::attempt(['email'=> $credentials->username, 'password' => $credentials->password])) {                        
            $user = Auth::user();
            if($user->hasRole(['Super Admin'])) {
                return redirect('/manager');
            } else {
                Auth::logout();
                return redirect('/');
            }
        } else {
            return redirect('/secret')->with('errors','Username/Password anda salah');
        }
    }


    public function memberShowLogin()
    {
        return view('auth.userlogin');
    }

    public function memberActionLogin(Request $request)
    {
        $credentials = (object) $request->only('username', 'password');        
        
        if (Auth::attempt(['email'=> $credentials->username, 'password' => $credentials->password])) {                        
            $user = Auth::user();
            if($user->hasRole(['Member'])) {
                return redirect('/member');
            } elseif($user->hasRole(['Asesor','Admin Jejaring'])) {
                return redirect('/manager');
            } else {
                Auth::logout();
                return redirect('/memberauth')->with('errors','Username/Password anda salah');  
            }
        } else {
            return redirect('/memberauth')->with('errors','Username/Password anda salah');            
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        return redirect('/');
    }
}
