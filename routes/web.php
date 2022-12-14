<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('/reg-form/', [HomeController::class, 'regForm']);
Route::get('/district-list/{id}', [HomeController::class, 'districtList']);
Route::get('/upozilla-list/{id}', [HomeController::class, 'upozilaList']);
Route::post('/register-applicant/', [ApplicantController::class, 'registerApplicant']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/load-applicant-list/', [DashboardController::class, 'getApplicant']);
    Route::get('/applicant-info/{id}', [DashboardController::class, 'getApplicantInfo']);
});
