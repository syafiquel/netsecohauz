<?php

namespace Database\Factories;

use App\Models\BrandOwner;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandOwnerFactory extends Factory
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
            'phone' => $this->faker->numerify('#########'),
            'address' => Str::random(20),
            'postcode' => $this->faker->numerify('#####'),
            'city' => Str::random(10),
            'state' => Str::random(6),
            'website' => Str::random(10),
            'description' => Str::random(10),
            'status' => 1,
        ];
    }
}
