<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreSerie extends Model
{
    use HasFactory;
    protected $table = 'genre_series';

    protected $fillable = [
        "id",
        "id_genre",
        "id_serie"
    ];
}
