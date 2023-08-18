<?php

use App\Http\Controllers\API\DriversController;
use App\Http\Controllers\API\ForgetPasswordController;
use App\Http\Controllers\API\FuelStationsController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\TollGatesController;
use App\Http\Controllers\API\VehicleMakeModalController;
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
    // otp
    Route::get('generate_otp', [RegisterController::class, 'generate_otp']);
    Route::post('verify_otp', [RegisterController::class, 'verify_otp']);

    // profile
    Route::get('me', [RegisterController::class, 'me']);
    Route::post('customer_profile_update', [RegisterController::class, 'customer_profile_update']);
    Route::post('service_provider_profile_update', [RegisterController::class, 'service_provider_profile_update']);

    // Fuel Station routes
    Route::resource('fuel_station', 'API\FuelStationsController');

    // Toll gate routes
    Route::resource('toll_gate', 'API\TollGatesController');
    Route::post('toll_gate_status_change/{id}', [TollGatesController::class, 'status_change']);

    // Insurance Company routes
    Route::resource('insurance_company', 'API\InsuranceCompaniesController');

    // Vehicles routes
    Route::resource('vehicle', 'API\VehiclesController');

    Route::get('get_vehicle_make', [VehicleMakeModalController::class, 'get_vehicle_make']);
    Route::get('get_vehicle_modal/{make_id}', [VehicleMakeModalController::class, 'get_vehicle_modal']);

    // drivers routes
    Route::resource('driver', 'API\DriversController');
    Route::get('get_drivers', [DriversController::class, 'get_drivers']);
    Route::post('driver_change_password/{id}', [DriversController::class, 'change_password']);
    Route::post('driver_status_change/{id}', [DriversController::class, 'status_change']);

    // Dashboard routes
    Route::get('vehicle_count', [VehiclesController::class, 'vehicle_count']);
    Route::get('driver_count', [DriversController::class, 'driver_count']);
    Route::get('fuel_station_places/{type?}', [FuelStationsController::class, 'fuel_station_places']);
    Route::get('fuel_capacity', [FuelStationsController::class, 'fuel_capacity']);
});
