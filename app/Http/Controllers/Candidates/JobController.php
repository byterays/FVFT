<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use App\Models\SavedJob;
use App\Traits\Site\CandidateMethods;
use App\Traits\Site\ThemeMethods;
use Illuminate\Http\Request;

class JobController extends Controller
{
    use ThemeMethods;
    use CandidateMethods;

    private $page = 'candidates.job.';

    public function saveJobLists($id)
    {
        $saved_jobs = SavedJob::where('employ_id', $id)->latest()->get();
        return $this->site_view($this->page.'savedjobs',['saved_jobs' => $saved_jobs]);
    }

    public function saveJob(Request $request)
    {
        try {
            if($request->job_id != null && $request->employ_id != null){
                if(SavedJob::where('employ_id', $request->employ_id)->where('job_id', $request->job_id)->exists()){
                    return response()->json(['error' => 'This job is already saved on your profile']);
                }
                $saveJob = SavedJob::create([
                    'employ_id' => $request->employ_id,
                    'job_id' => $request->job_id,
                ]);
                return response()->json(['msg' => 'Job saved to your profile successfully.']);
            } else {
                return response()->json(['error' => 'Something went wrong']);
            }
            
            
        } catch (\Exception$e) {
            return response()->json(['db_error' => $e->getMessage()]);
        }

    }
}
