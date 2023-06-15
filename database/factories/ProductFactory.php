<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        $categories = Category::pluck('category')->toArray();
        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween(10,10000),
            'desc' => fake()->text(),
            'img' => fake()->imageUrl(),
            'category' => fake()->randomElement($categories)
        ];
    }
}
