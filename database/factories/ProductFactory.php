<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::title($this->faker->words(10, true)),
            'category_id' => $this->faker->numberBetween(1, 6),
            'industry_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
