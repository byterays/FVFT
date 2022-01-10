<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidates\AuthController;
use App\Http\Controllers\Candidates\DashController;

Route::get('/login',[AuthController::class,'login'])->name('candidate.login');
Route::get('/dashboard',[DashController::class,'dashboard'])->name('candidate.dashboard');
Route::get('/',[DashController::class,'dashboard'])->name('candidate.dashboard');
Route::get('/jobs',[DashController::class,'jobs'])->name('candidate.jobs');
