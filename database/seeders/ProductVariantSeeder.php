<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of product variants
        $productVariantsCount = 5;

        $products = Product::all();

        // Loop through each product and create product variant
        foreach ($products as $product) {
            // Seed product variants
            ProductVariant::factory()
                ->count($productVariantsCount)
                ->create(['product_id' => $product->id]);
        };
    }
}
