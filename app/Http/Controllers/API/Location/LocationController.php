<?php

namespace App\Http\Controllers\API\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Api\ApiMethods;
use DB;
class LocationController extends Controller
{
    use ApiMethods;

    public function countries(Request $request){
        $counties=DB::table('countries');
        if($request->has("is_active")){
            $counties->where(["is_active"=>$request->is_active]);
        }
        $result=[];
        foreach($counties->get() as $index=>$country){
            $result[$index]=$this->process_country($country);
        } 
        return $this->sendResponse($result,"Countries Fetch Succesful!");
    }
    public function states(Request $request){
        $states=DB::table('states');
        if($request->has("is_active")){
            $states->where(["is_active"=>$request->is_active]);
        }
        if($request->has("country_id")){
            $states->where(["country_id"=>$request->country_id]);
        }
        $result=[];
        foreach($states->get() as $index=>$state){
            $result[$index]=$this->process_state($state);
        } 
        return $this->sendResponse($result,"States Fetch Succesful!");
        
    }
    public function cities(Request $request){
        $cities=DB::table('cities');
        if($request->has("is_active")){
            $cities->where(["is_active"=>$request->is_active]);
        }
        if($request->has("country_id")){
            $cities->where(["country_id"=>$request->country_id]);
        }
        if($request->has("state_id")){
            $cities->where(["state_id"=>$request->state_id]);
        }
        $result=[];
        foreach($cities->get() as $index=>$city){
            $result[$index]=$this->process_city($city);
        } 
        return $this->sendResponse($result,"Cities Fetch Succesful!");

    }
    public function process_country($country){
        return [
            "id"=>(int)$country->id,
            "name"=>$country->name,
            "country_code"=>$country->iso2,
            "flag"=>$country->emoji
        ];
    }
    public function process_state($state){
        return [
            "id"=>(int)$state->id,
            "name"=>$state->name,
        ];
        
    }
    public function process_city($city){
        return [
            "id"=>(int)$city->id,
            "name"=>$city->name,
        ];
    }
}
