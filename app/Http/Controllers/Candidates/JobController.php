<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\EmployJobPreference;
use App\Models\Job;
use App\Models\SavedJob;
use App\Traits\Site\CandidateMethods;
use App\Traits\Site\ThemeMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use ThemeMethods;
    use CandidateMethods;

    private $page = 'candidates.job.';

    public function saveJobLists()
    {
        $employ=@Employe::where('user_id',Auth::user()->id)->first();
        $employe=@Employe::where('user_id',Auth::user()->id)->first();
        $saved_jobs = SavedJob::where('employ_id', $employ->id)->latest()->paginate(10);
        return $this->site_view($this->page.'savedjobs',['saved_jobs' => $saved_jobs, 'employe' => $employe]);
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

    public function delete($id)
    {
        SavedJob::destroy($id);
        return redirect()->back()->with(notifyMsg('warning', 'Saved Job deleted'));
    }


    public function recommended_job()
    {
        $employe=@Employe::where('user_id',Auth::user()->id)->first();
        if(!empty($employe->job_preference)){
            $job_preference = EmployJobPreference::where('employ_id', $employe->id)->first();
            $recommended_jobs = Job::where('job_categories_id', $job_preference->job_category_id)->where('country_id', $job_preference->country_id)->paginate(10);
        } else {
            $recommended_jobs = null;
        }
        return $this->site_view($this->page.'recommended_job', ['recommended_jobs' => $recommended_jobs, 'employe' => $employe]);
    }
}
