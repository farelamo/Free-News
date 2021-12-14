<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->userName;
        $hash = dechex(crc32($name . time()));

        return [
            'name' => $name,
            'description' => $this->faker->bs,
            'slug' => Str::slug(Str::of($name)->substr(0, 24)) . '-' . $hash
        ];
    }
}
