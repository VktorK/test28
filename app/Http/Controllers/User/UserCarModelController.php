<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CarModel\IndexRequest;
use App\Http\Requests\User\CarModel\StoreRequest;
use App\Http\Requests\User\CarModel\UpdateRequest;
use App\Http\Resources\User\UserCarModelResource;
use App\Models\CarModel;
use App\Services\User\UserCarModelService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserCarModelController extends Controller
{


    public function index(IndexRequest $indexRequest): array
    {
        $data = $indexRequest -> validated();
        $carModel = UserCarModelService::index($data)->get();
        return UserCarModelResource::collection($carModel)->resolve();
    }


    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $carModel = UserCarModelService::store($data);
        return UserCarModelResource::make($carModel)->resolve();
    }


    public function show(CarModel $carModel): array
    {
        return UserCarModelResource::make($carModel)->resolve();
    }


    public function update(UpdateRequest $request, CarModel $carModel): array
    {
        $data = $request->validated();
        $carModel = UserCarModelService::update($carModel, $data);
        return UserCarModelResource::make($carModel)->resolve();
    }


    public function destroy(CarModel $carModel): JsonResponse
    {
        UserCarModelService::destroy($carModel);
        return response()->json([
            'message' => 'Car model deleted successfully'
        ], ResponseAlias::HTTP_OK);
    }
}
