<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve all product variants
        $variants = ProductVariant::all();
        // Define the number of images per variant
        $imagesPerVariant = 5;

        // Loop through each product variant and create images
        foreach ($variants as $variant) {
            ProductImage::factory()
                ->count($imagesPerVariant)
                ->create(['product_variant_id' => $variant->id]);
        }
    }
}
