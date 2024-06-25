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


    /**
     * @param IndexRequest $indexRequest
     * @return array
     */
    public function index(IndexRequest $indexRequest): array
    {
        $data = $indexRequest->validated();
        $carBrand = AdminCarBrandService::index($data)->get();
        return AdminCarBrandResource::collection($carBrand)->resolve();
    }


    /**
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $carBrand = AdminCarBrandService::store($data);
        return AdminCarBrandResource::make($carBrand)->resolve();
    }


    /**
     * @param CarBrand $carBrand
     * @return array
     */
    public function show(CarBrand $carBrand): array
    {
        return AdminCarBrandResource::make($carBrand)->resolve();
    }


    /**
     * @param UpdateRequest $request
     * @param CarBrand $carBrand
     * @return array
     */
    public function update(UpdateRequest $request, CarBrand $carBrand): array
    {
        $data = $request->validated();
        $carBrand = AdminCarBrandService::update($carBrand, $data);
        return AdminCarBrandResource::make($carBrand)->resolve();
    }


    /**
     * @param CarBrand $carBrand
     * @return JsonResponse
     */
    public function destroy(CarBrand $carBrand): JsonResponse
    {
        AdminCarBrandService::destroy($carBrand);
            return response()->json([
                    'message' => 'Car brand deleted successfully'
                ], ResponseAlias::HTTP_OK);
    }
}
