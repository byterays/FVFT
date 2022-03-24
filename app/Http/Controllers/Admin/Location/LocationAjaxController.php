<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationAjaxController extends Controller
{
    public function countries(Request $request){
        $countries=\DB::table('countries')->where('is_active', 1);
        return \Response::json($countries->get());
    }
    public function states(Request $request){
        $states=\DB::table('states');
        $states->where('country_id',$request->country_id);
        return  \Response::json($states->get());
    }
    public function cities(Request $request){
        $cities=\DB::table('cities');
        $cities->where('state_id',$request->state_id);
        return \Response::json($cities->get());
    }

    public function districts(Request $request)
    {
        $districts = \DB::table('districts');
        $districts->where('state_id', $request->state_id);
        return \Response::json($districts->get());
    }
}
