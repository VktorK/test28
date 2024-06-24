<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'year_of_issue' => $this->faker->year(),
            'mileage' => $this->faker->numberBetween(500, 60000),
            'color' => $this->faker->colorName(),
            'car_brand_id' => $this->faker-> numberBetween(1, 10),
            'car_model_id' => $this->faker-> numberBetween(1, 10),
            'user_id' => $this->faker-> numberBetween(1, 10),







        ];
    }
}
