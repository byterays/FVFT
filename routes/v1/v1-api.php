<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    require_once 'api/admin.php';
});
Route::prefix('candidate')->group(function(){
    require_once 'api/candidate.php';
});
Route::prefix('company')->group(function(){
    require_once 'api/company.php';
});