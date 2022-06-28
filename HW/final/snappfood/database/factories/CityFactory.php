<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'city_name' => $this->faker->city,
            'zip_code' => $this->faker->countryCode,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'is_active' => $this->faker->boolean,
        ];
    }
}
