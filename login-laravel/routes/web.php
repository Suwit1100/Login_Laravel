<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'view_login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'post_login'])->name('post_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/view_register', [AuthController::class, 'view_register'])->name('register');
Route::post('/post_register', [AuthController::class, 'post_register'])->name('post_register');

Route::middleware(['auth', 'checkadmin'])->group(function () {
    Route::get('/homeadmin', [HomeAdminController::class, 'homeadmin'])->name('homeadmin');
});

Route::middleware(['auth', 'checkuser'])->group(function () {
    Route::get('/homeuser', [HomeUserController::class, 'homeuser'])->name('homeuser');
});
