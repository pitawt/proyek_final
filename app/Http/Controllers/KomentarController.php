<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\KomentarModel;


class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'nama'=>'required',
            'rating'=>'required',
            'komentar'=> 'required|min:5'
        ]);
        $validateData['film_id'] = $request->film_id;
        KomentarModel::create($validateData);
        return redirect('/film/')->with('success', 'Comment has been added!');
    }
}
