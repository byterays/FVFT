<?php

namespace App\Http\Controllers\Admin\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Traits\Admin\AdminMethods;
use DB;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    use AdminMethods;
    public function __construct()
    {
        $this->companies = \DB::table('companies')->get();
        $this->experiencelevels = \DB::table('experiencelevels')->get();
        $this->educationlevels = \DB::table('educationlevels')->get();
        $this->job_shifts = \DB::table('job_shifts')->get();
        $this->job_categories = \DB::table('job_categories')->get();
        $this->countries = \DB::table('countries')->get();
    }
    public function index(Request $request)
    {
        // if($request->action=="delete"){

        // }
        $jobs = DB::table('jobs');
        if ($request->filled('country_id')) {
            $jobs = $jobs->where('country_id', $request->country_id);
        }
        if ($request->filled('category_id')) {
            $jobs = $jobs->where('job_categories_id', $request->category_id);
        }
        if ($request->filled('employer_id')) {
            $jobs = $jobs->where('company_id', $request->employer_id);
        }
        if ($request->filled('title')) {
            $jobs = $jobs->where('title', 'like', '%' . $request->title . '%');
        }
        $jobs = $jobs->paginate(10)->setPath('');
        return $this->view('admin.pages.jobs.jobs_list', [
            'jobs' => $jobs,
            // 'jobs' => $jobs->paginate(10)->setPath(''),
            'pagination' => $jobs->appends(array(
                'title' => $request->title,
                'country_id' => $request->country_id,
                'category_id' => $request->category_id,
                'employer_id' => $request->employer_id,
                
            )),
            // 'jobs' => \DB::table('jobs')->paginate(10),
            "companies" => $this->companies,
            "experiencelevels" => $this->experiencelevels,
            "job_shifts" => $this->job_shifts,
            "job_categories" => $this->job_categories,
            "educationlevels" => $this->educationlevels,
            "countries" => $this->countries,
        ]);
    }
    public function edit()
    {
        return $this->view('admin.pages.jobs.editadd', [
            "companies" => $this->companies,
            "experiencelevels" => $this->experiencelevels,
            "job_shifts" => $this->job_shifts,
            "job_categories" => $this->job_categories,
            "educationlevels" => $this->educationlevels,
        ]);
    }
    function new () {
        return $this->view('admin.pages.jobs.editadd', [
            "companies" => $this->companies,
            "experiencelevels" => $this->experiencelevels,
            "job_shifts" => $this->job_shifts,
            "job_categories" => $this->job_categories,
            "educationlevels" => $this->educationlevels,
            "countries" => $this->countries,
        ]);
    }
    public function save(Request $request)
    {
        $job = DB::table('jobs');
        $request->has('company_id') ? $job->company_id = $request->company_id : null;
        $request->has('title') ? $job->title = $request->title : null;
        $request->has('description') ? $job->description = $request->description : null;
        // $request->has('feature_image_url')?$job->feature_image_url =$request->feature_image_url:null;
        $request->has('benefits') ? $job->benefits = $request->benefits : null;
        $request->has('salary_from') ? $job->salary_from = $request->salary_from : null;
        $request->has('salary_to') ? $job->salary_to = $request->salary_to : null;
        $request->has('hide_salary') ? $job->hide_salary = $request->hide_salary : null;
        $request->has('salary_currency') ? $job->salary_currency = $request->salary_currency : null;
        $request->has('job_categories_id') ? $job->job_categories_id = $request->job_categories_id : null;
        $request->has('job_shift_id') ? $job->job_shift_id = $request->job_shift_id : null;
        $request->has('num_of_positions') ? $job->num_of_positions = $request->num_of_positions : null;
        $request->has('expiry_date') ? $job->expiry_date = $request->expiry_date : null;
        $request->has('education_level_id') ? $job->education_level_id = $request->education_level_id : null;
        $request->has('job_experience_id') ? $job->job_experience_id = $request->job_experience_id : null;
        $request->has('is_active') ? $job->is_active = $request->is_active : null;

        $request->has('is_featured') ? $job->num_of_positions = $request->num_of_positions : null;
        $request->has('country_id') ? $job->expiry_date = $request->expiry_date : null;
        $request->has('state_id') ? $job->education_level_id = $request->education_level_id : null;
        $request->has('city_id') ? $job->job_experience_id = $request->job_experience_id : null;
        $request->has('search') ? $job->is_active = $request->is_active : null;
        $request->has('slug') ? $job->slug = $request->slug : null;
        $job->save();

        return $request;

    }
    public function delete(Request $request)
    {

        return $this->view('admin.pages.jobs.jobs_list', [
            'jobs' => \DB::table('jobs')->paginate(10),
            "companies" => $this->companies,
            "experiencelevels" => $this->experiencelevels,
            "job_shifts" => $this->job_shifts,
            "job_categories" => $this->job_categories,
            "educationlevels" => $this->educationlevels,
        ]);
        try {
            // DB::table('jobs')->delete($request->id);
            // return redirect()->route('admin.jobs-list',["page"=>$request->from,"dstatus"=>"sucess"]);

        } catch (\Throwable $th) {
            return redirect()->route('admin.jobs-list', ["page" => $request->from, "dstatus" => "failed"]);
        }
    }
    function list() {

    }
}
