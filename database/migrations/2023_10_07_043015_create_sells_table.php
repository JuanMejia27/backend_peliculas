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
        Schema::create('sells', function (Blueprint $table) {
            $table->increments("id")->unsigned();
            $table->integer("id_user")->unsigned();
            $table->integer("id_ticket")->unsigned();
            $table->integer("quantity");
            $table->float("total");
            $table->timestamps();

            $table->foreign("id_user")->references("id")->on("users");
            $table->foreign("id_ticket")->references("id")->on("tickets");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
