<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PengambilController;
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
            Route::get('/dashboard/pengambil', [PengambilController::class, 'Pengambil']);
            Route::get('/pengambil/buang', [PengambilController::class, 'formPesanan']);
            Route::post('/pengambil/postpesanan', [PengambilController::class, 'postPesanan']);
            Route::get('/pengambil/delete/{id}', [PengambilController::class, 'delete']);
            Route::get('/pengambil/formedit/{id}', [PengambilController::class, 'formedit']);
            Route::PUT('/pengambil/update/{id}', [PengambilController::class, 'update']);
            Route::put('/status/confirm/{id}', [PengambilController::class, 'updatestatus'])->name('confirm.status');
            Route::put('/status/change/{id}', [PengambilController::class, 'updatestatus'])->name('change.status');

            // Route::get('/profile/pengambil', [PageController::class, 'dashboardPengambil']);
        // });
        // Route::middleware(['CekRole:Pemilik'])->group(function () {
            Route::get('/dashboard/pemilik', [PemilikController::class, 'Pemilik']);
            Route::get('/profile/pemilik', [PemilikController::class, 'profilepemilik']);
            Route::get('/pemilik/buang', [PemilikController::class, 'formPesanan']);
            Route::post('/pemilik/postpesanan', [PemilikController::class, 'postPesanan']);
            Route::get('/pemilik/delete/{id}', [PemilikController::class, 'delete']);
            Route::get('/pemilik/formedit/{id}', [PemilikController::class, 'formedit']);
            Route::PUT('/pemilik/update/{id}', [PemilikController::class, 'update']);

        // });
        // Route::middleware(['CekRole:Bank'])->group(function () {
            Route::get('/dashboard/bank', [BankController::class, 'Bank']);
            Route::put('/status/confirm/bank/{id}', [BankController::class, 'updatestatusBank'])->name('confirm.status.bank');
            Route::put('/status/change/bank/{id}', [BankController::class, 'updatestatusBank'])->name('change.status.bank');

        // });
        //logout
        Route::get('/logout', [authController::class, 'logout']);

