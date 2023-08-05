<?php

use App\Http\Controllers\AssignedDriverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FuelStationController;
use App\Http\Controllers\InsuranceCompanyController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\TollGateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleMakeController;
use App\Http\Controllers\VehicleModalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Twilio\Rest\Client;

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

Route::get('test_sms', function () {
    $recipients='+923014750383';
    $message="hi";
    $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
});
Route::get('/', function () {
    return view('auth.login');
});

Route::get('sign_up', function () {
    return view('auth.sign_up_basic');
});

Route::middleware(['auth'])->group(function () {
    // home routes
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/get_count', 'HomeController@get_count')->name('get_count');
    Route::get('/get_count_graph/{type?}/{table?}', 'HomeController@get_count_graph')->name('get_count_graph');
    Route::get('/get_percentage/{type?}/{table?}', 'HomeController@get_percentage')->name('get_percentage');
    Route::get('/show_logs', 'HomeController@show_logs')->name('show_logs');

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

    // omc
    Route::resource('fuel_station', 'FuelStationController');
    Route::get('get_fuel_station', [FuelStationController::class, 'get_data'])->name('get_fuel_station');
    Route::get('show_fuel_station_map/{id}', [FuelStationController::class, 'fuel_station_map'])->name('show_fuel_station_map');

    // tollgate
    Route::resource('toll_gate', 'TollGateController');
    Route::get('get_toll_gate', [TollGateController::class, 'get_data'])->name('get_toll_gate');

    Route::resource('vehicle_make', 'VehicleMakeController');
    Route::get('get_vehicle_make', [VehicleMakeController::class, 'get_data'])->name('get_vehicle_make');

    Route::resource('vehicle_modal', 'VehicleModalController');
    Route::get('get_vehicle_modal', [VehicleModalController::class, 'get_data'])->name('get_vehicle_modal');

    Route::resource('insurance_company', 'InsuranceCompanyController');
    Route::get('get_insurance_company', [InsuranceCompanyController::class, 'get_data'])->name('get_insurance_company');

});






Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::get('/test_ui', function () {
    return view('test');
});




//resource controller
// Route::resource('add/customer', ResourceNameController::class);
