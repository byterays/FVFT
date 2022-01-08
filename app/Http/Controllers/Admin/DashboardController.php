<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Admin\AdminMethods;

class DashboardController extends Controller
{   
     use AdminMethods;
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index(){
        $companies=\DB::table('companies');
        $jobs=\DB::table('jobs');
        $employes=\DB::table('employes');
        $applicants=\DB::table('job_applications')->distinct('employ_id');
        return  $this->view('admin.dashboard',
        [
            "companies" => $companies->limit(10)->orderBy('id')->get(),
            "totals"=>[
                [
                    "title"=>"Companies",
                    "links"=>"admin/companies/",
                    "total"=>$companies->count()
                ],
                [
                    "title"=>"Jobs",
                    "links"=>"admin/jobs/",
                    "total"=>$jobs->count()
                ],
                [
                    "title"=>"Candidates",
                    "links"=>"admin/candidates/",
                    "total"=>$employes->count()
                ],
                [
                    "title"=>"Applicants",
                    "links"=>"admin/applicants/",
                    "total"=>$applicants->count()
                ],
            ],
            "latest_jobs"=>$jobs->limit(2)->orderBy('id')->get()
        ]);
    }
}
