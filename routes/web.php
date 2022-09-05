<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardFilmController;
use App\Http\Controllers\DashboardGenreController;
use App\Http\Controllers\KomentarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/',[IndexController::class, 'awal']);
Route::get('/',[FilmController::class, 'index']);
Route::get('/film',[FilmController::class, 'index']);
Route::get('/film/{film:slug}',[FilmController::class, 'show']); //detail film


Route::get('/genre',[GenreController::class, 'index']);
Route::get('/genre/{genre:slug}',[GenreController::class, 'show']);

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/logout',[LoginController::class, 'logout']);
Route::post('/login',[LoginController::class, 'auth']);
Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard',function(){
    return view('layout_admin.index',[
        "title" =>"Dashboard"
    ]);
})->middleware('auth');

Route::get('/dashboard/film/checkSlug',[DashboardFilmController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/film',DashboardFilmController::class)->middleware('auth');


Route::get('/dashboard/genre/checkSlug',[DashboardGenreController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/genre',DashboardGenreController::class)->middleware('auth');


Route::get('/komentar',[KomentarController::class, 'index']);
Route::post('/komentar',[KomentarController::class, 'store']);

