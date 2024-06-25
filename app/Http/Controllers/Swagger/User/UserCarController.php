<?php

namespace App\Http\Controllers\Swagger\User;

use App\Http\Controllers\Controller;


/**
 *
 * @OA\Post(
 *     path="/api/user/transactions",
 *     summary="Создание транзакции",
 *     tags={"Транзакции"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="amount", type="float", example=10.2),
 *                     @OA\Property(property="currency", type="string", example="Some currency"),
 *                     @OA\Property(property="payment_system", type="string", example="PayPall"),
 *                     @OA\Property(property="type", type="integer", example=100),
 *                     @OA\Property(property="status", type="integer", example=1),
 *                     @OA\Property(property="user_id", type="int", example=1),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok"
 *     ),
 * ),
 *
 *
 *
 *
 *
 */
class UserCarController extends Controller
{

}
