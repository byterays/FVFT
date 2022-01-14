<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;
use App\Traits\Site\CandidateMethods;
use DB;
use App\Models\Employe;
class DashController extends Controller
{
    use ThemeMethods;
    use CandidateMethods;

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
        return $this->client_view('candidates.jobs',[
            'all_jobs'=>$all_jobs,
            'onprocess_jobs'=>$onprocess_jobs,
            'pending_jobs'=>$pending_jobs,
            'accepted_jobs'=>$accepted_jobs
        ]);
    }
    public function profile(){
        $educationlevels=DB::table('educationlevels')->get();
        $experiencelevels=DB::table('experiencelevels')->get();
        return $this->client_view('candidates.profile',[
            'educationlevels'=>$educationlevels,
            'experiencelevels'=>$experiencelevels
        ]);
    }
    public function saveProfile(Request $request){
        $employ=DB::table('employes')->where('user_id',auth()->user()->id);
        $fields=[];
        $request->has('first_name')?$fields['first_name']=$request->first_name:null;
        $request->has('middle_name')?$fields['middle_name']=$request->middle_name:null;
        $request->has('last_name')?$fields['last_name']=$request->last_name:null;
        $request->has('dob')?$fields['dob']=$request->dob:null;
        $request->has('gender')?$fields['gender']=$request->gender:null;
        $request->has('marital_status')?$fields['marital_status']=$request->marital_status:null;
        $request->has('nationality')?$fields['nationality']=$request->nationality:null;
        $request->has('country_id')?$fields['country_id']=$request->country_id:null;
        $request->has('state_id')?$fields['state_id']=$request->state_id:null;
        $request->has('city_id')?$fields['city_id']=$request->city_id:null;
        $request->has('tel_phone')?$fields['tel_phone']=$request->tel_phone:null;
        $request->has('mobile_phone')?$fields['mobile_phone']=$request->mobile_phone:null;
        $employ->update($fields);
        return $this->profile();
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
