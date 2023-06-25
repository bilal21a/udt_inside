<?php

use App\Http\Controllers\API\DriverController;
use App\Http\Controllers\API\ForgetPasswordController;
use App\Http\Controllers\API\FuelStationController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\VehiclesController;
use Illuminate\Support\Facades\Route;

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

Route::post('login', [RegisterController::class, 'login']);
Route::post('forgetPassword', [ForgetPasswordController::class, 'forgetPassword']);
Route::post('changePassword', [ForgetPasswordController::class, 'changePassword']);

//Register routes
Route::post('add_customer', [RegisterController::class, 'add_customer']);
Route::post('add_service_provider', [RegisterController::class, 'add_service_provider']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    
    // Fuel Station routes
    Route::post('add_fuel_station', [FuelStationController::class, 'add_fuel_station']);

    // Vehicle routes
    Route::post('add_vehicle', [VehiclesController::class, 'add_vehicle']);

    // driver routes
    Route::post('add_driver', [DriverController::class, 'add_driver']);
    Route::get('get_drivers', [DriverController::class, 'get_drivers']);
});


