<?php

namespace App\Http\Controllers\API\Candidates\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Traits\Api\ApiMethods;
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

        return $this->sendResponse($jobs->get(),"Jobs List.");
    }

}
