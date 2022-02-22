<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyContactPerson;
use App\Models\Job;
use App\Traits\Site\CompanyMethods;
use DB;
use Illuminate\Http\Request;

class DashController extends Controller
{
    use CompanyMethods;
    public function __construct()
    {
        $this->experiencelevels = \DB::table('experiencelevels')->get();
        $this->educationlevels = \DB::table('educationlevels')->get();
        $this->job_shifts = \DB::table('job_shifts')->get();
        $this->job_categories = \DB::table('job_categories')->get();
        $this->countries = \DB::table('countries')->get();   
    }
    public function dashboard()
    {
        return $this->company_view('company.dash');
    }
    public function profile()
    {
        $company = @Company::where('user_id', \Auth::user()->id)->first();
        $contact_person = @DB::table('company_contact_persons')->where('company_id', $company->id)->first();
        return $this->company_view('company.profile', ['contact_person' => $contact_person]);
    }
    public function saveProfile(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'company_logo' => 'required|image|mimes:jpg,png,jpeg,|max:99999|dimensions:min_width=100,min_height=100',
            'company_cover' => 'required|image|mimes:jpg,png,jpeg|max:99999|dimensions:min_width=100,min_height=100',
        ]);
        $user = auth()->user();
        $oldPassword = $user->password;
        // dd($oldPassword);
        $userfield = [];
        $request->company_password ? $userfield['password'] = bcrypt($request->company_password) : $oldPassword;
        $userfield['email'] = $request->company_email;
        // dd($user);
        $request->company_logo ? $logofile = time() . '_' . $request->company_logo->getClientOriginalName() : null;
        $request->company_cover ? $coverfile = time() . '_' . $request->company_cover->getClientOriginalName() : null;

        $request->company_logo ? $request->company_logo->move(public_path('uploads/company', 'public'), $logofile) : null;
        $request->company_cover ? $request->company_cover->move(public_path('uploads/company', 'public'), $coverfile) : null;
        $fields = [];
        $request->company_name ? $fields['company_name'] = $request->company_name : null;
        $request->company_logo ? $fields['company_logo'] = 'uploads/company/' . $logofile : null;
        $request->company_cover ? $fields['company_cover'] = 'uploads/company/' . $coverfile : null;
        $request->company_phone ? $fields['company_phone'] = $request->company_phone : null;
        $request->company_email ? $fields['company_email'] = $request->company_email : null;
        $request->industry_id ? $fields['industry_id'] = $request->industry_id : null;
        $request->company_details ? $fields['company_details'] = $request->company_details : null;
        $request->company_address ? $fields['company_address'] = $request->company_address : null;
        $request->country_id ? $fields['country_id'] = $request->country_id : null;
        $request->city_id ? $fields['city_id'] = $request->city_id : null;
        $request->state_id ? $fields['state_id'] = $request->state_id : null;
        $request->is_active ? $fields['is_active'] = $request->is_active == "on" ? true : false : null;
        $company = Company::updateOrCreate(['user_id' => $user->id], $fields);
        CompanyContactPerson::updateOrCreate(
            ['company_id' => $company->id],
            [
                "name" => $request->contact_person_name,
                "email" => $request->contact_person_email,
                "phone" => $request->contact_person_phone,
                "position" => $request->contact_person_position,
            ]
        );

        return $this->profile();
    }



    public function jobs()
    {
        $all_jobs = $this->jobsquery('all', false);
        // $rejected_jobs = $this->jobsquery('rejected');
        // $pending_jobs = $this->jobsquery('pending');
        // $accepted_jobs = $this->jobsquery('accepted');
        $fields = [
            'all_jobs' => $all_jobs
            // 'rejected_jobs' => $rejected_jobs,
            // 'pending_jobs' => $pending_jobs,
            // 'accepted_jobs' => $accepted_jobs
        ];
        if (auth()->check()) {
            $company = Company::where('user_id', auth()->user()->id)->first();
            $fields['company'] = $company;
        }
        return $this->company_view('company.jobs', $fields);
    }


    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $fields = [
            "job" => $job,
            "experiencelevels" => $this->experiencelevels,
            "job_shifts" => $this->job_shifts,
            "job_categories" => $this->job_categories,
            "educationlevels" => $this->educationlevels,
            "countries" => $this->countries,
        ];
        return $this->company_view('company.editjob', $fields);
    }

    private function jobsquery($status, $filter = true)
    {
        $company = Company::where('user_id', auth()->user()->id)->first();
        $jobs = Job::where('company_id', $company->id);
        if($filter){
            $jobs->where('status', $status);
        }
        return $jobs->paginate(10);
    }
}
