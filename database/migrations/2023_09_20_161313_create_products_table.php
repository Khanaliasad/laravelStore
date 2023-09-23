<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->start_from(2000);
            $table->string('SKU');
            $table->string('name');
            $table->string('fabric')->nullable();
            $table->text('description');
            $table->decimal('weight', 10, 2)->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('categories');
        });
        DB::statement('ALTER TABLE products AUTO_INCREMENT = 2000');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
