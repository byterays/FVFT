<?php

namespace App\Http\Controllers\API\Location;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Traits\Api\ApiMethods;
use DB;
class LocationController extends Controller
{
    use ApiMethods;

    public function countries(Request $request)
    {
        $limit= $request->has("limit") ? $request->limit : 10;
        $countries = Country::where('is_active', 1)->paginate($limit);

        $countries->setCollection(
            $countries->getCollection()->transform(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                    'country_code' => $value->iso3,
                    'flag' => $value->flag,
                ];
            })
        );

        return $this->sendResponse(compact('countries'),"success");
    }
//    public function countriesOld(Request $request){
//
//        $counties=\DB::table('countries');
//        $limit= $request->has("limit")?$request->limit:10;
//
//        if($request->has("is_active")){
//            $counties->where(["is_active"=>$request->is_active]);
//        }
//
//        if($request->has("page_no")){
//            $counties->limit($limit)->offset($request->page_no>=1?($request->page_no-1)*$limit:1);
//        }else{
//            $counties->limit($limit);
//        }
//        $total_records=$counties->count();
//        $result=[];
//        foreach($counties->get() as $index=>$country){
//            $result[$index]=$this->process_country($country);
//        }
//        $total_page_no=(int)($total_records/$limit);
//        $page_no=$request->has("page_no")?$request->page_no:1;
//        $pagination=[
//            "total_records"=>$total_records,
//            "total_pages"=>$total_page_no+1,
//            "limit"=>$limit,
//            "page_no"=>$page_no,
//        ];
//        $page_no>1?
//        $pagination=array_merge(
//        $pagination,
//        ["previous"=>$page_no-1]
//        ):null;
//        $page_no<$total_page_no?
//        $pagination=array_merge(
//        $pagination,
//        ["next"=>$page_no+1]
//        ):null;
//        return $this->sendResponse($result,"Countries Fetch Succesful!",$pagination);
//    }

    public function states(Request $request)
    {
        $limit= $request->has("limit") ? $request->limit : 10;
        $states = State::paginate($limit);

        $states->setCollection(
            $states->getCollection()->transform(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name
                ];
            })
        );

        return $this->sendResponse(compact('states'),"success");
    }

//    public function statesOld(Request $request){
//        $states=DB::table('states');
//        $limit= $request->has("limit")?$request->limit:10;
//        if($request->has("is_active")){
//            $states->where(["is_active"=>$request->is_active]);
//        }
//        if($request->has("country_id")){
//            $states->where(["country_id"=>$request->country_id]);
//        }
//        $total_records=$states->count();
//        if($request->has("page_no")){
//            $states->limit($limit)->offset($request->page_no>=1?($request->page_no-1)*$limit:1);
//        }else{
//            $states->limit($limit);
//        }
//        $result=[];
//        foreach($states->get() as $index=>$state){
//            $result[$index]=$this->process_state($state);
//        }
//        $total_page_no=(int)($total_records/$limit);
//        $page_no=$request->has("page_no")?$request->page_no:1;
//        $pagination=[
//            "total_records"=>$total_records,
//            "total_pages"=>$total_page_no+1,
//            "limit"=>$limit,
//            "page_no"=>$page_no,
//        ];
//        $page_no>1?
//            $pagination=array_merge(
//                $pagination,
//                ["previous"=>$page_no-1]
//            ):null;
//        $page_no<$total_page_no?
//            $pagination=array_merge(
//                $pagination,
//                ["next"=>$page_no+1]
//            ):null;
//        return $this->sendResponse($result,"States Fetch Succesful!",$pagination);
//
//    }

public function cities(Request $request)
{
    $limit= $request->has("limit") ? $request->limit : 10;
    $cities = State::paginate($limit);

    $cities->setCollection(
        $cities->getCollection()->transform(function ($value) {
            return [
                'id' => $value->id,
                'name' => $value->name
            ];
        })
    );

    return $this->sendResponse(compact('cities'),"success");
}

    public function citiesOld(Request $request){
        $cities=DB::table('cities');
        $limit= $request->has("limit")?$request->limit:10;
        if($request->has("is_active")){
            $cities->where(["is_active"=>$request->is_active]);
        }
        if($request->has("country_id")){
            $cities->where(["country_id"=>$request->country_id]);
        }
        if($request->has("state_id")){
            $cities->where(["state_id"=>$request->state_id]);
        }
        $total_records=$cities->count();
        if($request->has("page_no")){
            $cities->limit($limit)->offset($request->page_no>=1?($request->page_no-1)*$limit:1);
        }else{
            $cities->limit($limit);
        }
        $result=[];
        foreach($cities->get() as $index=>$city){
            $result[$index]=$this->process_city($city);
        }
        $total_page_no=(int)($total_records/$limit);
        $page_no=$request->has("page_no")?$request->page_no:1;
        $pagination=[
            "total_records"=>$total_records,
            "total_pages"=>$total_page_no+1,
            "limit"=>$limit,
            "page_no"=>$page_no,
        ];
        $page_no>1?
            $pagination=array_merge(
                $pagination,
                ["previous"=>$page_no-1]
            ):null;
        $page_no<$total_page_no?
            $pagination=array_merge(
                $pagination,
                ["next"=>$page_no+1]
            ):null;
        return $this->sendResponse($result,"Cities Fetch Succesful!",$pagination);

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
