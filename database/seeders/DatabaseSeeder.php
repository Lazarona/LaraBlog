<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(30)->create();

        \App\Models\User::factory()->create([
            'username' => 'Xavier',
            'email' => 'x@x.com',
            'email_verified_at' => now(),
            'password' => '12345678'
        ]);
        Post::factory(6)->create();
        /* 
        $postItemsFactory = Post::factory(10)->hasPost(10)->create();
        // Attach Users and Categories together
        Post::All()->each(function ($Post) use ($postItemsFactory) {
            $Post->postItemsFactory()->saveMany($postItemsFactory);
            //  Post::factory(5)->hasPost(3)->hasTask(6)->create();
            // PostSeeder::factory(6)->hasPost(3)->create(); 
        });
        */
    }
}
