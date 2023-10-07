<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $table = 'sells';

    protected $fillable = [
        "id",
        "id_user",
        "id_ticket",
        "quantity",
        "total"
    ];
}
