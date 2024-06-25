<?php

namespace App\Http\Controllers\Swagger\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarModel\IndexRequest;
use App\Http\Requests\Admin\CarModel\StoreRequest;
use App\Http\Requests\Admin\CarModel\UpdateRequest;
use App\Http\Resources\Admin\AdminCarModelResource;
use App\Models\CarModel;
use App\Services\Admin\AdminCarModelService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

/**
 *
 * @OA\Get(
 *     path="/api/admin/car-models",
 *     summary="Список моделей автомобилей",
 *     tags={"Админские функции (Взаимодействие с моделью автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *           name="title",
 *           description="Бренд",
 *           required=false,
 *           in="query",
 *           @OA\Schema(type="string"),
 *     ),
 *     @OA\Parameter(
 *         name="car_brand_id",
 *         description="id car_brand",
 *         required=false,
 *         in="query",
 *         @OA\Schema(type="integer"),
 *     ),
 *
 *     @OA\Parameter(
 *     name="created_from",
 *     description="Дата создания с",
 *     required=false,
 *     in="query",
 *     @OA\Schema(type="date"),
 *     ),
 *
 *     @OA\Parameter(
 *     name="created_to",
 *     description="Дата создания до",
 *     required=false,
 *     in="query",
 *     @OA\Schema(type="date"),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Porche"),
 *                 @OA\Property(property="car_brand_id", type="integer", example=1),
 *                 @OA\Property(property="created_at", type="datetime", example="2010-10-22"),
 *             )),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 * * @OA\Patch(
 *     path="/api/admin/car-models/{carModel}",
 *     summary="Обновление названия модели Автомобиля",
 *     tags={"Админские функции (Взаимодействие с моделью автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *         description="Car model ID",
 *         in="path",
 *         name="carModel",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Porche"),
 *                     @OA\Property(property="car_brand_id", type="integer", example=1),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Porche"),
 *             @OA\Property(property="car_brand_id", type="integer", example=1),
 *             @OA\Property(property="created_at", type="datetime", example="2020-10-22"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unautoruzed",
 *     ),
 * ),
 *
 *
 * @OA\Get(
 *     path="/api/admin/car-models/{carModel}",
 *     summary="Единичная модель",
 *     tags={"Админские функции (Взаимодействие с моделью автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="id car model",
 *     in="path",
 *     name="carModel",
 *     required=true,
 *     example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Porche"),
 *             @OA\Property(property="car_brand_id", type="integer", example="Porche"),
 *             @OA\Property(property="created_at", type="datetime", example="2020-10-22"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 *
 * @OA\Delete(
 *     path="/api/admin/car-model/{carModel}",
 *     summary="Удаление модели",
 *     tags={"Админские функции (Взаимодействие с моделью автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="Id car model",
 *     in="path",
 *     name="carModel",
 *     required=true,
 *     example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Deleted")
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/admin/car-models",
 *     summary="Создание названия модели Автомобиля",
 *     tags={"Админские функции (Взаимодействие с моделью автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Porche"),
 *                     @OA\Property(property="car_brand_id", type="integer", example=1)
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="title", type="string", example="Porche"),
 *             @OA\Property(property="car_brand_id", type="integer", example=1),
 *             @OA\Property(property="created_at", type="datetime", example="2020-10-22"),
 *
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unautoruzed",
 *     ),
 * ),
 *
 *
 */




class AdminCarModelController extends Controller
{

}
