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
        Schema::create('versenyziks', function (Blueprint $table) {
            $table->id('verseny');
            $table->foreignId('versenyzo')->references('id')->on('users');
            $table->foreignId('auto')->references('azon')->on('autos');
            $table->date('erkezik');
            $table->date('rajt_ido');
            $table->date('cel_ido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versenyziks');
    }
};
