<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorSerie extends Model
{
    use HasFactory;
    protected $table = 'actor_series';

    protected $fillable = [
        "id",
        "id_actor",
        "id_serie"
    ];
}
