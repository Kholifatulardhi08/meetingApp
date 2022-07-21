<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\MealController;
use App\Http\Controllers\Backend\DrinkController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', function () {
        return view('home');
    });
    Route::middleware(['auth'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('rooms', RoomController::class);
        Route::resource('units', UnitController::class);
        Route::resource('meals', MealController::class);
        Route::resource('drinks', DrinkController::class);
    });
});
