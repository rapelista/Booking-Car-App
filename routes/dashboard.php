<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\BookingController;
use App\Http\Controllers\Dashboard\CarServiceController;

Route::prefix('dashboard')
    ->middleware('auth')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard.index');


        Route::resource('bookings', BookingController::class)
            ->except(['edit', 'destroy']);

        Route::get('bookings/export', [BookingController::class, 'export'])
            ->name('bookings.export');

        Route::get('bookings/{booking}/done', [BookingController::class, 'done'])
            ->name('bookings.done');

        Route::post('bookings/{booking}/done', [BookingController::class, 'update'])
            ->name('bookings.done.post');

        Route::get('bookings/{booking}/approve', [BookingController::class, 'approve'])
            ->name('bookings.approve');

        Route::resource('services', CarServiceController::class);
    });
