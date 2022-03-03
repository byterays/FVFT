<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyContactPerson;
use App\Models\Industry;
use App\Models\Job;
use App\Traits\Site\CompanyMethods;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $this->industries = Industry::get();
    }
    public function dashboard()
    {
        return $this->company_view('company.dash');
    }
    public function profile()
    {
        $company = @Company::where('user_id', \Auth::user()->id)->first();
        $contact_person = @DB::table('company_contact_persons')->where('company_id', $company->id)->first();
        return $this->company_view('company.profile', [
            'contact_person' => $contact_person,
            'industries' => $this->industries,
            'countries' => $this->countries,
            'viewRoute' => route('company.view_profile'),
        ]);
    }
    public function saveProfile(Request $request)
    {
        $request->validate([
            'company_name' => 'required|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,png,jpeg,|max:99999|dimensions:min_width=100,min_height=100',
            'company_cover' => 'nullable|image|mimes:jpg,png,jpeg|max:99999|dimensions:min_width=100,min_height=100',
        ]);

        $company = Company::where('id', $request->company_id)->where('user_id', auth()->user()->id)->firstOrFail();
        $company->company_name = $request->company_name;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        $company->industry_id = $request->industry_id;
        $company->company_details = $request->company_details;
        $company->company_address = $request->company_address;
        $company->country_id = $request->country_id;
        $company->city_id = $request->city_id;
        $company->is_active = $request->is_active == "on" ? true : false;
        $company->company_details = $request->company_details;

        $upload_path = 'uploads/company/';

        // Remove old file if exist
        // ....

        if ($request->hasFile('company_logo')){
            $logofile = time() . '_' . $request->company_logo->getClientOriginalName();
            $request->company_logo->move(public_path($upload_path, 'public'), $logofile);
            $company->company_logo = $upload_path.$logofile;
        }
        if ($request->hasFile('company_cover')) {
            $coverfile = time() . '_' . $request->company_cover->getClientOriginalName();
            $request->company_cover->move(public_path($upload_path, 'public'), $coverfile);
            $company->company_cover = $upload_path.$coverfile;
        }
        $company->save();
        CompanyContactPerson::updateOrCreate(
            ['company_id' => $company->id],
            [
                "name" => $request->contact_person_name,
                "email" => $request->contact_person_email,
                "phone" => $request->contact_person_phone,
                "position" => $request->contact_person_position,
            ]
        );

        return redirect()->route('company.edit_profile');
    }

    public function applicants()
    {
        return $this->company_view('company.applicants');
    }

    public function jobs()
    {
        $all_jobs = $this->jobsquery('all', false);
        $approved_jobs = $this->jobsquery('Approved');
        $unapproved_jobs = $this->jobsquery('Not Approved');
        $published_jobs = Job::where('publish_status', 1)->paginate(10);
        $expired_jobs = Job::where('is_expired', 1)->paginate(10);
        $fields = [
            'all_jobs' => $all_jobs,
            'approved_jobs' => $approved_jobs,
            'unapproved_jobs' => $unapproved_jobs,
            'published_jobs' => $published_jobs,
            'expired_jobs' => $expired_jobs,
        ];
        if (auth()->check()) {
            $company = Company::where('user_id', auth()->user()->id)->first();
            $fields['company'] = $company;
        }
        return $this->company_view('company.jobs', $fields);
    }

    public function show()
    {
        $company = Company::where('user_id', \Auth::user()->id)->with(['industry', 'company_contact_person', 'user'])->firstOrFail();
        return $this->company_view('company.showProfile', ['company' => $company, 'editRoute' => route('company.edit_profile')]);
    }

    private $Destination = 'uploads/company/';
    private $redirectTo = 'company.edit_profile';

    public function updateProfile(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'company_name' => ['required'],
            'industry_id' => ['required'],
            'ownership' => ['required'],
            'no_of_employee' => ['required'],
            'operating_since' => ['required'],
            'person_designation' => ['required'],
            'full_name' => ['required'],
            'contact_person_designation' => ['required'],
            'company_email' => ['nullable', 'email'],
            'company_website' => ['nullable', 'url'],
            'company_fb_page' => ['nullable', 'url'],
            'company_logo' => ['nullable', 'image', 'mimes:jpg,png,jpeg'],
            'company_cover' => ['nullable', 'image', 'mimes:jpg,png,jpeg'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if ($validator->passes()) {
            try {
                \DB::beginTransaction();
                $company = Company::where('id', $id)->first();
                $oldLogo = $company->company_logo;
                $oldCover = $company->company_cover;
                $company_user_id = $company->user_id;
                $company->company_name = $request->company_name;
                if ($request->has('company_logo')) {
                    $logo = $request->file('company_logo');
                    $logoName = time() . '_' . $logo->getClientOriginalName();
                    $company->company_logo = $this->Destination . $logoName;
                    $logo->move(public_path($this->Destination, 'public'), $logoName);
                } else {
                    $company->company_logo = $oldLogo;
                }
                if ($request->has('company_cover')) {
                    $cover = $request->file('company_cover');
                    $coverName = time() . '_' . $cover->getClientOriginalName();
                    $company->company_cover = $this->Destination . $coverName;
                    $cover->move(public_path($this->Destination, 'public'), $coverName);
                } else {
                    $company->company_cover = $oldCover;
                }

                $company->user_id = $company_user_id;
                $company->company_phone = $request->mobile_phone1;
                $company->company_email = $request->company_email;
                $company->industry_id = $request->industry_id;
                $company->company_details = $request->company_introduction;
                $company->country_id = $request->country_id;
                $company->state_id = $request->state_id;
                $company->city_id = $request->city_id;
                $company->company_address = $request->company_address;
                $company->is_active = $request->is_active != null ? 1 : 0;
                $company->is_featured = $request->is_featured != null ? 1 : 0;
                $company->company_website = $request->company_website;
                $company->company_fb_page = $request->company_fb_page;
                $company->ownership = $request->ownership;
                $company->no_of_employee = $request->no_of_employee;
                $company->operating_since = $request->operating_since;
                $company->company_services = $request->company_services;
                $company->isocode1 = '';
                $company->isocode2 = '';
                $company->dialcode1 = $request->dial_code;
                $company->dialcode2 = '';
                $company->mobile_phone1 = $request->mobile_phone1;
                $company->mobile_phone2 = $request->mobile_phone2;
                $company->html_content_intro = $request->html_content_intro;
                $company->html_content_service = $request->html_content_service;
                $company->save();
                $this->__updateContactPerson($company->id, $request);
                \DB::commit();
                return response()->json(['msg' => 'Company updated successfully', 'redirectRoute' => route($this->redirectTo)]);
            } catch (\Exception $e) {
                return response()->json(['db_error' => $e->getMessage()]);
            }
        }
    }

    private function __updateContactPerson($company_id, $request)
    {
        $contact_person = CompanyContactPerson::where('company_id', $company_id)->first();
        $contact_person->name = $request->full_name;
        $contact_person->email = $request->contact_person_email;
        $contact_person->phone = $request->contact_person_mobile;
        $contact_person->position = $request->contact_person_designation;
        $contact_person->company_id = $company_id;
        $contact_person->avatar = '';
        $contact_person->person_designation = $request->person_designation;
        $contact_person->isocode = '';
        $contact_person->dialcode = $request->dialcode;
        $contact_person->save();
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
        if ($filter) {
            $jobs->where('status', $status);

        }
        return $jobs->paginate(10);
    }
}
