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
        $title = fake()->unique()->words(rand(3, 10), true);
        $slug = now()->timestamp . '-' . Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'image_path' => $this->generateImagePaths(),
            'description' => fake()->realText(6400),
            'created_at' => fake()->dateTimeBetween('-36 months')
        ];
    }

    private function generateImagePaths(): array
    {
        $images = [];
        $imageCount = rand(1, 5);

        for ($i = 0; $i < $imageCount; $i++) {
            $images[] = fake()->imageUrl();
        }

        return $images;
    }
}
