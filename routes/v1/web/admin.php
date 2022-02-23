<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Ajax\AddController;
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
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\Industry\IndustryController;
use App\Http\Controllers\Admin\Training\TrainingController;

Route::get('login', function () {
    return view('admin.auth.login');
})->name('admin.login');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/jobs-list', [JobsController::class, 'index'])->name('admin.jobs-list');
    Route::get('/jobs-save', [JobsController::class, 'edit']);
    Route::post('/jobs-save', [JobsController::class, 'save']);
    Route::get('/jobs-delete', [JobsController::class, 'delete']);
    Route::get('/jobs-new', [JobsController::class, 'new']);
    // Companies Crude
    Route::prefix('companies')->group(function () {
        Route::get('/', [CompanyController::class, 'list'])->name('admin.companies.list');
        Route::get('new', [CompanyController::class, 'new'])->name('admin.companies.new');
        Route::get('edit/{id}', [CompanyController::class, 'edit'])->name('admin.companies.edit');
        Route::get('delete/{id}', [CompanyController::class, 'delete'])->name('admin.companies.delete');
        Route::post('save', [CompanyController::class, 'save']);
        Route::get('show/{id}', [CompanyController::class, 'show'])->name('admin.companies.show');
    });

    // Candidate Crude
    Route::prefix('candidates')->group(function () {
        Route::get('/', [CandidateController::class, 'list'])->name('admin.candidates.list');
        Route::get('new', [CandidateController::class, 'new'])->name('admin.candidates.new');
        Route::get('create', [CandidateController::class, 'create'])->name('admin.candidates.create');
        Route::get('edit/{id}', [CandidateController::class, 'edit'])->name('admin.candidates.edit');
        Route::get('edit-candidate/{id}', [CandidateController::class, 'editCandidate'])->name('admin.candidates.editCandidate');
        Route::get('delete/{id}', [CandidateController::class, 'delete'])->name('admin.candidates.delete');
        Route::post('save', [CandidateController::class, 'save']);
        Route::post('store', [CandidateController::class, 'store'])->name('admin.canidates.store');
        Route::put('update-candidate/{id}', [CandidateController::class, 'update'])->name('admin.canidates.update');
    });
    // Applicants Crude
    Route::prefix('applicants')->group(function () {
        Route::get('/', [ApplicantController::class, 'list'])->name('admin.applicants.list');
        Route::get('new', [ApplicantController::class, 'new'])->name('admin.applicants.new');
        Route::get('edit/{id}', [ApplicantController::class, 'edit'])->name('admin.applicants.edit');
        Route::get('delete/{id}', [ApplicantController::class, 'delete'])->name('admin.applicants.delete');
        Route::post('save', [ApplicantController::class, 'save']);
    });
    //Pages Crude
    Route::prefix('pages')->group(function () {
        Route::get('/', [PageController::class, 'list'])->name('admin.pages.list');
        Route::get('new', [PageController::class, 'new'])->name('admin.pages.new');
        Route::get('edit/{id}', [PageController::class, 'edit'])->name('admin.pages.edit');
        Route::get('delete/{id}', [PageController::class, 'delete'])->name('admin.pages.delete');
        Route::post('save', [PageController::class, 'save']);
    });

    //News Crude
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'list'])->name('admin.news.list');
        Route::get('new', [NewsController::class, 'new'])->name('admin.news.new');
        Route::get('edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
        Route::get('delete/{id}', [NewsController::class, 'delete'])->name('admin.news.delete');
        Route::post('save', [NewsController::class, 'save']);
    });

    // Industry Crud
    
    Route::group(['prefix' => 'industry/', 'as' => 'admin.industry.'], function(){
        Route::get('', [IndustryController::class, "index"])->name("index");
        Route::get('create', [IndustryController::class, "create"])->name("create");
        Route::post('store', [IndustryController::class, "store"])->name("store");
        Route::get("edit/{id}", [IndustryController::class, "edit"])->name("edit");
        Route::match(['put', 'patch'], 'update/{id}', [IndustryController::class, "update"])->name("update");
        Route::delete('delete/{id}', [IndustryController::class, "delete"])->name("delete");
        Route::post('update-status', [IndustryController::class, "updateStatus"])->name("updateStatus");
    });

    Route::group(['prefix' => 'training/', 'as' => 'admin.training.'], function(){
        Route::get('', [TrainingController::class, "index"])->name("index");
        Route::get("create", [TrainingController::class, "create"])->name("create");
        Route::post("store", [TrainingController::class, "store"])->name("store");
        Route::get("edit/{id}", [TrainingController::class, "edit"])->name("edit");
        Route::match(['put', 'patch'], "update/{id}", [TrainingController::class, "update"])->name("update");
        Route::post('update-status', [TrainingController::class, "updateStatus"])->name("updateStatus");
        Route::delete('delete/{id}', [TrainingController::class, "delete"])->name("delete");
        Route::post('ajax-store-training', [TrainingController::class, "ajaxStoreTraining"])->name("ajaxAddTraining");
    });
    Route::group(['prefix' => 'skill/', 'as' => 'admin.skill.'], function(){
        Route::post('ajax-store-skill', [AddController::class, "ajaxStoreSKill"])->name("ajaxAddSkill");
    });

    Route::group(['prefix' => 'user/', 'as' => 'admin.user.'], function(){
        Route::get('profile', [AdminController::class, "profile"])->name("profile");
        Route::put('update-profile', [AdminController::class, "updateProfile"])->name("updateProfile");
    });

    Route::post('logout', [AuthController::class, 'logout']);
    // Ajax Requests

    Route::get('store-district',[DashboardController::class, "storeDistrict"]);
});
