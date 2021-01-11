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
        // R: gebruik aparte seeder bestanden / classes per onderwerp, niet alle seeders in 1 bestand,
        // voor meer structuur / beter overzicht / meer mogelijkheden (seeders afzonderlijk kunnen uitvoeren)
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

        User::factory()
            ->times(1)
            ->has(Post::factory()->count(2))
            ->create();
    }
}
