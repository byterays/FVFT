<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Candidates\AuthController;
use App\Http\Controllers\API\Candidates\ProfileController;
use App\Http\Controllers\API\Candidates\Jobs\JobsListController;
use App\Http\Controllers\API\Candidates\Jobs\JobApplicationController;

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::middleware('auth:api')->group(function () {
    Route::get('profile',[ProfileController::class,'get_profile']);
    Route::post('profile',[ProfileController::class,'save_profile']);
    Route::post('job-application',[JobApplicationController::class,'apply']);
    Route::post('job-application-list',[JobApplicationController::class,'list']);
});

Route::get('job-list',[JobsListController::class,'list']);