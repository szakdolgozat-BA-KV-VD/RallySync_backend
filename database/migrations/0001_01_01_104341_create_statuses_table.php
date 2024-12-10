<?php

use App\Models\Status;
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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id('stat_id');
            $table->char('statsus'); //E = Elérhető | S = Szervíz | F = Foglalt | P = Pályán
            $table->timestamps();

            Status::create([ 
                'statsus'=> 'E', // Elérhető
            ]);
            Status::create([ 
                'statsus'=> 'S', // Szervíz
            ]);
            Status::create([ 
                'statsus'=> 'F', // Foglalt
            ]);
            Status::create([ 
                'statsus'=> 'P', // Pályán
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
