<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::middleware(['guest'])->group(function () {

    Route::get('auth', [AuthController::class, 'index'])->name('login');

    Route::post('auth', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');
});
