<?php

namespace App\Http\Controllers\Swagger\User;

use App\Http\Controllers\Controller;


/**
 * @OA\Get(
 *     path="/api/user/car-brands",
 *     summary="Список брэндов автомобилей",
 *     tags={"Пользовательские функции (Взаимодействие с брендом автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *         name="title",
 *         description="Бренд",
 *         required=false,
 *         in="query",
 *         @OA\Schema(type="string"),
 *     ),
 *
 *     @OA\Parameter(
 *         name="created_from",
 *         description="Дата создания с",
 *         required=false,
 *         in="query",
 *         @OA\Schema(type="date-time"),
 *     ),
 *
 *     @OA\Parameter(
 *         name="created_to",
 *         description="Дата создания до",
 *         required=false,
 *         in="query",
 *         @OA\Schema(type="date-time"),
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Porche"),
 *                 @OA\Property(property="created_at", type="date-time", example="2010-10-22"),
 *             )),
 *         ),
 *     ),
 *
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 */



class UserCarBrandController extends Controller
{

}
