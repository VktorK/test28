<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Car\IndexRequest;
use App\Http\Requests\Admin\Car\StoreRequest;
use App\Http\Requests\Admin\Car\UpdateRequest;
use App\Http\Resources\Admin\AdminCarResource;
use App\Models\Car;
use App\Services\Admin\AdminCarService;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AdminCarController extends Controller
{


    public function index(IndexRequest $indexRequest): array
    {
//        $carBrand = UserCarBrandService::filter($indexRequest);
        return AdminCarResource::collection(Car::all())->resolve();
    }


    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $car = AdminCarService::store($data);
        return AdminCarResource::make($car)->resolve();
    }


    public function show(Car $car): array
    {
        return AdminCarResource::make($car)->resolve();
    }


    public function update(UpdateRequest $request, Car $car): array
    {
        $data = $request->validated();
        $car = AdminCarService::update($car, $data);
        return AdminCarResource::make($car)->resolve();
    }


    public function destroy(Car $car): JsonResponse
    {
        AdminCarService::destroy($car);
        return response()->json([
            'message' => 'Car deleted successfully'
        ], ResponseAlias::HTTP_OK);
    }


}
