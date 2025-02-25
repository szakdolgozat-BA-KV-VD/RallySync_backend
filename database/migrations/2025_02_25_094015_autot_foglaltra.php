<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared(
            'CREATE TRIGGER autoAllapotFoglaltra AFTER INSERT ON compeets
                FOR EACH ROW
                    BEGIN 
                        UPDATE cars SET status = 2 WHERE cid = NEW.car;
                    END');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
