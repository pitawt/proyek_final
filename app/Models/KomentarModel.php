<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarModel extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $with = ['film'];
    protected $fillable = ['nama','film_id','rating','komentar'];
    
    public function film() //menghubungkan dengan table genre
    {
        return $this->belongsTo(FilmModel::class,'film_id');
    }

    
}
