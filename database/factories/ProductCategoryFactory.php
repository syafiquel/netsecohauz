<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => Str::random(10),
        ];
    }
}
