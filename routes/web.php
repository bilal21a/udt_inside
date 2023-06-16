<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
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
    Route::get('get_customers', [CustomerController::class, 'get_customers'])->name('get_customers');

});






Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::get('/home', 'HomeController@index')->name('home');




//resource controller
// Route::resource('add/customer', ResourceNameController::class);
