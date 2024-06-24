<?php

namespace App\Services\User;

use App\Models\Car;

class UserCarService
{
        public static function store(array $data)
        {
            return Car::create($data);
        }

        public static function update(Car $car, array $data): ?Car
        {
            $car->update($data);
            return $car->fresh();
        }

        public static function destroy(Car $car): ?bool
        {
            return $car->delete();
        }
}
