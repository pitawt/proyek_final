<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\GenreModel;
class GenreController extends Controller
{
    public function index()
    {
        return view('genre.view',[
            "title" =>"Genre",
            "genres" => GenreModel::all()
        ]);
    }

    public function show(GenreModel $genre)
    {
        return view('genre.detail',[
            "title" => "genre",
            "genre" => $genre->nama,
            "films" => $genre->film, //method pada GenreController
            "category" =>$genre->nama
        ]);
    }
}
