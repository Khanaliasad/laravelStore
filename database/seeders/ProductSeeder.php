<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of products per category
        $productsPerCategory = 10;

        // Seed products for each category
        \App\Models\Category::all()->each(function ($category) use ($productsPerCategory) {
            Product::factory($productsPerCategory)->create(['category_id' => $category->id]);
        });
    }
}
