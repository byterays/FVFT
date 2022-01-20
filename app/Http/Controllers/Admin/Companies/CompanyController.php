<?php

namespace App\Http\Controllers\Admin\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Admin\AdminMethods;
use DB;
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyContactPerson;

class CompanyController extends Controller
{
    use AdminMethods;
    public function __construct()
    {

        $this->countries = DB::table('countries')->get();
    }
    public function list()
    {
        return $this->view('admin.pages.companies.list', [
            'companies' => DB::table('companies')->paginate(10)
        ]);
    }
    public function new()
    {
        return $this->view('admin.pages.companies.editadd', [
            'action' => "New",
            'countries' => $this->countries
        ]);
    }
    public function edit($id)
    {
        $company = DB::table('companies')->find($id);
        return $this->view('admin.pages.companies.editadd', [
            'company' => $company,
            'contact_person' => DB::table('company_contact_persons')->where(['company_id' => $company->id])->first(),
            'action' => "Edit",
            'countries' => $this->countries
        ]);
    }
    public function save(Request $request)
    {

        $userfield = [];
        $request->compeny_password ? $userfield['password'] = bcrypt($request->compeny_password) : null;
        $userfield['email'] = $request->compeny_email;
        $user = User::updateOrCreate(['id' => $request->compeny_user_id], $userfield);
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
        $fields['user_id'] = $user->id;
        $request->industry_id ? $fields['industry_id'] = $request->industry_id : null;
        $request->compeny_details ? $fields['compeny_details'] = $request->compeny_details : null;
        $request->compeny_address ? $fields['compeny_address'] = $request->compeny_address : null;
        $request->country_id ? $fields['country_id'] = $request->country_id : null;
        $request->city_id ? $fields['city_id'] = $request->city_id : null;
        $request->is_active ? $fields['is_active'] = $request->is_active == "on" ? true : false : null;
        $request->is_featured ? $fields['is_featured'] = $request->is_featured == "on" ? true : false : null;
        $company = Company::updateOrCreate(['id' => $request->compeny_id], $fields);

        $contact_person = CompanyContactPerson::updateOrCreate(
            ['company_id' => $company->id],
            [
                "name" => $request->contact_person_name,
                "email" => $request->contact_person_email,
                "phone" => $request->contact_person_phone,
                "position" => $request->contact_person_position,
            ]
        );
        return $this->view('admin.pages.companies.editadd', [
            'company' => $company,
            'contact_person' => $contact_person->first(),
            'action' => "Edit",
            'countries' => $this->countries
        ]);
    }
    public function delete($id)
    {
        DB::table('companies')->delete($id);
        try {
            return redirect()
                ->route('admin.companies.list')
                ->with(['delete' => [
                    'status' => 'success'
                ]]);
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.companies.list')
                ->with(['delete' => [
                    'status' => 'failed'
                ]]);
        }
    }
}
