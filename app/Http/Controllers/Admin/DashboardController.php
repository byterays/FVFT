<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Models\District;
use App\Models\JobApplication;
use App\Traits\Admin\AdminMethods;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    use AdminMethods;
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    /* public function index(){
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
    } */

    public function index()
    {
        return $this->view('admin.dashboard', [
            "first_datas" => $this->__datas()['first_row'],
            "second_datas" => $this->__datas()['second_row'],
        ]);
    }

    private function __datas()
    {
        return [
            "first_row" => [
                [
                    "title" => 'Countries',
                    "totalcount" => Country::where('is_active', 1)->count(),
                    "link" => "",
                    "icon" => "icon icon-people"
                ],
                [
                    "title" => 'Employers',
                    "totalcount" => Company::where('is_active', 1)->count(),
                    "link" => "",
                    "icon" => "icon icon-people"
                ],
                [
                    "title" => 'Applicants',
                    "totalcount" => JobApplication::count(),
                    "link" => "",
                    "icon" => "icon icon-people"
                ],
                [
                    "title" => 'Registered User',
                    "totalcount" => User::whereIn('user_type', ['candidate', 'company'])->count(),
                    "link" => "",
                    "icon" => "icon icon-people"
                ],
            ],
            "second_row" => [
                [
                    "title" => "New Message",
                    "totalcount" => 20,
                    "icon" => "icon icon-people",
                    "link" => ""
                ],
                [
                    "title" => "New Notification",
                    "totalcount" => 2,
                    "icon" => "icon icon-people",
                    "link" => ""
                ],
                [
                    "title" => "Online Users",
                    "totalcount" => 20,
                    "icon" => "icon icon-people",
                    "link" => ""
                ],
            ],
        ];
    }

    public function storeDistrict()
    {
        $date = date('Y-m-d h:i:s');
        $files = file_get_contents(public_path('files/districts.txt'));
        $districts = json_decode($files);
        foreach ($districts as $district) {
            $data = District::create([
                'state_id' => $district->state_id,
                'name' => $district->name,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
        echo 'success';
    }
}
