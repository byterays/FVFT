<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Ajax\AddController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'skill/', 'as' => 'admin.skill.'], function(){
    Route::post('ajax-store-skill', [AddController::class, "ajaxStoreSKill"])->name("ajaxAddSkill");
});
Route::group(['prefix' => 'training/', 'as' => 'admin.training.'], function(){
    Route::post('ajax-store-training', [AddController::class, "ajaxStoreTraining"])->name("ajaxAddTraining");
});
require_once 'v1/v1-web.php';
