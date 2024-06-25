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


    /**
     * @param IndexRequest $indexRequest
     * @return array
     */
    public function index(IndexRequest $indexRequest): array
    {
        $data = $indexRequest -> validated();
        $carBrand = UserCarBrandService::index($data)->get();
        return UserCarBrandResource::collection($carBrand)->resolve();
    }


    /**
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $carBrand = UserCarBrandService::store($data);
        return UserCarBrandResource::make($carBrand)->resolve();
    }


    /**
     * @param CarBrand $carBrand
     * @return array
     */
    public function show(CarBrand $carBrand): array
    {
        return UserCarBrandResource::make($carBrand)->resolve();
    }


    /**
     * @param UpdateRequest $request
     * @param CarBrand $carBrand
     * @return array
     */
    public function update(UpdateRequest $request, CarBrand $carBrand): array
    {
        $data = $request->validated();
        $carBrand = UserCarBrandService::update($carBrand, $data);
        return UserCarBrandResource::make($carBrand)->resolve();
    }


    /**
     * @param CarBrand $carBrand
     * @return JsonResponse
     */
    public function destroy(CarBrand $carBrand): JsonResponse
    {
        UserCarBrandService::destroy($carBrand);
        return response()->json([
            'message' => 'Брэнд автомобиля удален'
        ], ResponseAlias::HTTP_OK);
    }
}
