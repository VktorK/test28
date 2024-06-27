<?php

namespace Database\Factories;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\User;
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
            'car_brand_id' => intval(CarBrand::all()->random()->id),
            'car_model_id' => intval(CarModel::all()->random()->id),
            'user_id' => intval(User::all()->random()->id),







        ];
    }
}
