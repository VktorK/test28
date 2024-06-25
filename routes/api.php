<?php

use App\Http\Controllers\Admin\AdminCarBrandController;
use App\Http\Controllers\Admin\AdminCarController;
use App\Http\Controllers\Admin\AdminCarModelController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\UserCarBrandController;
use App\Http\Controllers\User\UserCarController;
use App\Http\Controllers\User\UserCarModelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserAccountController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('users', [UserController::class, 'store']);

Route::group(['middleware' => ['api', 'jwt.auth'], 'prefix' => 'auth'], function () {
    Route::post('users', [UserAccountController::class, 'update']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['prefix'=>'admin', 'middleware' => ['jwt.auth','is.admin']],function (){
   Route::get('cars', [AdminCarController::class, 'index']);
   Route::get('cars/{car}', [AdminCarController::class, 'show']);
   Route::post('cars', [AdminCarController::class, 'store']);
   Route::patch('cars/{car}', [AdminCarController::class, 'update']);
   Route::delete('cars/{car}', [AdminCarController::class, 'destroy']);

   Route::get('car-brands', [AdminCarBrandController::class, 'index']);
   Route::get('car-brands/{carBrand}', [AdminCarBrandController::class, 'show']);
   Route::post('car-brands', [AdminCarBrandController::class, 'store']);
   Route::patch('car-brands/{carBrand}', [AdminCarBrandController::class, 'update']);
   Route::delete('car-brands/{carBrand}', [AdminCarBrandController::class, 'destroy']);

   Route::get('car-models', [AdminCarModelController::class, 'index']);
   Route::get('car-models/{carModel}', [AdminCarModelController::class, 'show']);
   Route::post('car-models', [AdminCarModelController::class, 'store']);
   Route::patch('car-models/{carModel}', [AdminCarModelController::class, 'update']);
   Route::delete('car-models/{carModel}', [AdminCarModelController::class, 'destroy']);


    Route::get('users', [AdminUserController::class, 'index']);
    Route::get('users/{user}', [AdminUserController::class, 'show']);
    Route::post('users', [AdminUserController::class, 'store']);
    Route::patch('users/{user}', [AdminUserController::class, 'update']);
    Route::delete('users/{user}', [AdminUserController::class, 'destroy']);
});

Route::group(['prefix'=> 'user','middleware' => ['jwt.auth']],function (){
    Route::get('cars', [UserCarController::class, 'index']);
    Route::get('cars/{car}', [UserCarController::class, 'show']);
    Route::post('cars', [UserCarController::class, 'store']);
    Route::patch('cars/{car}', [UserCarController::class, 'update']);
    Route::delete('cars/{car}', [UserCarController::class, 'destroy']);

    Route::get('car-brands', [UserCarBrandController::class, 'index']);
    Route::get('car-brands/{carBrand}', [UserCarBrandController::class, 'show']);
    Route::post('car-brands', [UserCarBrandController::class, 'store']);
    Route::patch('car-brands/{carBrand}', [UserCarBrandController::class, 'update']);
    Route::delete('car-brands/{carBrand}', [UserCarBrandController::class, 'destroy']);

    Route::get('car-models', [UserCarModelController::class, 'index']);
    Route::get('car-models/{carModel}', [UserCarModelController::class, 'show']);
    Route::post('car-models', [UserCarModelController::class, 'store']);
    Route::patch('car-models/{carModel}', [UserCarModelController::class, 'update']);
    Route::delete('car-models/{carModel}', [UserCarModelController::class, 'destroy']);

    Route::patch('users',[UserAccountController::class, 'update']);
    Route::delete('users',[UserAccountController::class, 'destroy']);
});
