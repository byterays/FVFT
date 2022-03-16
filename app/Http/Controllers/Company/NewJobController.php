<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Traits\Site\CompanyMethods;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\EducationLevel;
use App\Models\ExperienceLevel;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobShift;
use Illuminate\Support\Facades\Validator;

class NewJobController extends Controller
{
    use CompanyMethods;

    public function __construct()
    {
        $GLOBALS['page-name'] = 'Job';
        $this->experiencelevels = ExperienceLevel::get();
        $this->educationlevels = EducationLevel::get();
        $this->job_shifts = JobShift::get();
        $this->job_categories = JobCategory::get();
        $this->countries = Country::get();
        $this->job_session = 'job_detail';
    }

    public function get_job_detail(Request $request)
    {
        $job = Job::where('id', $request->job_id)->first();
        return $this->company_view('company.newjob.get_job',[
            'job' => $job,
            'job_categories' => $this->job_categories,
            'countries' => $this->countries,
        ]);
    }

    public function postJobDetail(Request $request)
    {
        dd($request->all());
        // array:20 [
        //     "_token" => "h1pHFpk2tLjfLOlhLn0n3s1h8tTngy0ySPtU4qHl"
        //     "title" => null
        //     "job_id" => null
        //     "company_id" => "20"
        //     "company_name" => "NTJobs"
        //     "male_employee" => null
        //     "female_employee" => null
        //     "any_employee" => null
        //     "category_id" => null
        //     "working_hours" => null
        //     "working_days" => null
        //     "deadline" => null
        //     "country" => "1"
        //     "state" => "3870"
        //     "city_id" => "71"
        //     "contract_year" => null
        //     "contract_month" => null
        //     "job_description" => null
        //     "job_description_intro" => null
        //     "feature_image" => Illuminate\Http\UploadedFile {#1967
        //     }
        //   ]
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'company_id' => ['required'],
            'male_employee' => ['required'],
            'female_employee' => ['required'],
            'any_employee' => ['nullable'],
            'feature_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
            'category_id' => ['required'],
            'working_hours' => ['required'],
            'working_days' => ['required'],
            'contract_year' => ['required'],
            'contract_month' => ['nullable'],
            'country' => ['required'],
            'state' => ['required'],
        ],[
            'company_id.required' => 'Company is required',
            'category_id.required' => 'Category is required',
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        if($validator->passes()){
            $job = Job
            $redirectTo = route('company.newjob.get_applicant_form');
            return response()->json(['redirectRoute' => $redirectTo]);
        }
    }

    public function get_applicant_form(Request $request)
    {
        $job = Job::where('id', $request->job_id);
        return $this->company_view('company.newjob.get_applicant_form',[
            'job' => $job,
            "educationlevels" => $this->educationlevels,
            'skills' => DB::table('skills')->get(),
        ]);
    }
}
