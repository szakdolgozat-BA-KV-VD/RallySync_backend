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
        Schema::create('benevezs', function (Blueprint $table) {
            $table->id('versenyzo');
            $table->foreignId('verseny')->references('verseny_id')->on('versenys');
            $table->foreignId('kategoria')->references('kategoria')->on('kategorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benevezs');
    }
};
