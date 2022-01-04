<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(50),
            'category_id' => Arr::random(['1', '2', '3', '4']),
            'author' => $this->faker->name(),
            'description' => $this->faker->text(500),
            'picture' => 'cover-placeholder.jpg',
            'copies' => $this->faker->numberBetween(0, 10),
            'pages' => $this->faker->numberBetween(10, 1000)
        ];
    }
}
