<?php

use App\Models\Permission;
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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id('perm_id');
            $table->string('permission');
            $table->timestamps();
        });

        Permission::create([
            'permission' => 'versenyző',
        ]);
        Permission::create([
            'permission' => 'szervező',
        ]);
        Permission::create([
            'permission' => 'adminisztrátor',
        ]);
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
