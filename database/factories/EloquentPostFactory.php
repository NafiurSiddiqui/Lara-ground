<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EloquentPost>
 */
class EloquentPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence,
            "slug" => $this->faker->slug,
            "excerpt" => $this->faker->sentence,
            "body" => $this->faker->sentences,
            "category_id" => Category::factory(), //creates category and grabs the id
            "user_id" => User::factory() //creates user and grabs the id
        ];
    }
}
