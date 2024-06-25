<?php

namespace App\Services\User;

use App\Models\CarBrand;

class UserCarBrandService
{

        public static function index(array $data)
        {
            return CarBrand::filterUser($data);
        }

        public static function store(array $data)
        {
            return CarBrand::create($data);
        }

        public static function update(CarBrand $carBrand, array $data): ?CarBrand
        {
            $carBrand->update($data);
            return $carBrand->fresh();
        }

        public static function destroy(CarBrand $carBrand): ?bool
        {
            return $carBrand->delete();
        }
}
