<?php

namespace App\Traits\Site;
use App\Models\Country;
use App\Models\JobCategory;
use App\Models\MenuItem;
use Illuminate\Http\Response;
use DB;
trait ThemeMethods{
    public function site_view($path,$obj=[]){
        $theme="fvft";
        $primary_menu = MenuItem::where(["menu_id"=>1,"parent_id"=>0])->get();
        $countries = Country::get();
        // $countries = Country::where('is_active', 1)->get();
//         $job_categories = JobCategory::has('jobs')->limit(10)->get();
       $job_categories = JobCategory::get();
        return view("themes.".$theme.".".$path,array_merge($obj,[
            'countries'=>$countries,
            'primary_menu'=>$primary_menu,
            'job_categories'=>$job_categories
        ]));
    }
}
