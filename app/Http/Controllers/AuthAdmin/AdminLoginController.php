<?php

namespace App\Http\Controllers\AuthAdmin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','logoutAdmin');
    }

    public function showLoginForm()
    {
        return view('AdminPanel.login');
    }

    public function login(Request $request)
    {
        $this->validate($request ,[
            'email' =>'required|email',
            'password' => 'required|min:6'
        ]);
        if( Auth::guard('admin')->attempt(['email' =>$request->email ,'password' =>$request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));

   }

    public function logout(Request $request)
    {


        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'admin.login' ));
    }


    public function logoutAdmin()
    {
        Auth::guard('admin') ->logout();
        return redirect('/');
    }

}
