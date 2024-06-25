<?php

namespace App\Services\Admin;

use App\Http\Filters\AbstractFilters;
use App\Http\Requests\Admin\CarBrand\IndexRequest;
use App\Models\CarBrand;


class AdminCarBrandService
{

    public static function index(array $data)
    {
        return CarBrand::filter($data);
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
