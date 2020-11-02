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
        $categories = Category::factory()->count(3)->create();

        User::factory()
            ->times(5)
            ->has(
                Post::factory()
                    ->has(Comment::factory()->count(4))
                    ->count(3)
                    ->afterCreating(function (Post $post) use ($categories) {
                        foreach ($categories as $category) {
                            $post->categories()->attach($category->id);
                        }
                    })
            )
            ->create();
    }
}
