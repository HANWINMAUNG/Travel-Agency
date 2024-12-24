<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
   
    public function showLoginForm()
    {
        return view('Auth.admin_login');
    }

    public function Login(Request $request)
    {  
        // dd(request()->all());
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12', 
         ]);
         if(auth()->guard('admin')->attempt($attributes))
          {
            return redirect()->route('admin.home');
          }
        return back()->withErrors(['email' => 'These credential does not match our records.']);
     }
    
     public function Logout()
     {
            Auth::guard('admin')->logout();
            return redirect()->route('get.admin.login');
      }   
    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::ADMINPANEL;

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest:admin_user')->except('logout');
    // }

    // protected function guard()
    // {
    //     return Auth::guard('admin_user');
    // }
    // public function showLoginForm()
    // {
    //     return view('auth.admin_login');
    // }
    // public function Login(Request $request)
    // {  
    //     $attributes = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6|max:12', 
    //      ]);
    //      if(auth()->guard('admin_user')->attempt($attributes))
    //       {
    //         return redirect($this->redirectTo);
    //       }
    //     return back()->withErrors(['email' => 'These credential does not match our records.']);
    //  }

    // public function Logout()
    // {
    //        Auth::guard('admin_user')->logout();
    //        return route('get.admin.login');
    // } 
    // /**
    //  * The user has been authenticated.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  mixed  $user
    //  * @return mixed
    //  */
    // // protected function authenticated(Request $request)
    // // {
        
    // //     return redirect($this->redirectTo);
    
    // // }
}