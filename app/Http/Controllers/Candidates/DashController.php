<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;
use DB;
use App\Models\Employe;
class DashController extends Controller
{
    use ThemeMethods;

    public function dashboard(){
        return $this->site_view('candidates.dash');
    }
    public function jobs(){
        $employ= Employe::where('user_id',auth()->user()->id)->first();
        $all_jobs=$this->jobsquery('all',false);
        $onprocess_jobs=$this->jobsquery('onprocess');
        $pending_jobs=$this->jobsquery('pending');
        $accepted_jobs=$this->jobsquery('accepted');

        // dd($onprocess_jobs);
        return $this->site_view('candidates.jobs',[
            'all_jobs'=>$all_jobs,
            'onprocess_jobs'=>$onprocess_jobs,
            'pending_jobs'=>$pending_jobs,
            'accepted_jobs'=>$accepted_jobs
        ]);
    }
    private function jobsquery($status,$filter=true){
        $employ= Employe::where('user_id',auth()->user()->id)->first();
        $jobs=DB::table('jobs')
        ->join('job_applications','jobs.id','=','job_applications.job_id')
        ->where('job_applications.employ_id',$employ->id);
        if($filter){
            $jobs->where('job_applications.status',$status);
        }
        return $jobs->paginate(10);
    }
}
