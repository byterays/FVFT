<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;
use App\Traits\Site\CandidateMethods;
use DB;
use App\Models\Employe;
use App\Models\EmployJobPreference;
use App\Models\User;

class DashController extends Controller
{
    use ThemeMethods;
    use CandidateMethods;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return $this->site_view('candidates.dash');
    }
    public function jobs()
    {

        $all_jobs = $this->jobsquery('all', false);
        $rejected_jobs = $this->jobsquery('rejected');
        $pending_jobs = $this->jobsquery('pending');
        $accepted_jobs = $this->jobsquery('accepted');
        $fields = [
            'all_jobs' => $all_jobs,
            'rejected_jobs' => $rejected_jobs,
            'pending_jobs' => $pending_jobs,
            'accepted_jobs' => $accepted_jobs
        ];
        if (auth()->check()) {
            $employ = Employe::where('user_id', auth()->user()->id)->first();
            $fields['employ'] = $employ;
        }
        return $this->client_view('candidates.jobs', $fields);
    }
    public function profile()
    {
        $educationlevels = DB::table('educationlevels')->get();
        $experiencelevels = DB::table('experiencelevels')->get();
        return $this->client_view('candidates.profile', [
            'educationlevels' => $educationlevels,
            'experiencelevels' => $experiencelevels
        ]);
    }
    public function saveProfile(Request $request)
    {
        $employ = DB::table('employes')->where('user_id', auth()->user()->id);
        $fields = [];
        $request->has('first_name') ? $fields['first_name'] = $request->first_name : null;
        $request->has('middle_name') ? $fields['middle_name'] = $request->middle_name : null;
        $request->has('last_name') ? $fields['last_name'] = $request->last_name : null;
        $request->has('dob') ? $fields['dob'] = $request->dob : null;
        $request->has('gender') ? $fields['gender'] = $request->gender : null;
        $request->has('marital_status') ? $fields['marital_status'] = $request->marital_status : null;
        $request->has('nationality') ? $fields['nationality'] = $request->nationality : null;
        $request->has('country_id') ? $fields['country_id'] = $request->country_id : null;
        $request->has('state_id') ? $fields['state_id'] = $request->state_id : null;
        $request->has('city_id') ? $fields['city_id'] = $request->city_id : null;
        $request->has('tel_phone') ? $fields['tel_phone'] = $request->tel_phone : null;
        $request->has('mobile_phone') ? $fields['mobile_phone'] = $request->mobile_phone : null;
        $employ->update($fields);
        return $this->profile();
    }
    public function job_preferences()
    {
        $employ = DB::table('employes')->where('user_id', auth()->user()->id)->first();
        $employ_job_preference = DB::table('employ_job_preference')->where('employ_id', $employ->id)->first();
        // dd($employ_job_preference);
        $educationlevels = DB::table('educationlevels')->get();
        $experiencelevels = DB::table('experiencelevels')->get();
        $job_categories = DB::table('job_categories')->get();
        return $this->client_view('candidates.job-preferences', [
            'educationlevels' => $educationlevels,
            'experiencelevels' => $experiencelevels,
            'job_categories' => $job_categories,
            'employ_job_preference' => $employ_job_preference
        ]);
    }
    public function saveJobPreferences(Request $request)
    {

        $employ = Employe::where('user_id', auth()->user()->id)->first();
        $fields = [];
        $request->has('job_category_id') ? $fields['job_category_id'] = $request->job_category_id : null;
        $request->has('country_id') ? $fields['country_id'] = $request->country_id : null;
        EmployJobPreference::updateOrCreate(['employ_id' => $employ->id], $fields);
        return $this->job_preferences();
    }

    private function jobsquery($status, $filter = true)
    {
        $employ = Employe::where('user_id', auth()->user()->id)->first();
        $jobs = DB::table('jobs')
            ->join('job_applications', 'jobs.id', '=', 'job_applications.job_id')
            ->where('job_applications.employ_id', $employ->id);
        if ($filter) {
            $jobs->where('job_applications.status', $status);
        }
        return $jobs->paginate(10);
    }
    public function settings()
    {
        return $this->client_view('candidates.settings');
    }
    public function saveSettings(Request $request)
    {
        $fields = [];
        $user = User::find(auth()->user()->id);
        // $request->has('email') ? $fields['email'] = $request->email : null;
        $request->has('password') ? $fields['password'] = bcrypt($request->password) : null;
        $user->update($fields);
        return $this->client_view('candidates.settings');
    }
    public function applyjob($id)
    {
        if (auth()->check() && auth()->user()->user_type == "candidate") {
            $employ = \DB::table('employes')->where('user_id', auth()->user()->id)->first();
            $is_exist = \DB::table("job_applications")->where('job_id', $id)->where('employ_id', $employ->id)->first();
            if (!$is_exist) {
                \DB::table("job_applications")->insert([
                    "job_id" => $id,
                    "employ_id" => $employ->id
                ]);
            }
        }
        return redirect()->route('candidate.dashboard');
    }
    public function removeApplication($id)
    {
        if (auth()->check() && auth()->user()->user_type == "candidate") {
            $employ = \DB::table('employes')->where('user_id', auth()->user()->id)->first();
            $job_application = DB::table('job_applications')->where(["employ_id" => $employ->id, "job_id" => $id]);
            $job_application->delete();
            return redirect()->back();
        }
    }
}
