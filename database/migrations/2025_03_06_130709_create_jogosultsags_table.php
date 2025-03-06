<?php

use App\Models\Jogosultsag;
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
        Schema::dropIfExists('jogosultsags');
        Schema::create('jogosultsags', function (Blueprint $table) {
            $table->id('jogosultsag');
            $table->string('elnevezes')->unique();
            $table->timestamps();
        });

        Jogosultsag::create(['elnevezes' => 'versenyzo']);
        Jogosultsag::create(['elnevezes' => 'szervezo']);
        Jogosultsag::create(['elnevezes' => 'admin']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogosultsags');
    }


};
