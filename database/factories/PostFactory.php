<?php

namespace Database\Factories;

use Illuminate\support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
        $title = fake()->realText(50);
        return [
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),

            'category_id' => Category::inRandomOrder()->value('id'),
            'title' => $title,
            'slug' => Str::slug($title) . '_' . fake()->unique()->numberBetween(100, 999),
            'body' => fake()->realText(400),
            'image' => null,
            'is_active' => fake()->boolean(80),
            'is_featured' => fake()->boolean(20),
            'created_at' => fake()->dateTimeBetween('-1 months', 'now'),
        ];
    }
}
