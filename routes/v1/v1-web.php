<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\Location\LocationAjaxController;
Route::prefix('admin')->group(function(){
    require_once 'web/admin.php';
});
Route::prefix('candidate')->group(function(){
    require_once 'web/candidate.php';
});
Route::prefix('company')->group(function(){
    require_once 'web/company.php';
});
// Auth 
Auth::routes();
// Site Routes
Route::get('/', [HomeController::class,'home']);
Route::prefix('ajax')->group(function(){
    Route::post('/countries',[LocationAjaxController::class,'countries']);
    Route::post('/states',[LocationAjaxController::class,'states']);
    Route::post('/cities',[LocationAjaxController::class,'cities']);
});