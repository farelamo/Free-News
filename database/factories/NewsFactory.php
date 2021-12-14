<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence;
        $hash = dechex(crc32($title));

        return [
            'title' => $title,
            'image' => $this->faker->imageUrl,
            'content' => implode($this->faker->paragraphs),
            'like_count' => $this->faker->randomNumber(),
            'is_posted' => $this->faker->boolean,
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => Str::slug(Str::of($title)->substr(0, 64)) . '-' . $hash
        ];
    }
}
