<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;
use App\Models\Job;
use DB;

class JobsController extends Controller
{
    use ThemeMethods;
    public function index(Request $request)
    {
        // $jobs = new Job();
        $jobs = Job::whereIn('status', ['Active', 'Published', 'Approved']);
        global $search;
        if ($request->filled('search')) {
            $search = $request->search;
            $jobs = $jobs->orWhere(function ($jobs) {
                global $search;
                $jobs->where('title', 'LIKE', '%' . $search . '%');
            });
        }
        if($request->filled('country_id') && $request->country_id != 'All Countries'){
            $jobs = $jobs->where('country_id', $request->country_id);
        }
        if ($request->filled("job_catagory") && $request->job_catagory != 'All Categories') {
            // foreach ($request->job_category as $item) {
            //     $jobs = $jobs->where('job_categories_id', $item);
            // }
            $jobs = $jobs->whereIn('job_categories_id', (array)$request->job_catagory);
        }
        // dd($jobs->where('job_categories_id', $request->job_category)->get());
        $request->filled("salary_from") ? $jobs->where('salary_from', ">=", $request->salary_from) : null;
        $request->filled("salary_to") ? $jobs->where('salary_to', "<=", $request->salary_to) : null;
        $job_categories = DB::table('job_categories')->get();
        $job_shifts = DB::table('job_shifts')->get();
        $jobs = $jobs->paginate(9)->setPath('');
        $fields = [
            "jobs" => $jobs,
            "pagination" => $jobs->appends(array(
                'search' => $request->search,
                'country_id' => $request->country_id,
                'job_catagory' => $request->job_catagory,
                'salary_from' => $request->salary_from,
                'salary_to' => $request->salary_to,
                
            )),
            "job_categories" => $job_categories,
            "job_shifts" => $job_shifts,
        ];
        if (auth()->check() && auth()->user()->user_type == "candidate") {
            $employ = \DB::table('employes')->where('user_id', auth()->user()->id)->first();
            $job_preference = DB::table('employ_job_preference')->where('employ_id', $employ->id)->first();
            $fields['job_preference'] = $job_preference;
            $fields['employ'] = $employ;
        }
        return $this->site_view("site.jobs", $fields);
    }
    public function jobindex($id)
    {
        $job = Job::find($id);
        if ($job) {
            $company = DB::table('companies')->where('id', $job->company_id)->first();
            $company_contact_persons = DB::table('company_contact_persons')->where('company_id', $job->company_id)->first();
            $fields = [
                "job" => $job,
                "company_contact_persons" => $company_contact_persons,
                "company" => $company
            ];
            if (auth()->check() && auth()->user()->user_type == "candidate") {
                $employ = \DB::table('employes')->where('user_id', auth()->user()->id)->first();
                $application = DB::table('job_applications')->where('job_id', $id)->where('employ_id', $employ->id)->first();
                $fields['application'] = $application;
                $fields['employ'] = $employ;
            }
            return $this->site_view("site.job_view", $fields);
        } else {
            return abort(404);
        }
    }
}
