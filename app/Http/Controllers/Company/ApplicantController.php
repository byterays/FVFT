<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Employe;
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
                    return $query2->where('user_id', Auth::user()->id)->with(['employe', 'job']);
            }); 
        })->paginate(10);
        return $this->company_view('company.applicant.index', ['applicants' => $applicants]);
    }


    public function applicant_detail($id)
    {
        $employ = Employe::where('id', $id)->with(['user'])->firstOrFail();
        return $this->company_view('company.applicant.detail', ['employ' => $employ]);
    }
}
