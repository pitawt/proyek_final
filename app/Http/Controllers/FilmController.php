<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\FilmModel;
use\App\Models\KomentarModel;
class FilmController extends Controller
{
    public function index()
    {
        return view('film.view',[
            "title" =>"Film",
            "film" =>FilmModel::latest()->get(),
            "films" => FilmModel::paginate(4) 

        ]);
    }

    public function show(FilmModel $film)
    {
        return view('film.detail',[
            "title" =>"Film",
            "film" => $film,
            "komentars" => KomentarModel::where('film_id',$film->id)->get()
        ]);
    }
}
 

