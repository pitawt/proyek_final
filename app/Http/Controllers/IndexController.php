<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function awal()
    {
        return view('welcome',[
            "title" =>"Home"
        ]);
    }
}
