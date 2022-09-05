<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register',[
            "title" =>"Register"

        ]);
    }

    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'name'=>'required',
            'email'=>'required|email:dns|unique:users',
            'password'=> 'required|min:5'
        ]);
       $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        return redirect('/login')->with('success', 'Registration successful! Please Login.');
    }
}
