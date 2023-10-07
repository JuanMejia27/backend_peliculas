<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $table = 'seats';

    protected $fillable = [
        "id",
        "id_room",
        "row",
        "column"
    ];
}
