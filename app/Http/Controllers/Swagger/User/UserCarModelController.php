<?php

namespace App\Http\Controllers\Swagger\User;

use App\Http\Controllers\Controller;

/**
 *
 * @OA\Get(
 *     path="/api/user/car-models",
 *     summary="Список моделей автомобилей",
 *     tags={"Пользовательские функции (Взаимодействие с моделью автомобиля)"},
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
 *         name="created_from",
 *         description="Дата создания с",
 *         required=false,
 *         in="query",
 *         @OA\Schema(type="date"),
 *     ),
 *
 *     @OA\Parameter(
 *         name="created_to",
 *         description="Дата создания до",
 *         required=false,
 *         in="query",
 *         @OA\Schema(type="date"),
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
 */


class UserCarModelController extends Controller
{
}
