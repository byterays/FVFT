<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\CompanyMethods;
use DB;
use App\Models\Company;
use App\Models\CompanyContactPerson;

class DashController extends Controller
{
    use CompanyMethods;
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
}
