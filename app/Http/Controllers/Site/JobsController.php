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
        $jobs = new Job();
        global $search;
        if ($request->has('search')) {
            $search = $request->search;
            $jobs = $jobs->orWhere(function ($jobs) {
                global $search;
                $jobs->where('title', 'LIKE', '%' . $search . '%');
            });
        }
        if ($request->has("job_catagory")) {
            foreach ($request->job_catagory as $item) {
                $jobs = $jobs->where('job_categories_id', $item);
            }
        }
        $request->has("salary_from") ? $jobs->where('salary_from', ">=", $request->salary_from) : null;
        $request->has("salary_to") ? $jobs->where('salary_to', "<=", $request->salary_to) : null;
        // dd($jobs->toSql());
        $job_categories = DB::table('job_categories')->get();
        $job_shifts = DB::table('job_shifts')->get();
        $employ = \DB::table('employes')->where('user_id', auth()->user()->id)->first();
        $job_preference = DB::table('employ_job_preference')->where('employ_id', $employ->id)->first();
        // $request->has('job_catagory')?$jobs->where('')
        return $this->site_view("site.jobs", [
            "jobs" => $jobs->paginate(9),
            "job_categories" => $job_categories,
            "job_shifts" => $job_shifts,
            'job_preference' => $job_preference
        ]);
    }
    public function jobindex($id)
    {
        $job = Job::find($id);
        $company = DB::table('companies')->where('id', $job->company_id)->first();
        $company_contact_persons = DB::table('company_contact_persons')->where('company_id', $job->company_id)->first();

        return $this->site_view("site.job_view", [
            "job" => $job,
            "company_contact_persons" => $company_contact_persons,
            "company" => $company
        ]);
    }
    public function applyjob($id)
    {
        $employ = \DB::table('employes')->where('user_id', auth()->user()->id)->first();
        $is_exist = \DB::table("job_applications")->where('job_id', $id)->where('employ_id', $employ->id)->first();
        if (!$is_exist) {
            \DB::table("job_applications")->insert([
                "job_id" => $id,
                "employ_id" => $employ->id
            ]);
        }
        return redirect()->route('candidate.dashboard');
    }
}
