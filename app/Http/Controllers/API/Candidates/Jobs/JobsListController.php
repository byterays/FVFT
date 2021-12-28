<?php

namespace App\Http\Controllers\API\Candidates\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Traits\Api\ApiMethods;
use DB;

class JobsListController extends Controller
{
    use ApiMethods;
    public function list(Request $request){
        // dd($request);
        $jobs =Job::query();
        if($request->has("is_active")){
            $jobs->where('is_active',$request->is_active);
        }
        if($request->has("is_featured")){
            $jobs->where('is_featured',$request->is_featured);
        }
        if($request->has("job_experience_id")){
            $jobs->where('job_experience_id',$request->job_experience_id);
        }
        if($request->has("job_categories_id")){
            $jobs->where('job_categories_id',$request->job_categories_id);
        }
        if($request->has("slug")){
            $jobs->where('slug',$request->slug);
        }
        if($request->has("id")){
            $jobs->where('id',$request->id);
        }
        $j=$jobs->get();
        // dd($j);
        $results = [];
        foreach($j as $index=>$job){
            $results[$index] = $this->process($job);
        }
        return $this->sendResponse($results,"Jobs List.");
    }
    public function process($job){
        $company=DB::table('companies')->find($job->company_id);
        // dd($company);

        return [
            "id"=> $job->id,
            "company"=>($company?[
                "id"=>$company->id,
                "compeny_name"=>$company->compeny_name,
                "compeny_logo_url"=>$company->company_logo,
                "compeny_cover_image_url"=>$company->company_cover,
                "compeny_phone"=>$company->compeny_phone,
                "compeny_email"=>$company->compeny_email
            ]:null),
            "title"=> $job->title,
            "description"=> $job->description,
            "benefits"=>$job->benefits,
            "salary_from"=> $job->salary_from,
            "salary_to"=> $job->salary_to,
            "hide_salary"=> $job->hide_salary,
            "salary_currency"=> $job->salary_currency,
            "job_categories"=> $job->job_categories_id,
            "job_shift"=> @DB::table('job_shifts')->find($job->job_shift_id)->job_shift,
            "num_of_positions"=> $job->num_of_positions,
            "expiry_date"=> $job->expiry_date,
            "education_level"=>@DB::table('experiencelevels')->find($job->education_level_id)->title,
            "job_experience"=> @DB::table('educationlevels')->find($job->job_experience_id)->title,
            "is_active"=>$job->is_active==1?true:false,
            "is_featured"=>$job->is_featured==1?true:false,
            // "created_at"=> $job->created_at,
            // "updated_at"=> $job->updated_at,
        ];
    }

}
