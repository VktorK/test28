<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CarBrand\IndexRequest;
use App\Http\Requests\User\CarBrand\StoreRequest;
use App\Http\Requests\User\CarBrand\UpdateRequest;
use App\Http\Resources\User\UserCarBrandResource;
use App\Models\CarBrand;
use App\Services\User\UserCarBrandService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserCarBrandController extends Controller
{


    public function index(IndexRequest $indexRequest): array
    {
//        $carBrand = UserCarBrandService::filter($indexRequest);
        return UserCarBrandResource::collection(CarBrand::all())->resolve();
    }


    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $carBrand = UserCarBrandService::store($data);
        return UserCarBrandResource::make($carBrand)->resolve();
    }


    public function show(CarBrand $carBrand): array
    {
        return UserCarBrandResource::make($carBrand)->resolve();
    }


    public function update(UpdateRequest $request, CarBrand $carBrand): array
    {
        $data = $request->validated();
        $carBrand = UserCarBrandService::update($carBrand, $data);
        return UserCarBrandResource::make($carBrand)->resolve();
    }


    public function destroy(CarBrand $carBrand): JsonResponse
    {
        UserCarBrandService::destroy($carBrand);
        return response()->json([
            'message' => 'Car brand deleted successfully'
        ], ResponseAlias::HTTP_OK);
    }
}
