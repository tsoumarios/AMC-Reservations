<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CompanyProfileController;

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

// Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// User authentication
Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');

Route::get('/user_reservations',[ReservationController::class, 'index_user'])->name('user_reservations');


// Home
Route::get('/home',[CompanyController::class, 'index'])->name('home_page');


// Reservations

Route::get('/company_console',[ReservationController::class, 'index'])->name('company_console');

Route::post('/reservation/save', [ReservationController::class, 'save'])->name('reservation_save');


// Companies

Route::get('/company_profile/{company}',[CompanyProfileController::class, 'show'])->name('company_profile');

Route::get('/company_console/create', [CompanyController::class, 'create'])->name('company_create');

Route::post('/company_console/save', [CompanyController::class, 'save'])->name('company_save');

Route::get('/company_profile/{company}/edit',[CompanyProfileController::class, 'edit'])->name('company_profile_edit');

Route::patch('/company_profile/{company}', [CompanyProfileController::class, 'update'])->name('company_update');