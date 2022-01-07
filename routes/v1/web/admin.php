<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Jobs\AjaxJobController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Jobs\JobsController;
use App\Http\Controllers\Admin\Jobs\JobsAjaxController;
use App\Http\Controllers\Admin\Location\LocationAjaxController;

use App\Http\Controllers\Admin\Companies\CompanyController;
use App\Http\Controllers\Admin\Candidates\CandidateController;

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
    // Companies Crude
    Route::prefix('companies')->group(function(){
        Route::get('/',[CompanyController::class,'list'])->name('admin.companies.list');
        Route::get('new',[CompanyController::class,'new'])->name('admin.companies.new');
        Route::get('edit/{id}',[CompanyController::class,'edit'])->name('admin.companies.edit');
        Route::get('delete/{id}',[CompanyController::class,'delete'])->name('admin.companies.delete');
        Route::post('save',[CompanyController::class,'save']);
    });

    // Candidate Crude
    Route::prefix('candidates')->group(function(){
        Route::get('/',[CandidateController::class,'list'])->name('admin.candidates.list');
        Route::get('new',[CandidateController::class,'new'])->name('admin.candidates.new');
        Route::get('edit/{id}',[CandidateController::class,'edit'])->name('admin.candidates.edit');
        Route::get('delete/{id}',[CandidateController::class,'delete'])->name('admin.candidates.delete');
        Route::post('save',[CandidateController::class,'save']);
    });
    
    Route::post('logout',[AuthController::class,'logout']);
    // Ajax Requests
});
