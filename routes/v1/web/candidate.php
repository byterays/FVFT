<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidates\AuthController;
use App\Http\Controllers\Candidates\DashController;

Route::get('/login', [AuthController::class, 'login'])->name('candidate.login');
Route::post('/register', [AuthController::class, 'register'])->name('candidate.register');
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashController::class, 'jobs'])->name('candidate.dashboard');
    Route::get('/jobs', [DashController::class, 'jobs'])->name('candidate.jobs');
    Route::get('/profile', [DashController::class, 'profile'])->name('candidate.profile');
    Route::get('/safty-tips', [DashController::class, 'safty-tips'])->name('candidate.safty-tips');
    Route::get('settings', [DashController::class, 'settings'])->name('candidate.settings');
    Route::get('job-preferences', [DashController::class, 'job_preferences'])->name('candidate.job-preferences');

    // Save Profile
    Route::post('/profile', [DashController::class, 'saveProfile'])->name('candidate.save-profile');
    Route::post('/job-preferences', [DashController::class, 'saveJobPreferences'])->name('candidate.save-job-preferences');
    Route::post('/settings', [DashController::class, 'saveSettings'])->name('candidate.save-settings');
});
