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
    Route::get('get_fuel_stations_data', [FuelStationController::class, 'get_fuel_stations_data']);

    // Vehicle routes
    Route::post('add_vehicle', [VehiclesController::class, 'add_vehicle']);
    Route::get('get_vehicles_data', [VehiclesController::class, 'get_vehicles_data']);

    // driver routes
    Route::post('add_driver', [DriverController::class, 'add_driver']);
    Route::get('get_drivers', [DriverController::class, 'get_drivers']);
    Route::get('get_drivers_data', [DriverController::class, 'get_drivers_data']);
});


