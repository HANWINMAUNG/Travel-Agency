<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->sentence(),
            'price' => '30000',
            'quantity' => $this->faker->numberBetween(2, 4),
            'cover_photo' => $this->faker->imageUrl(640, 480),
            'image' => $this->faker->imageUrl(640, 480),
            'description' => $this->faker->text(50),
            'summary' => $this->faker->text(50)
        ];
    }
}
