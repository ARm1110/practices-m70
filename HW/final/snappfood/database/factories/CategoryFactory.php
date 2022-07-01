<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->randomElement(['fast food', 'Traditional']),
            'user_id' => $this->faker->randomNumber(1, 20),
            'is_active' => $this->faker->boolean,
        ];
    }
}
