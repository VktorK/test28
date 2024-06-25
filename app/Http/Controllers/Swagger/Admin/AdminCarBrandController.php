<?php

namespace App\Http\Controllers\Swagger\Admin;

use App\Http\Controllers\Controller;


/**
 *
 * @OA\Get(
 *     path="/api/admin/car-brands",
 *     summary="Список брэндов автомобилей",
 *     tags={"Админские функции (Взаимодействие с брендом автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *           name="title",
 *           description="Бренд",
 *           required=false,
 *           in="query",
 *           @OA\Schema(type="string"),
 *     ),
 *
 *     @OA\Parameter(
 *     name="created_from",
 *     description="Дата создания с",
 *     required=false,
 *     in="query",
 *     @OA\Schema(type="date-time"),
 *     ),
 *
 *     @OA\Parameter(
 *     name="created_to",
 *     description="Дата создания до",
 *     required=false,
 *     in="query",
 *     @OA\Schema(type="date-time"),
 *     ),
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
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *     ),
 * ),
 *
 *
 * @OA\Patch(
 *     path="/api/admin/car-brands/{carBrand}",
 *     summary="Обновление названия бренда Автомобиля",
 *     tags={"Админские функции (Взаимодействие с брендом автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *         description="Car Brand ID",
 *         in="path",
 *         name="carBrand",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Porche"),
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
 *             @OA\Property(property="created_at", type="date-time", example="2020-10-22"),
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
 *     path="/api/admin/car-brands/{carBrand}",
 *     summary="Единичный брэнд",
 *     tags={"Админские функции (Взаимодействие с брендом автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="Id carBrand",
 *     in="path",
 *     name="carBrand",
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
 *             @OA\Property(property="created_at", type="date-time", example="2020-10-22"),
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
 *     path="/api/admin/car-brands/{carBrand}",
 *     summary="Удаление бренда",
 *     tags={"Админские функции (Взаимодействие с брендом автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="Id carBrand",
 *     in="path",
 *     name="carBrand",
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
 *     path="/api/admin/car-brands",
 *     summary="Создание названия бренда Автомобиля",
 *     tags={"Админские функции (Взаимодействие с брендом автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Porche"),
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
 *             @OA\Property(property="created_at", type="date-time", example="2020-10-22"),
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
 *
 *
 */



class AdminCarBrandController extends Controller
{

}
