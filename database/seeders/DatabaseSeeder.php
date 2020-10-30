<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->times(5)
            ->has(
                Post::factory()
                    ->has(Category::factory()->count(3))
                    ->has(Comment::factory()->count(4))
                    ->count(3)
            )
            ->create();
    }
}
