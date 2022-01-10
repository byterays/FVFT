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
use App\Http\Controllers\Admin\Pages\PageController;
use App\Http\Controllers\Admin\Applicants\ApplicantController;
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
    // Applicants Crude
    Route::prefix('applicants')->group(function(){
        Route::get('/',[ApplicantController::class,'list'])->name('admin.applicants.list');
        Route::get('new',[ApplicantController::class,'new'])->name('admin.applicants.new');
        Route::get('edit/{id}',[ApplicantController::class,'edit'])->name('admin.applicants.edit');
        Route::get('delete/{id}',[ApplicantController::class,'delete'])->name('admin.applicants.delete');
        Route::post('save',[ApplicantController::class,'save']);
    });
    //Pages Crude
    Route::prefix('pages')->group(function(){
        Route::get('/',[PageController::class,'list'])->name('admin.pages.list');
        Route::get('new',[PageController::class,'new'])->name('admin.pages.new');
        Route::get('edit/{id}',[PageController::class,'edit'])->name('admin.pages.edit');
        Route::get('delete/{id}',[PageController::class,'delete'])->name('admin.pages.delete');
        Route::post('save',[PageController::class,'save']);
    });
    
    Route::post('logout',[AuthController::class,'logout']);
    // Ajax Requests
});
