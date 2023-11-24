<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/locations', [LocationController::class, 'index']);
    Route::get('/', [PageController::class, 'home']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'validateLogin']);
    Route::get('/register', [PageController::class, 'register']);
    Route::post('/register_post', [PageController::class, 'post_register']);
});
// Route::middleware(['auth'])->group(function () {
//     Route::middleware(['PreventBackHistory'])->group(function () {
        // Route::middleware(['CekRole:Pengambil'])->group(function () {
            Route::get('/dashboard/pengambil', [PageController::class, 'dashboardPengambil']);
        // });
        // Route::middleware(['CekRole:Pemilik'])->group(function () {
            Route::get('/dashboard/pemilik', [PageController::class, 'dashboardPemilik']);
        // });
        // Route::middleware(['CekRole:Bank'])->group(function () {
            Route::get('/dashboard/bank', [PageController::class, 'dashboardBank']);
        // });
//logout
Route::get('/logout', [authController::class, 'logout']);
//     });
// });

