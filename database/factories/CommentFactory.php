<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Post;
use app\Models\User;
use app\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
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
            'post_id'=> \App\Models\Post::Factory(),
            'user_id'=>\App\Models\User::Factory(),
            'body'=> \fake()->paragraph()
        ];
    }
}
