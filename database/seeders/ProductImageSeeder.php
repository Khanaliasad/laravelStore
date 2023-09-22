<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use App\Models\ProductVariants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the number of images per product variant
        $imagesPerVariant = 5;

        // Use the ProductImage factory to create records
        ProductImage::factory()->count($imagesPerVariant * count(ProductVariants::all()))->create();
    }
}
