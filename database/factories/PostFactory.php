<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\User;
use app\Models\Category;

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
        return [
            //
            'user_id'=>\App\Models\User::Factory(),
            'category_id'=> \App\Models\Category::Factory(),
            'title' => fake()->sentence(),
            'slug'=> fake()->slug(3),
            'excerpt' => fake()->sentence(),
            'body' => fake()->paragraph(),

        ];
    }
}
