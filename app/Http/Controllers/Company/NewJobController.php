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
        $job = $request->session()->get($this->job_session);
        return $this->company_view('company.newjob.get_job',[
            'job' => $job,
            'job_categories' => $this->job_categories,
            'countries' => $this->countries,
        ]);
    }

    public function postJobDetail(Request $request)
    {
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
            $input = $request->except("_token");
            if(empty($request->session()->get($this->job_session))){
                $job = new Job();
                $job->fill($input);
                $request->session()->put($this->session, $job);
            } else {
                $job = $request->session()->get($this->job_session);
                $job->fill($input);
                $request->session()->put($this->session, $job);
            }
            $redirectTo = route('company.newjob.applicant_detail');
            return response()->json(['redirectRoute' => $redirectTo]);
        }
    }
}
