<?php

namespace App\Http\Controllers\Compeny;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\CompanyMethods;
use App\Models\Job;

class JobsController extends Controller
{
    use CompanyMethods;
    public function index()
    {
        $jobs = Job::where('company_id', $this->company()->id);
        return $this->site_view('company.jobs', [
            'all_jobs' => $jobs->paginate(10),
            'active_jobs' => $jobs->where('is_active', 1)->paginate(10),
            'inactive_jobs' => $jobs->where('is_active', 0)->paginate(10),
            "company" => $this->company()
        ]);
    }
}
