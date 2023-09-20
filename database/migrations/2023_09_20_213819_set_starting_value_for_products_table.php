<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetStartingValueForProductsTable extends Migration
{
    public function up()
    {
        DB::statement('DBCC CHECKIDENT ("products", RESEED, 2000);');
    }

    public function down()
    {
        // Reverse migration logic (if needed)
    }
};
