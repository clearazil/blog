<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => ucfirst($this->faker->words(3, true)),
            'lead' => $this->faker->paragraph(),
            'content' => $this->faker->paragraphs(3, true),
            'is_premium' => $this->faker->boolean(),
            'created_at' => $this->faker->dateTimeBetween('-2 years', '2020-11-01 00:00:00', 'Europe/Amsterdam'),
        ];
    }
}
