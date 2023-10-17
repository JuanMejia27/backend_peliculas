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
        Schema::create('genre_series', function (Blueprint $table) {
            $table->increments("id")->unsigned();
            $table->integer("id_genre")->unsigned();
            $table->integer("id_serie")->unsigned();
            $table->timestamps();

            $table->foreign("id_genre")->references("id")->on("genres");
            $table->foreign("id_serie")->references("id")->on("series");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_series');
    }
};
