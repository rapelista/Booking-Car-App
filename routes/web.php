<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {

    return redirect()->route('dashboard.index');
});

Route::middleware(['guest'])->group(function () {

    Route::get('auth', [AuthController::class, 'index'])->name('login');

    Route::post('auth', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});
