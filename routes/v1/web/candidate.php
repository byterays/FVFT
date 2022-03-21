<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Candidates\AuthController;
use App\Http\Controllers\Candidates\DashController;
use App\Http\Controllers\Candidates\JobController;
use App\Http\Controllers\Candidates\ProfileController;
use App\Http\Controllers\Candidates\SettingController;

Route::get('/login', [AuthController::class, 'login'])->name('candidate.login');
Route::post('/register', [AuthController::class, 'register'])->name('candidate.register');
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashController::class, 'dashboard'])->name('candidate.dashboard');
    Route::get('/jobs', [DashController::class, 'jobs'])->name('candidate.jobs');
    Route::get('/profile', [DashController::class, 'profile'])->name('candidate.profile');
    Route::get('/show/{id}', [DashController::class, 'show'])->name('candidate.profile.show');
    Route::get('/safty-tips', [DashController::class, 'safty-tips'])->name('candidate.safty-tips');
    Route::get('settings', [DashController::class, 'settings'])->name('candidate.settings');
    Route::get('job-preferences', [DashController::class, 'job_preferences'])->name('candidate.job-preferences');

    // Save Profile
    Route::post('/profile', [DashController::class, 'saveProfile'])->name('candidate.save-profile');
    Route::post('/job-preferences', [DashController::class, 'saveJobPreferences'])->name('candidate.save-job-preferences');
    Route::post('/settings', [DashController::class, 'saveSettings'])->name('candidate.save-settings');

    Route::put('/update-profile/{id}', [DashController::class, 'update'])->name('candidate.updateProfile');

    Route::group(['prefix' => 'company/', 'as' => 'candidate.'], function(){
        Route::get('lists', [DashController::class, 'company_lists'])->name('company_lists');
    });

    Route::group(['prefix' => 'saved-jobs/', 'as' => 'candidate.savedjob.'], function(){
        Route::get('lists', [JobController::class, 'saveJobLists'])->name('saveJobLists');
        Route::post('store', [JobController::class, 'saveJob'])->name('saveJob');
        Route::delete('delete/{id}', [JobController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'recommended-job/', 'as' => 'candidate.'], function(){
        Route::get('', [JobController::class, 'recommended_job'])->name('recommended_job');
    });


    // Workout on New profile design
    Route::group(['prefix' => 'profile/', 'as' => 'candidate.profile.'], function(){
        Route::get('index', [ProfileController::class, 'profile'])->name('index');
        Route::get('get-personal-information',[ProfileController::class, 'get_personal_information'])->name('get_personal_information');
        Route::post('post-personal-information',[ProfileController::class, 'post_personal_information'])->name('post_personal_information');
        Route::get('get-contact-information',[ProfileController::class, 'get_contact_information'])->name('get_contact_information');
        Route::post('post-contact-information',[ProfileController::class, 'post_contact_information'])->name('post_contact_information');
        Route::get('get-qualification',[ProfileController::class, 'get_qualification'])->name('get_qualification');
        Route::post('post-qualification',[ProfileController::class, 'post_qualification'])->name('post_qualification');
        Route::get('get-experience', [ProfileController::class, 'get_experience'])->name('get_experience');
        Route::post('post-experience', [ProfileController::class, 'post_experience'])->name('post_experience');
        Route::get('get-preview', [ProfileController::class, 'get_preview'])->name('get_preview');
        Route::get('get-save', [ProfileController::class, 'get_save'])->name('get_save');
    });

    Route::group(['prefix' => 'account-setting/', 'as' => 'candidate.account_setting.'], function(){
        Route::get('index', [SettingController::class, 'get_setting'])->name('index');
        Route::post('update-setting', [SettingController::class, 'update_setting'])->name('update_setting');
    });
});
