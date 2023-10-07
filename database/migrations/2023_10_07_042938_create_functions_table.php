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
        Schema::create('functions', function (Blueprint $table) {
            $table->increments("id")->unsigned();
            $table->integer("id_movie")->unsigned();
            $table->integer("id_room")->unsigned();
            $table->dateTime("date");
            $table->timestamps();

            $table->foreign("id_movie")->references("id")->on("movies");
            $table->foreign("id_room")->references("id")->on("rooms");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('functions');
    }
};
