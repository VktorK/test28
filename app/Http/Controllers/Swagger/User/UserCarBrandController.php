<?php

namespace App\Http\Controllers\Swagger\User;

use App\Http\Controllers\Controller;


/**
 * @OA\Get(
 *     path="/api/user/profiles",
 *     summary="Профиль текущего User",
 *     tags={"Профиль"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="first_name", type="string", example="Timmy"),
 *             @OA\Property(property="last_name", type="string", example="Black"),
 *             @OA\Property(property="date_of_birth", type="date", example=null),
 *             @OA\Property(property="login", type="string", example="Lok1"),
 *             @OA\Property(property="balance", type="float", example=167.20),
 *             @OA\Property(property="user_id", type="integer", example=1),
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
 *     path="/api/user/profiles",
 *     summary="Обновление профиля у User",
 *     tags={"Профиль"},
 *     security={ {"bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="first_name", type="string", example="Timmy"),
 *                     @OA\Property(property="last_name", type="string", example="Black"),
 *                     @OA\Property(property="date_of_birth", type="date", example=null),
 *                     @OA\Property(property="login", type="string", example="Lok1"),
 *                     @OA\Property(property="balance", type="float", example=167.20),
 *                     @OA\Property(property="user_id", type="integer", example=1),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="first_name", type="string", example="Timmy"),
 *             @OA\Property(property="last_name", type="string", example="Tamminsky"),
 *             @OA\Property(property="date_of_birth", type="date", example="12.12.2002"),
 *             @OA\Property(property="login", type="string", example="Lok1"),
 *             @OA\Property(property="balance", type="float", example=12.10),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unautoruzed",
 *     ),
 * ),
 */



class UserCarBrandController extends Controller
{

}
