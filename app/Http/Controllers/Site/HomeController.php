<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;

class HomeController extends Controller
{
    use ThemeMethods;
    public function home()
    {
        $news = \DB::table('news')->where('is_active', 1)->orderBy('id', 'desc')->limit(10)->get();
        $companies = \DB::table('companies')->where('is_active', 1)->orderBy('id', 'desc')->limit(10)->get();
        $latest_jobs = \DB::table('jobs')->where('is_active', 1)->orderBy('id', 'desc')->limit(10)->get();
        return $this->site_view('site.home', ['news' => $news, 'companies' => $companies, 'latest_jobs' => $latest_jobs]);
    }
    public function companies(Request $request)
    {
        $companies = \DB::table('companies')->paginate(10);
        return $this->site_view('site.companies', ["companies" => $companies]);
    }
    public function company($id)
    {
        $company = \DB::table('companies')->find($id);
        $company_jobs = \DB::table('jobs')->where("company_id", $id)->paginate(10);
        return $this->site_view('site.company-view', ['company' => $company, "company_jobs" => $company_jobs]);
    }



    public function getJobsByTitle(Request $request)
    {
        // $jobs = Job::where(($request->product_id);
    }
}
