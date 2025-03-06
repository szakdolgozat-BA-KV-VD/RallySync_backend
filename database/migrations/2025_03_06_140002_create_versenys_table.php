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
        Schema::create('versenys', function (Blueprint $table) {
            $table->id('verseny_id');
            $table->foreignId('helyszin')->references('helyszin')->on('helyszins');
            $table->foreignId('szervezo')->references('id')->on('users');
            $table->string('leiras');
            $table->date('mettol');
            $table->date('meddig');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versenys');
    }
};
