<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    use HasFactory;
    protected $table = 'funtions';

    protected $fillable = [
        "id",
        "id_movie",
        "id_room",
        "date"
    ];
}
