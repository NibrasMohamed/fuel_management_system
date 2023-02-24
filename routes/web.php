<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
Route::post('login',[LoginController::class, 'login']);

//routes for cutomer registration
Route::post('/register-customer', [RegisterController::class,'store']);

Route::get('/plain-page', function(){
    return view('pages.painpage');
});

Route::group(['middleware' => 'auth'],function (){
    Route::get('/', function () {
        return view('pages.dashboard');
    });
    //routes for employees
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::get('/new-employee', [EmployeeController::class, 'create']);
    Route::post('/new-employee', [EmployeeController::class, 'store']);
    Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit']);
    Route::post('/update-employee/{id}', [EmployeeController::class, 'update']);

    //route for dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //routes for token
    Route::get('/token', [TokenController::class, 'index']);

    //routs for vehicles
    Route::get('/vehicles', [VehiclesController::class, 'index']);

    //route for customers
    Route::get('/customers', [CustomerController::class, 'index']);

});