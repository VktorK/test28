<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarBrand\IndexRequest;
use App\Http\Requests\Admin\CarBrand\StoreRequest;
use App\Http\Requests\Admin\CarBrand\UpdateRequest;
use App\Http\Resources\Admin\AdminCarBrandResource;
use App\Models\CarBrand;
use App\Services\Admin\AdminCarBrandService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AdminCarBrandController extends Controller
{


    public function index(IndexRequest $indexRequest): array
    {
//        $carBrand = UserCarBrandService::filter($indexRequest);
        return AdminCarBrandResource::collection(CarBrand::all())->resolve();
    }


    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $carBrand = AdminCarBrandService::store($data);
        return AdminCarBrandResource::make($carBrand)->resolve();
    }


    public function show(CarBrand $carBrand): array
    {
        return AdminCarBrandResource::make($carBrand)->resolve();
    }


    public function update(UpdateRequest $request, CarBrand $carBrand): array
    {
        $data = $request->validated();
        $carBrand = AdminCarBrandService::update($carBrand, $data);
        return AdminCarBrandResource::make($carBrand)->resolve();
    }


    public function destroy(CarBrand $carBrand): JsonResponse
    {
        AdminCarBrandService::destroy($carBrand);
            return response()->json([
                    'message' => 'Car brand deleted successfully'
                ], ResponseAlias::HTTP_OK);
    }
}
