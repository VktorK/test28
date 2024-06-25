<?php

namespace App\Services\User;

use App\Models\Car;

class UserCarService
{

    /**
     * @param array $data
     * @return mixed
     */
    public static function index(array $data): mixed
    {
        return Car::filterUser($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public static function store(array $data): mixed
    {
        return Car::create($data);
    }

    /**
     * @param Car $car
     * @param array $data
     * @return Car|null
     */
    public static function update(Car $car, array $data): ?Car
    {
        $car->update($data);
        return $car->fresh();
    }

    /**
     * @param Car $car
     * @return bool|null
     */
    public static function destroy(Car $car): ?bool
    {
        return $car->delete();
    }
}
