<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class GenreModel extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'genre';
    protected $fillable = ['nama','slug'];

    public function film() //menghubungkan dengan table film 
    {
        return $this->hasMany(FilmModel::class,'genre_id');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    } 
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
