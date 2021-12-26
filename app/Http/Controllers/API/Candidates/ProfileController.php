<?php

namespace App\Http\Controllers\API\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employe;
use Illuminate\Support\Facades\Auth;
use App\Traits\Api\ApiMethods;
use DB;

class ProfileController extends Controller
{
    use ApiMethods;

    public function get_profile(){
        return $this->sendResponse(
            $this->process(Auth::user()),
            "User Profile."
        );
    }
    public function save_profile(Request $request){
        $employe= Employe::where('user_id',Auth::user()->id)->first();
        $user=User::find(Auth::user()->id);
        $user->update([
            "email"=>$request->email,
        ]);
        $employe->update([
            "first_name"=>$request->first_name,
            "middle_name"=>$request->middle_name,
            "last_name"=>$request->last_name,
            "email"=>$request->email,
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'marital_status'=>$request->marital_status,
            'nationality'=>$request->nationality,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'tel_phone'=>$request->tel_phone,
            'mobile_phone'=>$request->mobile_phone,
            'exprience_id'=>$request->exprience_id,
            // 'functional_area'=>DB::table('countries')->find($employe->functional_area_id),
            'expected_salary'=>$request->expected_salary,
            'salary_currency'=>$request->salary_currency,
            'address'=>$request->address,
            'avatar'=>$request->avatar,
        ]);
        return $this->get_profile();

    }
    private function process($user){
        $employe= Employe::where('user_id',$user->id)->first();
        return [
            "user_id"=>$user->id,
            "name"=>[
                "fullname"=>$employe->first_name." ".$employe->middle_name." ".$employe->last_name,
                "first_name"=>$employe->first_name,
                "middle_name"=>$employe->middle_name,
                "last_name"=>$employe->last_name
            ],
            "email"=>$user->email,
            "user_type"=>$user->user_type,
            'dob'=>$employe->dob,
            'gender'=>$employe->gender,
            'marital_status'=>$employe->marital_status,
            'nationality'=>$employe->nationality,
            'country'=>DB::table('countries')->find($employe->country_id),
            'city'=>DB::table('cities')->find($employe->city_id),
            'tel_phone'=>$employe->tel_phone,
            'mobile_phone'=>$employe->mobile_phone,
            'exprience'=>DB::table('experiencelevels')->find($employe->exprience_id),
            // 'functional_area'=>DB::table('countries')->find($employe->functional_area_id),
            'expected_salary'=>$employe->expected_salary,
            'salary_currency'=>$employe->salary_currency,
            'address'=>$employe->address,
            'is_active'=>$employe->is_active,
            'is_verified'=>$employe->is_verified,
            'avatar'=>$employe->avatar,
            'created_at'=>$employe->created_at,
            'updated_at'=>$employe->updated_at,
        ];
    }
}
