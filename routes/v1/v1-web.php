<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    require_once 'web/admin.php';
});
Route::prefix('candidate')->group(function(){
    require_once 'web/candidate.php';
});
Route::prefix('company')->group(function(){
    require_once 'web/company.php';
});