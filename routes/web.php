<?php

use App\Http\Controllers\AssignedDriverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    // Users Management
    Route::resource('users', 'UserController');
    Route::get('get_users', [UserController::class, 'get_data'])->name('get_users');

    // Customers Management
    Route::resource('customers', 'CustomerController');
    Route::get('get_customers', [CustomerController::class, 'get_data'])->name('get_customers');

    Route::resource('assigned_drivers', 'AssignedDriverController');
    Route::get('get_assigned_drivers/{user_id}', [AssignedDriverController::class, 'get_assigned_drivers'])->name('assigned_drivers.get_assigned_drivers');

    Route::resource('drivers', 'DriverController');
    Route::get('get_drivers', [DriverController::class, 'get_data'])->name('get_drivers');


    Route::resource('vehicles', 'VehicleController');
    Route::get('get_vehicles', [VehicleController::class, 'get_data'])->name('get_vehicles');
    //Fuel Station route
    Route::resource('serviceprovider', 'ServiceProviderController');
    Route::get('get_service_provider', [ServiceProviderController::class, 'get_data'])->name('get_service_provider');
});






Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::get('/home', 'HomeController@index')->name('home');




//resource controller
// Route::resource('add/customer', ResourceNameController::class);
