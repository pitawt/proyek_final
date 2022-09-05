<?php

namespace App\Http\Controllers;

use App\Models\FilmModel;
use App\Models\GenreModel;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layout_admin.film.view',[
            "title" =>"Data Film",
            "films" => FilmModel::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout_admin.film.input',[
            "title" =>"Data Film",
            "genres"=>GenreModel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'judul'=>'required',
            'slug'=>'required|unique:film',
            'tahun'=> 'required|min:4|integer',
            'genre_id'=> 'required',
            'poster' =>'image|file|max:2048',
            'ringkasan'=> 'required'
        ]);
        if($request->file('poster'))
        {
            $validateData['poster'] = $request->file('poster')->store('poster'); //store('poster') = nama folder
        }
        $validateData['user_id'] = auth()->user()->id;
        FilmModel::create($validateData);
        return redirect('/dashboard/film')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FilmModel  $filmModel
     * @return \Illuminate\Http\Response
     */
    public function show(FilmModel $film)
    {
        return view('layout_admin.film.detail',[
            "title" =>"Data Film",
            "film" => $film
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilmModel  $filmModel
     * @return \Illuminate\Http\Response
     */
    public function edit(FilmModel $film)
    {
        return view('layout_admin.film.edit',[
            "title" =>"Data Film",
            "film" => $film,
            "genres"=>GenreModel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilmModel  $filmModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FilmModel $film)
    {
        $rules =  [
            'judul'=>'required',
            'tahun'=> 'required|min:4',
            'poster' =>'image|file|max:2048',
            'genre_id'=> 'required'
        ];

        if($request->slug != $film->slug)
        {
            $rules['slug'] = 'required|unique:film';
        }
        $validateData = $request->validate($rules);
        if($request->file('poster')) //harus ditaruh dibawah validasi
        {
            if($request->oldPoster)
            {
                Storage::delete($request->oldImage);
            }
            $validateData['poster'] = $request->file('poster')->store('poster'); //store('poster') = nama folder
        }
        $validateData['user_id'] = auth()->user()->id;
        FilmModel::where('id',$film->id)->update($validateData);
        return redirect('/dashboard/film')->with('success', 'New Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilmModel  $filmModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FilmModel $film)
    {
        if($film->poster)
        {
            Storage::delete($film->poster);
        }
        FilmModel::destroy($film->id);
        return redirect('/dashboard/film')->with('success', 'New Data has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(FilmModel::class, 'slug', $request->judul);
        return response()->json(['slug'=>$slug]);
    }
}
