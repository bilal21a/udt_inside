<?php

use App\Http\Controllers\API\DriversController;
use App\Http\Controllers\API\ForgetPasswordController;
use App\Http\Controllers\API\RegisterController;
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
    Route::resource('fuel_station', 'API\FuelStationsController');

    // Vehicles routes
    Route::resource('vehicle', 'API\VehiclesController');

    // drivers routes
    Route::resource('driver', 'API\DriversController');
    Route::post('driver_change_password/{id}', [DriversController::class, 'change_password']);
});
