<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Traits\Site\CompanyMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    use CompanyMethods;

    public function __construct()
    {
        $this->experiencelevels = DB::table('experiencelevels')->get();
        $this->educationlevels = DB::table('educationlevels')->get();
        $this->job_shifts = DB::table('job_shifts')->get();
    }

    public function addNewJob()
    {
        return $this->company_view('company.job.addNewJob', [
            'experience_levels' => $this->experiencelevels,
            'education_levels' => $this->educationlevels,
            'job_shifts' => $this->job_shifts,
        ]);
    }

    private $redirectTo = 'company.jobs';
    private $destination = 'uploads/jobs/';


    public function saveNewJob(Request $request)
    {
        // dd($request->all());
        $validator = $this->__validation($request->all());

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $job = new Job();
                $this->__saveOrUpdateJob($job, $request, '');
                $job->status = 'Not Approved';
                $job->save();
                DB::commit();
                return response()->json(['msg' => 'New job added', 'redirectRoute' => route($this->redirectTo)]);
            } catch(\Exception $e){
                DB::rollBack();
                return response()->json(['db_error' => $e->getMessage()]);
            }
        }
    }


    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $fields = [
            "job" => $job,
            "experience_levels" => $this->experiencelevels,
            "job_shifts" => $this->job_shifts,
            "education_levels" => $this->educationlevels,
        ];
        return $this->company_view('company.job.editjob', $fields);
    }


    public function updateJob(Request $request, $id)
    {
        $validator = $this->__validation($request->all());

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        if($validator->passes()){
            try{
                DB::beginTransaction();
                $job = Job::find($id);
                $oldImage = $job->feature_image_url;
                $oldStatus = $job->status;
                $this->__saveOrUpdateJob($job, $request, $oldImage);
                $job->status = $request->status != null ? $request->status : $oldStatus;
                $job->publish_status = $request->publish_status != null ? 1 : 0;
                $job->save();
                DB::commit();
                return response()->json(['msg' => 'Job updated successfully', 'redirectRoute' =>route($this->redirectTo)]);
            } catch(\Exception $e){
                DB::rollBack();
                return response()->json(['db_error' => $e->getMessage()]);
            }
        }
    }

    public function cloneJob($id)
    {
        try{
            $job = Job::findOrFail($id);
            $cloneJob = $job->replicate();
            $cloneJob->expiry_date = null;
            $cloneJob->is_active = 0;
            $cloneJob->is_featured = 0;
            $cloneJob->created_at = date('Y-m-d H:i:s');
            $cloneJob->updated_at = date('Y-m-d H:i:s');
            $cloneJob->status = 'Not Approved';
            $cloneJob->publish_status = 0;
            $cloneJob->approval_status = 0;
            $cloneJob->is_expired = 0;
            $cloneJob->save();
            return response()->json(['msg' => 'Job cloned successfully', 'redirectRoute' => route($this->redirectTo)]);
        } catch(\Exception $e){
            return response()->json(['exception' => $e->getMessage()]);
        }
        
    }


    private function __validation(array $data)
    {
        return Validator::make($data, [
            'job_title' => ['required'],
            'company_id' => ['required'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'job_category' => ['required'],
            'education_level' => ['required'],
            'experience_level' => ['required'],
        ],[
            'country_id.required' => 'Country is required',
            'state_id.required' => 'State is required',
            'job_category.required' => 'Job Category is required',
            'education_level.required' => 'Education level is required',
            'experience_level.required' => 'Experience Level is required',
        ]);
    }

    private function __saveOrUpdateJob($job, $request, $oldImage='')
    {
        $job->company_id = $request->company_id;
        $job->title = $request->job_title;
        $job->description = $request->description;
        if($request->has('featured_image')){
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $job->feature_image_url = $this->destination . $imageName;
            $image->move(public_path($this->destination, 'public'), $imageName);
        } else {
            $job->feature_image_url = $oldImage;
        }
        
        $job->benefits = $request->benefits;
        $job->salary_from = $request->salary_from;
        $job->salary_to = $request->salary_to;
        $job->hide_salary = $request->hide_salary != null ? 1 : 0;
        $job->salary_currency = null;
        $job->job_categories_id = $request->job_category;
        $job->job_shift_id = $request->job_shift;
        $job->num_of_positions = $request->no_of_position;
        $job->expiry_date = $request->deadline;
        $job->education_level_id = $request->education_level;
        $job->job_experience_id = $request->experience_level;
        $job->is_active = 0;
        $job->is_featured = $request->is_featured != null ? 1 : 0;
        $job->country_id = $request->country_id;
        $job->state_id = $request->state_id;
        $job->city_id = $request->city_id;
    }
}