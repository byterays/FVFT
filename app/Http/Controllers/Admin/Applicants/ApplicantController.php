<?php

namespace App\Http\Controllers\Admin\Applicants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Employe;
use App\Models\JobApplication;
use App\Models\Job;
use App\Traits\Admin\AdminMethods;
use App\Models\EmployJobPreference;
class ApplicantController extends Controller
{
    use AdminMethods;
    public function __construct(){

        $this->countries=DB::table('countries')->where('is_active',1)->get();
    }
    public function list(){
        // $applicants = JobApplication::whereHas('job', function($q){
        //     return $q->with('company');
        // })->paginate(10);
        $applicants = JobApplication::with(['employe:id,user_id,first_name,middle_name,last_name,mobile_phone,country_id','employe.user:id,email','employe.country:id,name','job.company:id,company_name'])->paginate(10);
        $sn = ($applicants->perPage() * ($applicants->currentPage() - 1)) + 1;
        return $this->view('admin.pages.applicants.list',[
            'applicants'=>$applicants,
            'sn' => $sn
            // 'applicants'=>JobApplication::paginate(10)
        ]);
    }
    public function new(){
        return $this->view('admin.pages.applicants.editadd',[
            'action'=>"New",
            'countries'=>$this->countries
        ]);
    }
    public function edit($id){
        $job_categories=DB::table('job_categories')->get();
        $application=JobApplication::find($id);
        $candidate =Employe::find($application->employ_id);
        $job=Job::find($application->job_id);
        $job_preference=EmployJobPreference::where('employ_id',$application->employ_id)->first();
        // dd($candidate->id);
        // dd(User::find($candidate->user_id));
        return $this->view('admin.pages.applicants.editadd',[
            'candidate'=>$candidate,
            'job'=>$job,
            'application'=>$application,
            'action'=>"Edit",
            'candidate_user'=>User::find($candidate->user_id),
            'countries'=>$this->countries,
            'job_categories'=>$job_categories,
            'job_preference'=>$job_preference
        ]);
    }
    public function save(Request $request){
        $fields=[];
        $preferences=[];
        //Job Application
        $request->has("employ_id")?$fields["employ_id"]=$request->employ_id:null;
        $request->has("job_id")?$fields["job_id"]=$request->job_id:null;
        $request->has("status")?$fields["status"]=$request->status:null;
        $request->has("interview_status")?$fields["interview_status"]=$request->interview_status:null;
        $request->has("interview_date")?$fields["interview_date"]=$request->interview_date:null;
        $request->has("interview_time")?$fields["interview_time"]=$request->interview_time:null;
        // Job Preference
        $request->has("country_id")?$preferences["country_id"]=$request->country_id:null;
        $request->has("category")?$preferences["job_category_id"]=$request->category:null;

        \DB::table('job_applications')->updateOrInsert(['id'=>$request->application_id],$fields);
        EmployJobPreference::updateOrCreate(['employ_id'=>$request->employ_id],$preferences);
        return $this->edit($request->application_id);
    }
    public function delete($id){
        try {
            DB::table('job_applications')->delete($id);
            return redirect()
            ->route('admin.applicants.list')
            ->with(['delete'=>[
                'status' => 'success'
            ]]);
        } catch (\Throwable $th) {
            return redirect()
            ->route('admin.applicants.list')
            ->with(['delete'=>[
                'status' => 'failed'
            ]]);
        }
    }
}
