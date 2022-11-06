<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use App\Models\Offer;
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

// Route::get('/users/list', [UserController::class, 'index']);
// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ##################### open routes #####################



Route::get('/home', [OfferController::class, 'list'])->name('home');
Route::get('/', [OfferController::class, 'list'])->name('/');

Route::get('/specjalisci-it', [EmployeeController::class, 'show']);

Route::get('/firmy-it', [CompanyController::class, 'show']);


// ##################### routes for logged users #####################

Route::middleware(['auth', 'verified'])->group(function () {

    // ----------- routes for all logged users -----------

    Route::get('/specjalisci-it/{id}', [EmployeeController::class, 'profile'])->name('employees.profile');
    Route::get('/specjalisci-it/{id}/pobierz-cv', [UserController::class, 'downloadCv'])->name('employees.downloadCv');

    Route::get('/firmy-it/{id}', [CompanyController::class, 'profile'])->name('companies.profile');

    Route::get('/oferta/{id}', [OfferController::class, 'offer'])->name('offers.offer');


    // ----------- routes for employees -----------

    Route::middleware(['can:isEmployee'])->group(function () {
        Route::get('/profil', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/profil/edytuj', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::match(['POST', 'PUT'], '/profil/edytuj/{id}/zaktualizuj', [UserController::class, 'updateEmployee'])->name('users.updateEmployee');
        Route::delete('/profil/{user}', [UserController::class, 'destroy'])->name('employees.destroy');
    });

    // ----------- routes for company -----------

    Route::middleware(['can:isCompany'])->group(function () {
        Route::get('/profil-firmowy', [CompanyController::class, 'index'])->name('companies.index');

        Route::get('/profil-firmowy/edytuj/', [CompanyController::class, 'edit'])->name('companies.edit');

        Route::match(
            ['POST', 'PUT'],
            '/profil-firmowy/edytuj/{id}/zaktualizuj',
            [UserController::class, 'updateCompany']
        )->name('users.updateCompany');

        Route::delete(
            '/profil-firmowy/{user}',
            [UserController::class, 'destroy']
        )->name('companies.destroy');



        Route::get(
            '/profil-firmowy/nowa-oferta',
            [OfferController::class, 'create']
        )->name('offers.create');

        Route::get(
            '/profil-firmowy/aktualne-oferty',
            [OfferController::class, 'index']
        )->name('offers.index');


        // ----------- routes for offers -----------

        Route::post(
            '/profil-firmowy/aktualne-oferty',
            [OfferController::class, 'store']
        )->name('offers.store');

        Route::get(
            '/profil-firmowy/oferta/{offer}/edytuj',
            [OfferController::class, 'edit']
        )->name('offers.edit');

        Route::post(
            '/profil-firmowy/aktualne-oferty/{offer}',
            [OfferController::class, 'update']
        )->name('offers.update');

        Route::delete(
            '/profil-firmowy/aktualne-oferty/{offer}',
            [OfferController::class, 'destroy']
        )->name('offers.destroy');
    });
});

Auth::routes(['verify' => true]);
