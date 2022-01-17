<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\Location\LocationAjaxController;
use App\Http\Controllers\Site\JobsController;
use App\Http\Controllers\Candidates\DashController;


Route::prefix('admin')->group(function () {
    require_once 'web/admin.php';
});
Route::prefix('candidate')->group(function () {
    require_once 'web/candidate.php';
});
Route::prefix('company')->group(function () {
    require_once 'web/company.php';
});
// Auth 
Auth::routes();
// Site Routes
Route::get('/', [HomeController::class, 'home']);
Route::get('/companies', [HomeController::class, 'companies']);
Route::get('/company/{id}', [HomeController::class, 'company']);
Route::get('jobs/', [JobsController::class, 'index']);
Route::get('job/{id}', [JobsController::class, 'jobindex']);

Route::middleware(['auth'])->group(function () {
    Route::get('/apply-job/{id}', [DashController::class, 'applyjob']);
    Route::get('/remove-application/{id}', [DashController::class, 'removeApplication']);
});

Route::prefix('ajax')->group(function () {
    Route::post('/countries', [LocationAjaxController::class, 'countries']);
    Route::post('/states', [LocationAjaxController::class, 'states']);
    Route::post('/cities', [LocationAjaxController::class, 'cities']);
});
