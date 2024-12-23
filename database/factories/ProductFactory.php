<?php

namespace Database\Factories;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => ucfirst(fake()->word()) . ' ' . ucfirst(fake()->word()), // Combining two words
            'price' => fake()->randomFloat(2, 1, 100),
            'details' => fake()->text(100),
            'category_id' => 3,
            'image_link' => 'images/1734791422_T-Shirt.png'
        ];
    }
}
