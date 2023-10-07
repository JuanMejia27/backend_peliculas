<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorMovie extends Model
{
    use HasFactory;
    protected $table = 'actor_movies';

    protected $fillable = [
        "id",
        "id_actor",
        "id_movie"
    ];
}
