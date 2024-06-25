<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Car\DestroyRequest;
use App\Http\Requests\User\Car\IndexRequest;
use App\Http\Requests\User\Car\ShowRequest;
use App\Http\Requests\User\Car\StoreRequest;
use App\Http\Requests\User\Car\UpdateRequest;
use App\Http\Resources\User\UserCarResource;
use App\Models\Car;
use App\Services\User\UserCarService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserCarController extends Controller
{


    /**
     * @param IndexRequest $indexRequest
     * @return array
     */
    public function index(IndexRequest $indexRequest): array
    {
        $data = $indexRequest -> validationData();
        $car = UserCarService::index($data)->get();
        return UserCarResource::collection($car)->resolve();
    }


    /**
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request): array
    {
        $data = $request->validationData();
        $car = UserCarService::store($data);
        return UserCarResource::make($car)->resolve();
    }


    /**
     * @param ShowRequest $showRequest
     * @param Car $car
     * @return array
     */
    public function show(ShowRequest $showRequest, Car $car): array
    {
        $showRequest ->validationData();
        return UserCarResource::make($car)->resolve();
    }


    /**
     * @param UpdateRequest $request
     * @param Car $car
     * @return array
     */
    public function update(UpdateRequest $request, Car $car): array
    {
        $data = $request->validated();
        $car = UserCarService::update($car, $data);
        return UserCarResource::make($car)->resolve();
    }


    /**
     * @param DestroyRequest $destroyRequest
     * @param Car $car
     * @return JsonResponse
     */
    public function destroy(DestroyRequest $destroyRequest, Car $car): JsonResponse
    {
        $destroyRequest -> validationData();
        UserCarService::destroy($car);
        return response()->json([
            'message' => 'Автомобиль удален'
        ], ResponseAlias::HTTP_OK);
    }
}
