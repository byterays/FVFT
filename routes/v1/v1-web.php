<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\Location\LocationAjaxController;
use App\Http\Controllers\Site\JobsController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\PageController;
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
Route::get('/mark-as-read/{id}', [HomeController::class, 'markRead'])->name('markread');
Route::get('/companies', [HomeController::class, 'companies'])->name('site.companies');
// Route::get('/company-view/{id}', [HomeController::class, 'company'])->middleware('viewCompanyDetail');
Route::get('/company-view/{id}', [HomeController::class, 'company'])->name('site.companydetail');
Route::get('jobs/', [JobsController::class, 'index'])->name('site.jobs');
Route::get('job/{id}', [JobsController::class, 'jobindex'])->name('viewJob');
Route::get('news/', [NewsController::class, 'index']);
Route::get('news/{slug}', [NewsController::class, 'getNews']);
Route::get('page/{slug}', [PageController::class, 'index']);

Route::post('get-job-by-title', [HomeController::class, 'getJobsByTitle'])->name('getJobsByTitle');


Route::middleware(['auth'])->group(function () {
    Route::get('/apply-job/{id}', [DashController::class, 'applyjob']);
    Route::get('/remove-application/{id}', [DashController::class, 'removeApplication']);
});

Route::prefix('ajax')->group(function () {
    Route::post('/countries', [LocationAjaxController::class, 'countries']);
    Route::post('/states', [LocationAjaxController::class, 'states']);
    Route::post('/cities', [LocationAjaxController::class, 'cities']);
    Route::post('/districts', [LocationAjaxController::class, 'districts'])->name('getAjaxDistricts');
});