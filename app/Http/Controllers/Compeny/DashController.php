<?php

namespace App\Http\Controllers\Compeny;

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
        return $this->compeny_view('company.dash');
    }
    public function profile()
    {
        $company = @Company::where('user_id', \Auth::user()->id)->first();
        $contact_person = @DB::table('company_contact_persons')->where('company_id', $company->id)->first();
        return $this->compeny_view('company.profile', ['contact_person' => $contact_person]);
    }
    public function saveProfile(Request $request)
    {
        $request->validate([
            'company_logo' => 'required|image|mimes:jpg,png,jpeg,|max:99999|dimensions:min_width=100,min_height=100',
            'company_cover' => 'required|image|mimes:jpg,png,jpeg|max:99999|dimensions:min_width=100,min_height=100',
        ]);
        $userfield = [];
        $request->compeny_password ? $userfield['password'] = bcrypt($request->compeny_password) : null;
        $userfield['email'] = $request->compeny_email;
        $user = auth()->user();
        // dd($user);
        $request->company_logo ? $logofile = time() . '_' . $request->company_logo->getClientOriginalName() : null;
        $request->company_cover ? $coverfile = time() . '_' . $request->company_cover->getClientOriginalName() : null;

        $request->company_logo ? $request->company_logo->move(public_path('uploads/compeny', 'public'), $logofile) : null;
        $request->company_cover ? $request->company_cover->move(public_path('uploads/compeny', 'public'), $coverfile) : null;
        $fields = [];
        $request->compeny_name ? $fields['compeny_name'] = $request->compeny_name : null;
        $request->company_logo ? $fields['company_logo'] = 'uploads/compeny/' . $logofile : null;
        $request->company_cover ? $fields['company_cover'] = 'uploads/compeny/' . $coverfile : null;
        $request->compeny_phone ? $fields['compeny_phone'] = $request->compeny_phone : null;
        $request->compeny_email ? $fields['compeny_email'] = $request->compeny_email : null;
        $request->industry_id ? $fields['industry_id'] = $request->industry_id : null;
        $request->compeny_details ? $fields['compeny_details'] = $request->compeny_details : null;
        $request->compeny_address ? $fields['compeny_address'] = $request->compeny_address : null;
        $request->country_id ? $fields['country_id'] = $request->country_id : null;
        $request->city_id ? $fields['city_id'] = $request->city_id : null;
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
}
