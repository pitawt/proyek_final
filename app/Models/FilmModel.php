<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class FilmModel extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'film';
    protected $with = ['genre','user'];

    protected $fillable = ['judul','ringkasan','tahun','poster','genre_id','user_id','slug'];

    public function genre() //menghubungkan dengan table genre
    {
        return $this->belongsTo(GenreModel::class,'genre_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function komentar() //menghubungkan dengan table komentar 
    {
        return $this->hasMany(KomentarModel::class,'film_id');
    }
    

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
