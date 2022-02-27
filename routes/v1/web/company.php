<?php

use App\Http\Controllers\Company\ApplicantController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Company\AuthController;
use App\Http\Controllers\Company\DashController;
use App\Http\Controllers\Company\JobController;

Route::get('/login', [AuthController::class, 'login'])->name('company.login');
Route::post('/register', [AuthController::class, 'register'])->name('company.register');
Route::middleware(['auth', 'is_company'])->group(function () {
    Route::get('/', [DashController::class, 'dashboard'])->name('company.dash');
    Route::get('/profile', [DashController::class, 'profile'])->name('company.edit_profile');
    Route::post('/profile', [DashController::class, 'saveProfile'])->name('company.save_profile');
    Route::put('/update/{id}', [DashController::class, 'updateProfile'])->name('company.update_profile');
    Route::get('/view-my-profile', [DashController::class, 'show'])->name('company.view_profile');

    Route::get('/jobs', [DashController::class, 'jobs'])->name('company.jobs');
    // Route::get('/edit/job/{id}', [DashController::class, 'edit'])->name('company.editjob');
    Route::get('/applicants', [DashController::class, 'applicants'])->name('company.applicants');
    Route::get('/settings', [DashController::class, 'profile'])->name('company.settings');


    Route::get('add-new-job', [JobController::class, "addNewJob"])->name("company.addNewJob");
    Route::post('save-new-job', [JobController::class, "saveNewJob"])->name("company.saveNewJob");
    Route::get('/edit/job/{id}', [JobController::class, 'edit'])->name('company.editjob');
    Route::put('/udpate/job/{id}', [JobController::class, 'updateJob'])->name('company.updateJob');

    Route::group(['prefix' => 'applicants/', 'as' => 'company.applicant.'], function(){
        Route::get('', [ApplicantController::class, 'applicants'])->name('index');
    });
});
