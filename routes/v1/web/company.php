<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Compeny\AuthController;
use App\Http\Controllers\Compeny\DashController;

Route::get('/login', [AuthController::class, 'login'])->name('company.login');
Route::post('/register', [AuthController::class, 'register'])->name('company.register');
Route::middleware(['auth', 'is_company'])->group(function () {
    Route::get('/', [DashController::class, 'dashboard'])->name('company.dash');
    Route::get('/profile', [DashController::class, 'profile'])->name('company.edit_profile');
    Route::post('/profile', [DashController::class, 'saveProfile'])->name('company.save_profile');

    Route::get('/jobs', [DashController::class, 'jobs'])->name('company.jobs');
    Route::get('/applicants', [DashController::class, 'applicants'])->name('company.applicants');
    Route::get('/settings', [DashController::class, 'profile'])->name('company.settings');
});
