<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Candidates\AuthController;
use App\Http\Controllers\API\Candidates\ProfileController;

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::middleware('auth:api')->group(function () {
    Route::get('profile',[ProfileController::class,'get_profile']);
    Route::post('profile',[ProfileController::class,'save_profile']);
});