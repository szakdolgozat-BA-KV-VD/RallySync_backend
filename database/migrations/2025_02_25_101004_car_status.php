<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    DB::unprepared('
    CREATE TRIGGER carStatusChange 
    AFTER INSERT ON compeets 
    FOR EACH ROW 
    BEGIN 
        UPDATE cars SET status = 4 WHERE cid = NEW.car; 
    END
');
}

public function down(): void
{
    DB::unprepared('DROP TRIGGER IF EXISTS carStatusChange');
}

};
