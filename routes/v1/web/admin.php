<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Jobs\AjaxJobController;
use App\Http\Controllers\Admin\AuthController;
Route::get('login',function()
{
    return view('admin.auth.login');
})->name('admin.login');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/',[DashboardController::class,'index']);
    Route::post('logout',[AuthController::class,'logout']);
});