<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\News;
use DB;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;
use Illuminate\Notifications\DatabaseNotification as Notification;

class HomeController extends Controller
{
    use ThemeMethods;
    public function home()
    {
        $news = News::where('is_active', 1)->orderBy('id', 'desc')->limit(10)->get();
        $companies = Company::where('is_active', 1)->orderBy('id', 'desc')->limit(10)->get();
        $home_job_categories = JobCategory::limit(12)->get();
        $latest_jobs = Job::where('is_active', 1)
            ->with(['company', 'country', 'job_category'])
            ->orderBy('id', 'desc')->limit(10)->get();

        return $this->site_view('site.home',
            compact('news', 'companies', 'latest_jobs', 'home_job_categories')
        );
    }
    public function companies(Request $request)
    {
        $companies = Company::with([
            'country',
            'country',
            'state',
            'city',
            'industry',
            'jobs',
        ])->paginate(10);
        return $this->site_view('site.companies', ["companies" => $companies]);
    }
    public function company($id)
    {
        $company = Company::findOrFail($id);
        $company_jobs = Job::where("company_id", $id)->paginate(10);
        return $this->site_view('site.company-view', ['company' => $company, "company_jobs" => $company_jobs]);
    }



    public function getJobsByTitle(Request $request)
    {
        $jobs = Job::where('title', 'LIKE', '%'.$request->job_title.'%')->get();
        return $jobs;
    }


    public function markRead(Request $request)
    {
        $notification = Notification::find($request->id);
        $notification->markAsRead();
        if($notification->data['link'] != ''){
            return redirect($notification->data['link']);
        }
    }
}
