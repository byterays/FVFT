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
        return $this->view('admin.pages.applicants.list',[
            'applicants'=>JobApplication::paginate(10)
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
        $request->has("status")?$fields["status"]=$request->status:null;
        $request->has("country_id")?$preferences["country_id"]=$request->country_id:null;
        $request->has("category")?$preferences["job_category_id"]=$request->category:null;
        EmployJobPreference::updateOrCreate(['employ_id'=>$request->employ_id],$preferences);
        JobApplication::updateOrCreate(['id'=>$request->application_id],$fields);
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
