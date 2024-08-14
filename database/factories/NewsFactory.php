<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(rand(3,10), true);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'image_path' => fake()->imageUrl,
            'description' => fake()->realText(6400),
            'created_at' => fake()->dateTimeBetween('-36 months')
        ];
    }
}
