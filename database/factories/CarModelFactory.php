<?php

namespace Database\Factories;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CarModel>
 */
class CarModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'car_brand_id' => intval(CarBrand::all()->random()->id),
        ];
    }
}
