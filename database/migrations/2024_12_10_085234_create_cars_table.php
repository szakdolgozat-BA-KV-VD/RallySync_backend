<?php

use App\Models\Car;
use Illuminate\Support\Facades\DB;
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
        Schema::create('cars', function (Blueprint $table) {
            $table->id('cid');
            $table->foreignId('brandtype') -> references('bt_id')->on('brandtypes');
            $table->foreignId('category') -> references('categ_id')->on('categories');
            $table->foreignId('status')-> references('stat_id')->on('statuses');
            $table->timestamps();
        });

        /* Car::create([ 
            'brandtype'=> 3,
            'category' => 1,
            'status' => 1
        ]);

        Car::create([ 
            'brandtype'=> 5,
            'category' => 2,
            'status' => 3
        ]);

        Car::create([ 
            'brandtype'=> 7,
            'category' => 1,
            'status' => 4
        ]);

        Car::create([ 
            'brandtype'=> 6,
            'category' => 2,
            'status' => 1
        ]);

        Car::create([ 
            'brandtype'=> 3,
            'category' => 2,
            'status' => 1
        ]);

        Car::create([ 
            'brandtype'=> 1,
            'category' => 2,
            'status' => 1
        ]);

        Car::create([ 
            'brandtype'=> 4,
            'category' => 3,
            'status' => 2
        ]); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
