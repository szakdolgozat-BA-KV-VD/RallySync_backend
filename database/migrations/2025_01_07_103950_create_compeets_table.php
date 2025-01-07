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
        Schema::create('compeets', function (Blueprint $table) {
            $table->id('cs_id');
            $table->foreignId('competition')->references('comp_id')->on('competitions');
            $table->foreignId('competitor')->references('id')->on('users');
            $table->foreignId('car')->references('cid')->on('cars');
            $table->date('arrives_at');
            $table->date('start_date');
            $table->date('finish_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compeets');
    }
};
