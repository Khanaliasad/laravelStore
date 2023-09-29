<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductVariant::class;
    public function definition(): array
    {
        return [
            'product_id' => function () {
                return Product::inRandomOrder()->first()->id;
            },
            'color' => $this->faker->randomElement(['Red', 'Green', 'Blue', 'Yellow']),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
        ];
    }
}
