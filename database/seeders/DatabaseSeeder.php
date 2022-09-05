<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FilmModel;
use App\Models\GenreModel;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

       User::factory(3)->create();

       User::create([
           'name' => 'Pita',
           'email'=> 'putuayupuspitawt@gmail.com',
           'password'=>bcrypt('masuk')
       ]);
       
        GenreModel::create([
            'nama' => 'Horor',
            'slug' => 'horor'
        ]);

        GenreModel::create([
            'nama' => 'Romance',
            'slug' => 'romance'
        ]);

        GenreModel::create([
            'nama' => 'Comedy',
            'slug' => 'comedy'
        ]);

        GenreModel::create([
            'nama' => 'Drama',
            'slug' => 'drama'
        ]);

        GenreModel::create([
            'nama' => 'Action',
            'slug' => 'action'
        ]);

        GenreModel::create([
            'nama' => 'Animation',
            'slug' => 'animasi'
        ]);

        GenreModel::create([
            'nama' => 'Musical',
            'slug' => 'musical'
        ]);

        GenreModel::create([
            'nama' => 'Fantasy',
            'slug' => 'fantasy'
        ]);

       

        
        FilmModel::create([
            'judul' => 'Pengabdi Setan',
            'slug' => 'pengabdi-setan',
            'ringkasan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'tahun' => '2022',
            'genre_id' => 1,
            'user_id' =>1,
            'poster' => ""
        ]);

        FilmModel::create([
            'judul' => 'Mencuri Raden Saleh',
            'slug' => 'mencuri-raden-saleh',
            'ringkasan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'tahun' => '2022',
            'genre_id' => 2,
            'user_id' =>1,
            'poster' => ""
        ]);

        FilmModel::create([
            'judul' => 'Radiya Dika',
            'slug' => 'raditya-dika',
            'ringkasan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'tahun' => '2022',
            'genre_id' => 3,
            'user_id' =>1,
            'poster' => ""
        ]);

        FilmModel::create([
            'judul' => 'Harry Potter',
            'slug' => 'harry-potter',
            'ringkasan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'tahun' => '2022',
            'genre_id' => 2,
            'user_id' =>1,
            'poster' => ""
        ]);

        FilmModel::create([
            'judul' => 'Facebook',
            'slug' => 'facebook',
            'ringkasan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'tahun' => '2022',
            'genre_id' => 3,
            'user_id' =>1,
            'poster' => ""
        ]);

        FilmModel::create([
            'judul' => 'Laskar Pelangi',
            'slug' => 'laskar-pelangi',
            'ringkasan' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'tahun' => '2018',
            'genre_id' => 4,
            'user_id' =>1,
            'poster' => ""
        ]);

        
    }
}
