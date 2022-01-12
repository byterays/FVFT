<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Compeny\AuthController;
use App\Http\Controllers\Compeny\DashController;

Route::get('/login',[AuthController::class,'login'])->name('company.login');
Route::middleware(['auth', 'is_company'])->group(function () {
    Route::get('/',[DashController::class,'dashboard'])->name('company.dashboard');
});
