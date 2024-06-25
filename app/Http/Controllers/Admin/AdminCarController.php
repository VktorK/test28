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


    /**
     * @param IndexRequest $indexRequest
     * @return array
     */
    public function index(IndexRequest $indexRequest): array
    {
        $data = $indexRequest -> validated();
        $carBrand = AdminCarService::index($data)->get();
        return AdminCarResource::collection($carBrand)->resolve();
    }


    /**
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request): array
    {
        $data = $request->validated();
        $car = AdminCarService::store($data);
        return AdminCarResource::make($car)->resolve();
    }


    /**
     * @param Car $car
     * @return array
     */
    public function show(Car $car): array
    {
        return AdminCarResource::make($car)->resolve();
    }


    /**
     * @param UpdateRequest $request
     * @param Car $car
     * @return array
     */
    public function update(UpdateRequest $request, Car $car): array
    {
        $data = $request->validated();
        $car = AdminCarService::update($car, $data);
        return AdminCarResource::make($car)->resolve();
    }


    /**
     * @param Car $car
     * @return JsonResponse
     */
    public function destroy(Car $car): JsonResponse
    {
        AdminCarService::destroy($car);
        return response()->json([
            'message' => 'Car deleted successfully'
        ], ResponseAlias::HTTP_OK);
    }


}
