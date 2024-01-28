<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => 'https://source.unsplash.com/random',
            'alt' => fake()->sentence(10),
            'desc' => fake()->sentence(10),
            'post_id' => Post::inRandomOrder()->first()->id
        ];
    }
}
