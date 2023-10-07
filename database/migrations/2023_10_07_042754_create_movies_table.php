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
        Schema::create('movies', function (Blueprint $table) {
            $table->increments("id")->unsigned();
            $table->string("title");
            $table->string("description");
            $table->string("image");
            $table->string("duration");
            $table->integer("id_clasification")->unsigned();
            $table->timestamps();

            $table->foreign("id_clasification")->references("id")->on("clasifications");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
