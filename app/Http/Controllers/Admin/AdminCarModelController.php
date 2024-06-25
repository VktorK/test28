<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarModel\IndexRequest;
use App\Http\Requests\Admin\CarModel\StoreRequest;
use App\Http\Requests\Admin\CarModel\UpdateRequest;
use App\Http\Resources\Admin\AdminCarModelResource;
use App\Models\CarModel;
use App\Services\Admin\AdminCarModelService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AdminCarModelController extends Controller
{


    /**
     * @param IndexRequest $indexRequest
     * @return array
     */
    public function index(IndexRequest $indexRequest): array
    {
        $data = $indexRequest -> validated();
        $carModel = AdminCarModelService::index($data)->get();
        return AdminCarModelResource::collection($carModel)->resolve();
    }


    /**
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $carModel = AdminCarModelService::store($data);
        return AdminCarModelResource::make($carModel)->resolve();
    }


    /**
     * @param CarModel $carModel
     * @return array
     */
    public function show(CarModel $carModel): array
    {
        return AdminCarModelResource::make($carModel)->resolve();
    }


    /**
     * @param UpdateRequest $request
     * @param CarModel $carModel
     * @return array
     */
    public function update(UpdateRequest $request, CarModel $carModel): array
    {
        $data = $request->validated();
        $carModel = AdminCarModelService::update($carModel, $data);
        return AdminCarModelResource::make($carModel)->resolve();
    }


    /**
     * @param CarModel $carModel
     * @return JsonResponse
     */
    public function destroy(CarModel $carModel): JsonResponse
    {
        AdminCarModelService::destroy($carModel);
        return response()->json([
            'message' => 'Car Model deleted successfully'
        ], ResponseAlias::HTTP_OK);
    }
}
