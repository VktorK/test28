<?php

namespace App\Http\Controllers\Swagger\User;

use App\Http\Controllers\Controller;


/**
 *
 * @OA\Get(
 *     path="/api/user/cars",
 *     summary="Список Автомобилей авторизированного пользователя",
 *     tags={"Пользовательские функции (Данные автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *           name="year_of_issue_from",
 *           description="Год Выпуска С",
 *           required=false,
 *           in="query",
 *           @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *           name="year_of_issue_from",
 *           description="Год Выпуска По",
 *           required=false,
 *           in="query",
 *           @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *           name="mileage_from",
 *           description="Пробег С",
 *           required=false,
 *           in="query",
 *           @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *           name="mileage_to",
 *           description="Пробег До",
 *           required=false,
 *           in="query",
 *           @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *           name="color",
 *           description="Цвет автомобиля",
 *           required=false,
 *           in="query",
 *           @OA\Schema(type="string"),
 *     ),
 *     @OA\Parameter(
 *           name="car_brand_id",
 *           description="id бренда автомобиля",
 *           required=false,
 *           in="query",
 *           @OA\Schema(type="integer"),
 *     ),
 *     @OA\Parameter(
 *           name="car_model_id",
 *           description="id модели автомобиля",
 *           required=false,
 *           in="query",
 *           @OA\Schema(type="integer"),
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
 *                 @OA\Property(property="year_of_issue", type="integer", example=2010),
 *                 @OA\Property(property="mileage", type="integer", example=69000),
 *                 @OA\Property(property="color", type="string", example="red"),
 *                 @OA\Property(property="car_brand_id", type="integer", example=1),
 *                 @OA\Property(property="car_model_id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
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
 * * @OA\Patch(
 *     path="/api/user/cars/{car}",
 *     summary="Обновление данных Автомобиля принадлажащего авторизированному пользователю",
 *     tags={"Пользовательские функции (Данные автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *         description="id car",
 *         in="path",
 *         name="car",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="year_of_issue", type="integer", example=2010),
 *                     @OA\Property(property="mileage", type="integer", example=69000),
 *                     @OA\Property(property="color", type="string", example="red"),
 *                     @OA\Property(property="car_brand_id", type="integer", example=1),
 *                     @OA\Property(property="car_model_id", type="integer", example=1),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="year_of_issue", type="integer", example=2010),
 *                 @OA\Property(property="mileage", type="integer", example=69000),
 *                 @OA\Property(property="color", type="string", example="red"),
 *                 @OA\Property(property="car_brand_id", type="integer", example=1),
 *                 @OA\Property(property="car_model_id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="created_at", type="date-time", example="2010-10-22"),
 *             )),
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
 *     path="/api/user/cars/{car}",
 *     summary="Единичный Автомобиль авторизированного пользователя",
*      tags={"Пользовательские функции (Данные автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="id car",
 *     in="path",
 *     name="car",
 *     required=true,
 *     example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="year_of_issue", type="integer", example=2010),
 *                 @OA\Property(property="mileage", type="integer", example=69000),
 *                 @OA\Property(property="color", type="string", example="red"),
 *                 @OA\Property(property="car_brand_id", type="integer", example=1),
 *                 @OA\Property(property="car_model_id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="created_at", type="date-time", example="2010-10-22"),
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
 *     path="/api/user/cars/{car}",
 *     summary="Удаление данных Автомобиля, принадлажащего авторизированному пользователю",
 *     tags={"Пользовательские функции (Данные автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *     @OA\Parameter(
 *     description="id car",
 *     in="path",
 *     name="car",
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
 *     path="/api/user/cars",
 *     summary="Создание названия модели Автомобиля, автоматические прокидывает user_id",
 *     tags={"Пользовательские функции (Данные автомобиля)"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="year_of_issue", type="integer", example=2010),
 *                     @OA\Property(property="mileage", type="integer", example=69000),
 *                     @OA\Property(property="color", type="string", example="red"),
 *                     @OA\Property(property="car_brand_id", type="integer", example=1),
 *                     @OA\Property(property="car_model_id", type="integer", example=1),
 *                     @OA\Property(property="created_at", type="date-time", example="2010-10-22"),
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
 *                 @OA\Property(property="year_of_issue", type="integer", example=2010),
 *                 @OA\Property(property="mileage", type="integer", example=69000),
 *                 @OA\Property(property="color", type="string", example="red"),
 *                 @OA\Property(property="car_brand_id", type="integer", example=1),
 *                 @OA\Property(property="car_model_id", type="integer", example=1),
 *                 @OA\Property(property="user_id", type="integer", example=1),
 *                 @OA\Property(property="created_at", type="date-time", example="2010-10-22"),
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
class UserCarController extends Controller
{

}
