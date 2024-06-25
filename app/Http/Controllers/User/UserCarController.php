<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Car\IndexRequest;
use App\Http\Requests\User\Car\StoreRequest;
use App\Http\Requests\User\Car\UpdateRequest;
use App\Http\Resources\User\UserCarResource;
use App\Models\Car;
use App\Services\User\UserCarService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserCarController extends Controller
{


    public function index(IndexRequest $indexRequest): array
    {
        $data = $indexRequest -> validated();
        $car = UserCarService::index($data)->get();
        return UserCarResource::collection($car)->resolve();
    }


    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $car = UserCarService::store($data);
        return UserCarResource::make($car)->resolve();
    }


    public function show(Car $car): array
    {
        return UserCarResource::make($car)->resolve();
    }


    public function update(UpdateRequest $request, Car $car): array
    {
        $data = $request->validated();
        $car = UserCarService::update($car, $data);
        return UserCarResource::make($car)->resolve();
    }


    public function destroy(Car $car): JsonResponse
    {
        UserCarService::destroy($car);
        return response()->json([
            'message' => 'Car brand deleted successfully'
        ], ResponseAlias::HTTP_OK);
    }
}
