<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
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
            'description' => $this->faker->paragraphs(3, true),
            'weight' => $this->faker->randomFloat(2, 0.1, 10),
            'category_id' => \App\Models\Category::factory(), // Create a related category
        ];
    }
}
