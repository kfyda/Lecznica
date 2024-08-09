<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(rand(1,3), true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'price' => fake()->randomFloat(2, 0, 200),
            'image_path' => fake()->imageUrl,
            'description' => fake()->realText(500),
            'is_available' => fake()->boolean(80)
        ];
    }
}
