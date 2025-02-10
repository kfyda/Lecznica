<?php

namespace Database\Factories;

use App\Enums\AnimalTypes;
use App\Enums\CategoryTypes;
use App\Models\Animal;
use App\Models\Category;
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
        $name = fake()->unique()->words(rand(1, 3), true);
        $slug = now()->timestamp . '-' . Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            // 'price' => fake()->randomFloat(2, 0, 200),
            'category_id' => Category::inRandomOrder()->first()->id,
            'animal_id' => Animal::inRandomOrder()->first()->id,
            'image_path' => fake()->imageUrl,
            'description' => fake()->realText(500),
            'is_available' => fake()->boolean(80),
            'created_at' => fake()->dateTimeBetween('-36 months')
        ];
    }
}
