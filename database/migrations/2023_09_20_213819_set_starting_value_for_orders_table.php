<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class SetStartingValueForProductsTable extends Migration
{
    public function up()
    {
        DB::statement('DBCC CHECKIDENT ("orders", RESEED, 800);');
    }

    public function down()
    {
        // Reverse migration logic (if needed)
    }
};
