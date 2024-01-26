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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id('episode_id');
            $table->boolean('watched')->default(false);
            $table->unsignedBigInteger('season_id');
            $table->unsignedTinyInteger('episode_number');
            $table->foreign('season_id')->references('season_id')->on('seasons')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
