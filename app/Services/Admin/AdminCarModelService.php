<?php

namespace App\Services\Admin;

use App\Models\CarModel;

class AdminCarModelService
{
        public static function store(array $data)
        {
            return CarModel::create($data);
        }

        public static function update(CarModel $carModel, array $data): ?CarModel
        {
            $carModel->update($data);
            return $carModel->fresh();
        }

        public static function destroy(CarModel $carModel): ?bool
        {
            return $carModel->delete();
        }
}
