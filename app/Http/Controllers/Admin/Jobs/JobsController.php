<?php

namespace App\Http\Controllers\Admin\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Traits\Admin\AdminMethods;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $jobs = DB::table('jobs')->where('draft_status', 0);
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
        if($request->filled('job_status')){
            if($request->job_status == 'Pending'){
                $jobs = $jobs->where('is_active', 0);
            } else if($request->job_status == 'Approved'){
                $jobs = $jobs->where('approval_status', 1);
            } else if($request->job_status == 'Published'){
                $jobs = $jobs->where('publish_status', 1);
            } else if($request->job_status == 'Expired'){
                $jobs = $jobs->where('is_expired', 1);
            }
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
    public function edit($id)
    {
        // return $this->view('admin.pages.jobs.editadd', [
        return $this->view('admin.pages.jobs.edit', [
            'job' => Job::findOrFail($id),
            "companies" => $this->companies,
            "experiencelevels" => $this->experiencelevels,
            "job_shifts" => $this->job_shifts,
            "job_categories" => $this->job_categories,
            "educationlevels" => $this->educationlevels,
            "countries" => $this->countries,
            'skills' => DB::table('skills')->get(),
        ]);
    }
    function new () {
        // return $this->view('admin.pages.jobs.editadd', [
        return $this->view('admin.pages.jobs.create', [
            "companies" => $this->companies,
            "experiencelevels" => $this->experiencelevels,
            "job_shifts" => $this->job_shifts,
            "job_categories" => $this->job_categories,
            "educationlevels" => $this->educationlevels,
            "countries" => $this->countries,
            'skills' => DB::table('skills')->get(),
        ]);
    }

    public function viewJob($id)
    {
        return $this->view('admin.pages.jobs.viewjob',[
            "job" => Job::where('id',$id)->with(['company'])->firstOrFail()
        ]);
    }

    public function save(Request $request)
    {
        $job = new Job();
        // $job = DB::table('jobs');
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

    private $redirectTo = 'admin.jobs-list';
    private $destination = 'uploads/jobs/';
    private $picturedestination = 'uploads/jobs/pictures/';

    public function saveNewJob(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'title' => ['required'],
            'company_id' => ['required'],
            'male_employee' => ['required'],
            'female_employee' => ['required'],
            'any_employee' => ['nullable'],
            'feature_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
            // 'picture.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg'],
            'category_id' => ['required'],
            'education_level' => ['required'],
            'working_hours' => ['required'],
            'working_days' => ['required'],
            'contract_year' => ['required'],
            'contract_month' => ['required'],
            'accomodation' => ['required'],
            'food' => ['required'],
            'annual_vacation' => ['required'],
            'over_time' => ['required'],
            'country_salary' => ['required'],
            'nepali_salary' => ['required'],
            'country' => ['required'],
            'state' => ['required'],
        ],[
            'company_id.required' => 'Company is required',
            'category_id.required' => 'Category is required',
            'category.required' => 'Job Category is required',
            'education_level.required' => 'Education level is required',
            'experiencelevel.required' => 'Experience Level is required',
            'country_salary.required' => 'The Salary field is required',
            'nepali_salary.required' => 'The Nepali Salary field is required',
        ]);

        if($Validator->fails()){
            return response()->json(['errors' => $Validator->errors()]);
        }

        if($Validator->passes()){
            try{
                DB::beginTransaction();
                $job = new Job();
                $this->__saveOrUpdateJob($job, $request, '', '');
                // $job->status = $request->job_status != null ? 1 : 0;
                if($request->job_status == 'Approved'){
                    $job->approval_status = 1;
                    $job->status = "Approved";
                } else {
                    $job->approval_status = 0;
                    $job->status = "Not Approved";
                }
                $job->save();
                DB::commit();
                return response()->json(['msg' => 'Job created successfully', 'redirectRoute' => route($this->redirectTo)]);
            } catch(\Exception $e){
                DB::rollBack();
                return response()->json(['db_error' => $e->getMessage()]);
            }
        }

    }

    public function updateJob(Request $request, $id)
    {
        // dd($request->all());
        $Validator = Validator::make($request->all(), [
            'title' => ['required'],
            'company_id' => ['required'],
            'male_employee' => ['required'],
            'female_employee' => ['required'],
            'any_employee' => ['nullable'],
            'feature_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
            'picture.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg'],
            'category_id' => ['required'],
            'education_level' => ['required'],
            'working_hours' => ['required'],
            'working_days' => ['required'],
            'contract_year' => ['required'],
            'contract_month' => ['required'],
            'accomodation' => ['required'],
            'food' => ['required'],
            'annual_vacation' => ['required'],
            'over_time' => ['required'],
            'country_salary' => ['required'],
            'nepali_salary' => ['required'],
            'country' => ['required'],
            'state' => ['required'],
        ],[
            'company_id.required' => 'Company is required',
            'category_id.required' => 'Category is required',
            'category.required' => 'Job Category is required',
            'education_level.required' => 'Education level is required',
            'experiencelevel.required' => 'Experience Level is required',
            'country_salary.required' => 'The Salary field is required',
            'nepali_salary.required' => 'The Nepali Salary field is required',
        ]);

        if($Validator->fails()){
            return response()->json(['errors' => $Validator->errors()]);
        }

        if($Validator->passes()){
            try{
                DB::beginTransaction();
                $job = Job::find($id);
                $oldImage = $job->feature_image_url;
                $oldPicture = $job->pictures;
                $oldStatus = $job->status;
                $this->__saveOrUpdateJob($job, $request, $oldImage, $oldPicture);
                $job->status = $request->job_status != null ? $request->job_status : $oldStatus;
                if($request->job_status == 'Approved'){
                    $job->approval_status = 1;
                } else {
                    $job->approval_status = 0;
                }
                $job->publish_status = $request->publish_status != null ? 1 : 0;
                $job->save();
                DB::commit();
                return response()->json(['msg' => 'Job updated', 'redirectRoute' => route($this->redirectTo)]);
            } catch(\Exception $e){
                DB::rollBack();
                return response()->json(['db_error' => $e->getMessage()]);
            }
        }
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

    private function __saveOrUpdateJob($job, $request, $oldImage='', $oldPicture='')
    {
        $job->company_id = $request->company_id;
        $job->title = $request->title;
        $job->description = $request->job_description;
        $job->description_intro = $request->job_description_intro;
        if($request->has('feature_image')){
            $image = $request->file('feature_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $job->feature_image_url = $this->destination . $imageName;
            $image->move(public_path($this->destination, 'public'), $imageName);
        } else {
            $job->feature_image_url = $oldImage;
        }
        
        $job->benefits = $request->other_benefits;
        $job->salary_from = $request->salary_from;
        $job->salary_to = $request->salary_to;
        $job->hide_salary = $request->hide_salary != null ? 1 : 0;
        $job->salary_currency = null;
        $job->job_categories_id = $request->category_id;
        $job->job_shift_id = $request->job_shift;
        $job->num_of_positions = $request->male_employee + $request->female_employee + $request->any_employee;
        $job->expiry_date = $request->deadline;
        $job->education_level_id = $request->education_level;
        $job->job_experience_id = $request->experiencelevel;
        $job->is_active = $request->is_active != null ? 1 : 0;
        $job->is_featured = $request->is_featured != null ? 1 : 0;
        $job->country_id = $request->country;
        $job->state_id = $request->state;
        $job->city_id = $request->city_id;
        $job->country_salary = $request->country_salary;
        $job->nepali_salary = $request->nepali_salary;
        $job->no_of_male = $request->male_employee;
        $job->no_of_female = $request->female_employee;
        $job->any_gender = $request->any_employee;
        $job->working_hours = $request->working_hours;
        $job->working_days = $request->working_days;
        $job->contract_year = $request->contract_year;
        $job->contract_month = $request->contract_month;
        $job->contract_description = $request->contract_description;
        $job->min_experience = $request->min_experience;
        $job->max_experience = $request->max_experience;
        $job->min_age = $request->min_age;
        $job->max_age = $request->max_age;
        if (!empty($request->skills)) {
            foreach ($request->skills as $key => $skill) {
                $skillData[] = $skill;
            }
            $job->skills = json_encode($skillData);
        }
        $job->requirement_intro = $request->requirement_intro;
        $job->requirements = $request->other_requirements;
        $job->benefit_intro = $request->benefit_intro;
        $job->accomodation = $request->accomodation;
        $job->food = $request->food;
        $job->annual_vacation = $request->annual_vacation;
        $job->over_time = $request->over_time;
        $job->pictures = '';
        if ($request->hasFile('picture')) {
            if(!file_exists($this->picturedestination)){
                mkdir($this->picturedestination, 077, true);
            }
            foreach ($request->file('picture') as $file) {
                $photoName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path($this->picturedestination, 'public'), $photoName);
                $photoData[] = $this->picturedestination . $photoName;
            }
            $job->pictures = json_encode($photoData);
        } else {
            $job->pictures = $oldPicture;
        }
    }
}
