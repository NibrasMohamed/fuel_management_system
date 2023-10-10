<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FuelRequestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\VehiclesController;
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

//route for login
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('login', [LoginController::class, 'login']);
Route::get('/access-denied', function () {
    return view('layouts.error_page');
});
//routes for cutomer registration
Route::post('/register-customer', [RegisterController::class, 'store']);

Route::get('/plain-page', function () {
    return view('pages.painpage');
});
Route::get('/', function () {
    return redirect('/register');
});
Route::group(['middleware' => 'auth'], function () {
    // Route::get('/', function(){
    //     redirect('/main-dashboard');
    // });
    //route for logout
    Route::get('/logout', [LoginController::class, 'logout']);


    //routes for manager
    Route::group(['middleware' => 'manager'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);

        //routes for token
        Route::get('/token', [TokenController::class, 'index']);
        Route::get('/token-payment', [TokenController::class, 'getTokenPayment']);
        Route::get('/update-request/{id}', [TokenController::class, 'update']);
        Route::get('/delete-request/{id}', [TokenController::class, 'destroy']);

        //routs for vehicles
        Route::get('/vehicles', [VehiclesController::class, 'index']);

        //route for customers
        Route::get('/customers', [CustomerController::class, 'index']);
    });
    

    //routes for head-office
    Route::group(['middleware' => 'head_office'], function () {

        //routes for fuel request
        Route::get('/main-dashboard', [DashboardController::class, 'create']);
        Route::get('/fuel-request', [FuelRequestController::class, 'index']);
        Route::get('/update-fuel-request/{id}', [FuelRequestController::class, 'update']);
        Route::get('/stations', [StationController::class, 'index']);
        //route for schedule
        Route::get('/schedule', [ScheduleController::class, 'index']);

        Route::get('/employees', [EmployeeController::class, 'index']);
        Route::get('/new-employee', [EmployeeController::class, 'create']);
        Route::post('/new-employee', [EmployeeController::class, 'store']);
        Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit']);
        Route::post('/update-employee/{id}', [EmployeeController::class, 'update']);
        Route::get('/delete-employee/{id}', [EmployeeController::class, 'destroy']);
    });

    //routes for token
    Route::post('/request-token/{id}', [TokenController::class, 'requestToken']);
    Route::get('/request-token', [TokenController::class, 'create']);
    Route::get('/view-qr/{filename}', [TokenController::class, 'viewQR']);
    Route::get('/my-token/{id}', [TokenController::class, 'show']);
    // Route::get('/update-request/{id}', [TokenController::class, 'update']);
    // Route::get('/delete-request/{id}', [TokenController::class, 'destroy']);

    Route::get('/tokens', [EmployeeController::class, 'viewTokens']);
    Route::get('/view-token/{id}', [PaymentController::class, 'show']);


    //route for payment
    Route::get('/fuel-availabilty', [FuelRequestController::class, 'create']);
    Route::post('/make-fuel-request', [FuelRequestController::class, 'store']);
    Route::post('/make-payment/{id}', [PaymentController::class, 'store']);
    Route::get('/pay/{id}', [PaymentController::class, 'create']);
});
