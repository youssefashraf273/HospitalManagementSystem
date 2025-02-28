<?php

use App\Http\Controllers\AuthController;
use \App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication Routes....
Route::Post('register', [AuthController::class, 'register']);
Route::Post('login', [AuthController::class, 'login']);
Route::get('profile', [AuthController::class, 'profile'])->middleware(['auth_guard:api,admin-api,doctor-api']);
Route::get('logout', [AuthController::class, 'logout'])->middleware(['auth_guard:api,admin-api,doctor-api']);


//Admin Routes....
Route::middleware(['admin'])->group(function(){
    Route::Post('addDoctor', [AdminController::class, 'addDoctor']);
    Route::get('showDoctors', [AdminController::class, 'showDoctors']);
    Route::get('deleteDoctor', [AdminController::class, 'deleteDoctor']);
    Route::get('showPatients', [AdminController::class, 'showPatients']);
    Route::get('showPayments', [AdminController::class, 'showPayments']);

});












