<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Traits\Site\CompanyMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    use CompanyMethods;

    public function applicants()
    {
        $applicants = JobApplication::whereHas('job', function ($query) {
            return $query->whereHas('company', function ($query2) {
                    return $query2->where('user_id', Auth::user()->id);
            }); 
        })->get();
        dd($applicants);
        return $this->company_view('company.applicant.index', ['applicants' => $applicants]);
    }
}
