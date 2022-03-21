<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Employe;
use App\Traits\Site\CandidateMethods;
use App\Traits\Site\ThemeMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    use ThemeMethods, CandidateMethods;
    private $page = "candidates.setting.account_setting.";

    public function __construct()
    {
        $this->middleware('auth');
        $this->countries = Country::get();
    }

    public function get_setting()
    {
        return $this->client_view($this->page . 'index', [
            'employ' => $this->employe(['user']),
            'countries' => $this->countries,
        ]);
    }

    public function update_setting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => [Rule::requiredIf($request->has('first_name'))],
            'last_name' => [Rule::requiredIf($request->has('last_name'))],
            'gender' => [Rule::requiredIf($request->has('gender'))],
            'mobile_phone' => [Rule::requiredIf($request->has('mobile_phone'))],
            'country_id' => [Rule::requiredIf($request->has('country_id'))],
            'state_id' => [Rule::requiredIf($request->has('state_id'))],
            'district_id' => [Rule::requiredIf($request->has('district_id'))],
            'website' => ['nullable', 'url'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        if ($validator->passes()) {
            try {
                DB::beginTransaction();
                $employ = $this->employe();
                dd($employ);
                DB::commit();
            } catch (\Exception$e) {
                DB::rollBack();
                return response()->json(['db_error' => $e->getMessage()]);
            }
        }
    }
}
