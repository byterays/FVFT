<?php

namespace App\Http\Controllers\API\Candidates\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Api\ApiMethods;
use DB;
use App\Models\Job;
use App\Models\Employe;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\Candidates\Jobs\JobsListController;
class JobApplicationController extends Controller
{
    use ApiMethods;

    public function apply(Request $request){
        $request->validate([
            'job_id'=>'required|unique:job_applications'
        ]);
        $employ=Employe::where([
            'user_id'=>Auth::user()->id
        ])->first();
        $job= DB::table('job_applications')
        ->insert(
            [
                'employ_id'=>$employ->id,
                'job_id'=>$request->job_id,
                'status'=>'pending',
                "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);
        return $this->sendResponse(Job::find($request->job_id),"Job Application Submitted.");
    }
    public function list(Request $request){
        // dd($request);
        $jobs = [];
        $job_applications= DB::table('job_applications')->where('status',$request->status)->get();
        $jobcontroller=new JobsListController();
        foreach($job_applications as $index=>$application){
            $jobs[$index]=$jobcontroller->process(Job::find($application->job_id));
        }
        return $this->sendResponse($jobs,"Jobs Applications List.");
    }
}
