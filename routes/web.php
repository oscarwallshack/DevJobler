<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::get('/users/list', [UserController::class, 'index']); // -> middleware('auth');

// ------------------------------employee---------------------------------------

Route::middleware(['auth', 'verified'])->group(function () {

   //  Route::get('/profil-pracownika', [EmployeeController::class, 'profile']); // -> middleware('auth');
    Route::get('/profil-pracownika/edytuj', [EmployeeController::class, 'edit_profile']);


    // Route::resource('employees', EmployeeController::class)->only([
    //     'profile', 
    // ]);
    Route::resource('employees', EmployeeController::class)->only([
        'profile','index', 'edit',
    ]);

    Route::resource('users', UserController::class)->only([
        'update','index', 'employeeProfile'
    ]);
    // Route::resource('users', UserController::class)->only([
    //     'editEmployee',
    // ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
