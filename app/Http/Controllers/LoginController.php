<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use\App\Models\LoginModel;

class LoginController extends Controller
{
    public function index()
    {
        return view('login',[
            "title" =>"Login"

        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $validateData =  $request->validate([
            'email'=>'required|email',
            'password'=> 'required|min:5'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 
        return redirect('/');
    }
}
