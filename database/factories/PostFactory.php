<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6); 

        return [
            'user_id' => 1, 
            'title' => $title,
            'subtitle' => fake()->sentence(3),
            'slug' => Str::slug($title),
            'body' => fake()->paragraphs(10, true),
            'image' => null, 
            'published_at' => now(),
        ];
    }
}