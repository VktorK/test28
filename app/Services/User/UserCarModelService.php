<?php

namespace App\Services\User;

use App\Models\CarModel;

class UserCarModelService
{

    /**
     * @param array $data
     * @return mixed
     */
    public static function index(array $data): mixed
    {
        return Carmodel::filterUser($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public static function store(array $data): mixed
    {
            return CarModel::create($data);
        }

    /**
     * @param CarModel $carModel
     * @param array $data
     * @return CarModel|null
     */
    public static function update(CarModel $carModel, array $data): ?CarModel
        {
            $carModel->update($data);
            return $carModel->fresh();
        }

    /**
     * @param CarModel $carModel
     * @return bool|null
     */
    public static function destroy(CarModel $carModel): ?bool
        {
            return $carModel->delete();
        }
}
