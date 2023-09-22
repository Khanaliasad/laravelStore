<?php

namespace Database\Factories;

use App\Models\ProductVariants;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_variant_id' => ProductVariants::factory(),
            'image_path' => '/img/content/product' . $this->faker->unique(true)->numberBetween(1, 12) . '.png',
        ];
    }
}
