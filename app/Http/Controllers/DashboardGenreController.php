<?php

namespace App\Http\Controllers;

use App\Models\GenreModel;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layout_admin.genre.view',[
            "title" =>"Data Genre",
            "genres" => GenreModel::all()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout_admin.genre.input',[
            "title" =>"Data Genre"
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
            'nama'=>'required',
            'slug'=>'required|unique:genre'
        ]);
        $validateData['user_id'] = auth()->user()->id;
        GenreModel::create($validateData);
        return redirect('/dashboard/genre')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GenreModel  $genreModel
     * @return \Illuminate\Http\Response
     */
    public function show(GenreModel $genreModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GenreModel  $genreModel
     * @return \Illuminate\Http\Response
     */
    public function edit(GenreModel $genre)
    {
        return view('layout_admin.genre.edit',[
            "title" =>"Data Film",
            "genre" => $genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GenreModel  $genreModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GenreModel $genre)
    {
        $rules =  [
            'nama'=> 'required|min:4'
        ];

        if($request->slug != $genre->slug)
        {
            $rules['slug'] = 'required|unique:genre';
        }
        $validateData = $request->validate($rules);
        GenreModel::where('id',$genre->id)->update($validateData);
        return redirect('/dashboard/genre')->with('success', 'New Data has been updated!');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GenreModel  $genreModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenreModel $genre)
    {
        GenreModel::destroy($genre->id);
        return redirect('/dashboard/genre')->with('success', 'New Data has been deleted!');
    }

  

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(GenreModel::class,'slug', $request->nama);
        return response()->json(['slug'=>$slug]);
    }



}
