<?php

namespace App\Http\Controllers\API\Candidates\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Country;
use App\Models\Employe;
use App\Models\JobCategory;
use App\Models\SavedJob;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Traits\Api\ApiMethods;
use DB;
use Illuminate\Support\Facades\Auth;

class JobsListController extends Controller
{
    use ApiMethods;
    public function listing(Request $request){
        // dd($request);
        $limit= $request->has("limit")?$request->limit:10;
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
        if($request->has("only_latest")){
            if($request->only_latest==true){
                $t=time();
                $jobs->where('expiry_date',">=",date("Y-m-d",$t));
            }
        }
        if($request->has('country_id')){
            $jobs->where('country_id',$request->country_id);
        }
        if($request->has('state_id')){
            $jobs->where('state_id',$request->state_id);
        }
        if($request->has('city_id')){
            $jobs->where('city_id',$request->city_id);
        }
        if($request->has('include_applied')){
            if($request->include_applied){
                $jobs->whereNotExists(function($query)
                {
                    $query->select(DB::raw(1))
                        ->from('job_applications')
                        ->whereRaw('jobs.id = job_applications.job_id');
                });
            }
        }
        $total_records=$jobs->count();
        // dd($total_records);
        if($request->has("page_no")){
            $jobs->limit($limit)->offset($request->page_no>=1?($request->page_no-1)*10:1);
        }else{
            $jobs->limit($limit);
        }

        $j=$jobs->get();
        // dd($j);
        $results = [];
        foreach($j as $index=>$job){
            $results[$index] = $this->process($job);
        }

        // dd($total_records);
        $total_page_no=(int)($total_records/$limit);
        $page_no=$request->has("page_no")?$request->page_no:1;
        $pagination=[
            "total_records"=>(int)$total_records,
            "total_pages"=>(int)$total_page_no,
            "limit"=>(int)$limit,
            "page_no"=>(int)$page_no,
        ];
        $page_no>1?
            $pagination=array_merge(
                $pagination,
                ["previous"=>$page_no-1]
            ):null;
        $page_no<$total_page_no?
            $pagination=array_merge(
                $pagination,
                ["next"=>$page_no+1]
            ):null;
        return $this->sendResponse($results,"Jobs List.",$pagination);
    }
    public function process($job){
        $company=DB::table('companies')->find($job->company_id);
        $jobshifts=[];
        $job_shifts=DB::table("manage_job_shifts")->where("job_id",$job->id)->get();
        // dd($job_shifts);
        foreach($job_shifts as $index=>$shift){
            $jobshift= DB::table('job_shifts')->find($shift->job_shifts_id);
            if($jobshift){
                $jobshifts[$index]=
                    [
                        "id"=>(int)$jobshift->id,
                        "shift"=>$jobshift->job_shift
                    ];
            }
        }
        $educationlevels=DB::table('educationlevels')->find($job->education_level_id);
        $experiencelevels=DB::table('experiencelevels')->find($job->job_experience_id);
        $country=DB::table('countries')->find($job->country_id);

        // dd($country);
        $state=DB::table('states')->find($job->state_id);
        $city=DB::table('cities')->find($job->city_id);

        return [
            "id"=> (int)$job->id,
            "company"=>($company?[
                "id"=>(int)$company->id,
                "name"=>$company->company_name,
                "logo_url"=>env("APP_URL").$company->company_logo,
                "cover_image_url"=>env("APP_URL").$company->company_cover,
                "phone"=>$company->company_phone,
                "email"=>$company->company_email
            ]:null),
            "title"=> $job->title,
            "description"=> $job->description,
            "feature_image_url"=> env("APP_URL").$job->feature_image_url,
            "benefits"=>$job->benefits,
            "salary_from"=>(boolean)$job->hide_salary?0.0:floatval($job->salary_from),
            // "salary_from"=> (int)$job->hide_salary==1?$job->salary_from:"Hidden",
            "salary_to"=> (boolean)$job->hide_salary?0.0:floatval($job->salary_to),
            "hide_salary"=> (boolean)$job->hide_salary,
            "salary_currency"=>$job->salary_currency,
            "job_category"=>  @DB::table('job_categories')->find($job->job_categories_id)->functional_area,
            "job_shifts"=> $jobshifts,
            "country_id"=>$job->country_id,
            "num_of_positions"=> (int)$job->num_of_positions,
            "expiry_date"=> $job->expiry_date,
            "education_level"=>isset($educationlevels->title)?$educationlevels->title:"No Education Background.",
            "job_experience"=>isset($experiencelevels->title)?$experiencelevels->title:"Fresh",
            "site_location"=>[
                "country"=>[
                    "id"=>(int)$country->id,
                    "name"=>$country->name,
                    "country_code"=>$country->iso3,
                    "flag"=>$country->emoji
                ],
                "state"=>[
                    "id"=>(int)$state->id,
                    "name"=>$state->name,
                ],
                "city"=>[
                    "id"=>(int)$city->id,
                    "name"=>$city->name,
                ]
            ],
            "is_active"=> (boolean)$job->is_active,
            "is_featured"=>(boolean)$job->is_featured
            // "created_at"=> $job->created_at,
            // "updated_at"=> $job->updated_at,
        ];
    }

    public function getHome()
    {
        $banners = Banner::where('type', 'job')->where('is_active', 1)->get();

        // 10 countries order by number of jobs desc
        $countries = Country::has('jobs')->inRandomOrder(10)->get();

        // 5 categories
        $categories = JobCategory::has('jobs')->inRandomOrder(5)->get();

        // 5 latest jobs
        $new_jobs = Job::with(['company', 'country'])->orderBy('id', 'desc')->limit(5)->get();


        $all_jobs = Job::with(['company', 'country'])->inRandomOrder(5)->get();

        $featured_jobs = Job::where('is_featured', 1)->with(['company', 'country'])->inRandomOrder(5)->get();

        // 5 companies
        $companies = Company::has('jobs')->inRandomOrder(5)->get();

//        company => object
//education_level => object
//job_category  => object
//job_shift => object
//job_experience => object
//counrty => object
//state => object
//city => object
//
        // 5 featured jobs
//        $featured_jobs = $this->getFeaturedJobs();

        $preferred_jobs= [];
        $saved_jobs= [];

        if (auth()->guard('api')->check()){
            $user = auth()->guard('api')->user();
            // 5 user preferred jobs
            $employee = Employe::where('user_id',  $user->id)->first();
            $preferred_jobs = $employee->preferredJobs();

            // 5 latest user saved jobs
            $saved_jobs_pivot = SavedJob::with(['job', 'job.company', 'job.country'])->where('employ_id', $employee->id)->limit(5)->get();
            if (!blank($saved_jobs_pivot)){
                foreach($saved_jobs_pivot as $value){
                    $saved_jobs[] = $value->job;
                }
            }
        }

        return $this->sendResponse(compact(
            'banners',
            'countries',
            'categories',
            'preferred_jobs',
            'new_jobs',
            'new_jobs',
            'all_jobs',
            'companies',
            'saved_jobs'
        ),"success");
    }


    public function getFeaturedJobs()
    {
        return [];
    }
}
