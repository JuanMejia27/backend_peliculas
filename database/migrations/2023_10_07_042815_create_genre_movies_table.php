<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('genre_movies', function (Blueprint $table) {
            $table->increments("id")->unsigned();
            $table->integer("id_genre")->unsigned();
            $table->integer("id_movie")->unsigned();
            $table->timestamps();

            $table->foreign("id_genre")->references("id")->on("genres");
            $table->foreign("id_movie")->references("id")->on("movies");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_movies');
    }
};
