<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariants;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductVariantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ProductVariants::class;
    public function definition(): array
    {
        return [
            'product_id' => function () {
                return Product::inRandomOrder()->first()->id;
            },
            'color' => $this->faker->randomElement(['Red', 'Green', 'Blue', 'Yellow']),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
        ];
    }
}
