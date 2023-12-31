<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EloquentPost>
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
            "title" => $this->faker->sentence,
            "slug" => $this->faker->slug,
            "excerpt" =>'<p>'. implode('<p></p>', $this->faker->paragraphs(2)). '</p>',
            "body" =>'<p>'. implode('<p></p>', $this->faker->paragraphs(6)). '</p>',
            //Builds the relationship 👇
            "user_id" => User::factory(), //creates user and grabs the id
            "category_id" => Category::factory(), //creates category and grabs the id
        ];
    }
}
