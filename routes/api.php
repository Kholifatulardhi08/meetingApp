<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\RoomApiController;
use App\Http\Controllers\Api\UnitApiController;
use App\Http\Controllers\Api\MealApiController;
use App\Http\Controllers\Api\DrinkApiController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/users', App\Http\Controllers\Api\UserApiController::class);
Route::apiResource('/rooms', App\Http\Controllers\Api\RoomApiController::class);
Route::apiResource('/units', App\Http\Controllers\Api\UnitApiController::class);
Route::apiResource('/meals', App\Http\Controllers\Api\MealApiController::class);
Route::apiResource('/drinks', App\Http\Controllers\Api\DrinkApiController::class);
