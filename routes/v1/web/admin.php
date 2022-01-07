<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Jobs\AjaxJobController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Jobs\JobsController;
use App\Http\Controllers\Admin\Jobs\JobsAjaxController;
use App\Http\Controllers\Admin\Location\LocationAjaxController;


Route::get('login',function()
{
    return view('admin.auth.login');
})->name('admin.login');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/',[DashboardController::class,'index']);
    Route::get('/jobs-list',[JobsController::class,'index'])->name('admin.jobs-list');
    Route::get('/jobs-save',[JobsController::class,'edit']);
    Route::post('/jobs-save',[JobsController::class,'save']);
    Route::get('/jobs-delete',[JobsController::class,'delete']);
    Route::get('/jobs-new',[JobsController::class,'new']);
    Route::post('logout',[AuthController::class,'logout']);
    // Ajax Requests
});
