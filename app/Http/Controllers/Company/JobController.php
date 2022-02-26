<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Traits\Site\CompanyMethods;
use Illuminate\Http\Request;

class JobController extends Controller
{
    use CompanyMethods;

    public function __construct()
    {
        $this->experiencelevels = \DB::table('experiencelevels')->get();
        $this->educationlevels = \DB::table('educationlevels')->get();
        $this->job_shifts = \DB::table('job_shifts')->get();
    }

    public function addNewJob()
    {
        return $this->company_view('company.job.addNewJob', [
            'experience_levels' => $this->experiencelevels,
            'education_levels' => $this->educationlevels,
            'job_shifts' => $this->job_shifts,
        ]);
    }
}
