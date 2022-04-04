<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Models\District;
use App\Models\JobApplication;
use App\Traits\Admin\AdminMethods;
use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Job;
use Illuminate\Support\Facades\File;

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
            "job_datas" => $this->__datas()['job_row'],
            "application_datas" => $this->__datas()['application_row'],
            "job_requests" => Job::where('status', 'Pending')->latest()->take(5)->with(['country:id,name', 'company:id,company_name'])->get(),
            "recent_applicants" => JobApplication::where('status', 'pending')->latest()->take(3)->with(['job:id,title', 'employe:id,first_name,middle_name,last_name'])->get(),
            "recent_published_jobs" => Job::where('status', 'Published')->latest()->take(3)->with(['company:id,company_name'])->get(),
            "recent_registered_employers" => Company::latest()->take(3)->with(['country:id,name'])->get(),
            "recent_registered_users" => Employe::orderBy('id', 'desc')->take(3)->get()
        ]);
    }

    private function __datas()
    {
        return [
            "first_row" => [
                [
                    "title" => 'Countries',
                    "totalcount" => Country::where('is_active', 1)->count('id'),
                    "link" => "",
                    "icon" => "icon icon-people"
                ],
                [
                    "title" => 'Employers',
                    "totalcount" => Company::where('is_active', 1)->count('id'),
                    "link" => "",
                    "icon" => "icon icon-people"
                ],
                [
                    "title" => 'Applicants',
                    "totalcount" => JobApplication::count('id'),
                    "link" => "",
                    "icon" => "icon icon-people"
                ],
                [
                    "title" => 'Registered User',
                    "totalcount" => User::whereIn('user_type', ['candidate', 'company'])->count('id'),
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
            "job_row" => [
                [
                    "title" => "Approved Jobs",
                    "totalcount" => Job::where('status', 'Approved')->count('id'),
                    "icon" => "icon icon-people",
                    "link" => ""
                ],
                [
                    "title" => "Pending Jobs",
                    "totalcount" => Job::where('status', 'Pending')->count('id'),
                    "icon" => "icon icon-people",
                    "link" => ""
                ],
                [
                    "title" => "Active Jobs",
                    "totalcount" => Job::where('status', 'Active')->count('id'),
                    "icon" => "icon icon-people",
                    "link" => ""
                ],
                [
                    "title" => "Expired Jobs",
                    "totalcount" => Job::where('status', 'Expired')->count('id'),
                    "icon" => "icon icon-people",
                    "link" => ""
                ],
            ],
            "application_row" => [
                [
                    "title" => "All Applications",
                    "img" => "megaphone.svg",
                    "totalcount" => JobApplication::count(),
                    "link" => "",
                    "background" => "red",
                ],
                [
                    "title" => "Unscreened Applications",
                    "img" => "megaphone.svg",
                    "totalcount" => JobApplication::where('status', 'pending')->count(),
                    "link" => "",
                    "background" => "red",
                ],
                [
                    "title" => "Shortlisted Applications",
                    "img" => "megaphone.svg",
                    "totalcount" => JobApplication::where('status', 'shortlisted')->count(),
                    "link" => "",
                    "background" => "red",
                ],
                [
                    "title" => "Interviewed Applications",
                    "img" => "megaphone.svg",
                    "totalcount" => JobApplication::where('status', 'selectedForInterview')->count(),
                    "link" => "",
                    "background" => "red",
                ],
                [
                    "title" => "Selected Applications",
                    "img" => "megaphone.svg",
                    "totalcount" => JobApplication::where('status', 'accepted')->count(),
                    "link" => "",
                    "background" => "red",
                ],
                [
                    "title" => "Rejected Applications",
                    "img" => "megaphone.svg",
                    "totalcount" => JobApplication::where('status', 'rejected')->count(),
                    "link" => "",
                    "background" => "red",
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
