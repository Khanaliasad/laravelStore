<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'SKU' => Str::random(10),
            'name' => $this->faker->sentence,
            'fabric' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'old_price' => $this->faker->randomFloat(2, 10, 100),
            'attribute' => $this->faker->randomElement(['sale', 'top', 'new', null, null, null, null]),
            'description' => $this->faker->paragraphs(10, true),
            'detail' => $this->faker->paragraphs(2, true),
            'weight' => $this->faker->randomFloat(2, 0.1, 10),
            'category_id' => \App\Models\Category::factory(), // Create a related category
        ];
    }
}
