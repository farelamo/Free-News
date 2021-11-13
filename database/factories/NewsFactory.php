<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'content' => implode($this->faker->paragraphs),
            'like_count' => $this->faker->randomNumber(),
            'is_posted' => $this->faker->boolean,
            'author_id' => User::factory(),
            'category_id' => Category::factory()
        ];
    }
}
