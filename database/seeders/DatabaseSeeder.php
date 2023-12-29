<?php

namespace Database\Seeders;
use app\Models\User;
use app\Models\Category;
use app\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::Factory()->create();
        \App\Models\Post::Factory(5)->create([
            'user_id'=> $user->id
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
