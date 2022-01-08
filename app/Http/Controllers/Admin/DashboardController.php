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
        return  $this->view('admin.dashboard',[
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
            ],
            "latest_jobs"=>$jobs->limit(2)->orderBy('id')->get()
        ]);
    }
}
