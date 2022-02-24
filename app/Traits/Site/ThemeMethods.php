<?php
 
namespace App\Traits\Site;
use Illuminate\Http\Response;
use DB;
trait ThemeMethods{
    public function site_view($path,$obj=[]){
        $theme="fvft";
        $primary_menu=DB::table('menu_items')->where(["menu_id"=>1,"parent_id"=>0])->get();
        // $countries=DB::table('countries')->where('is_active',1)->get();
        $countries = DB::table('countries')->get();
        // $job_categories=DB::table('job_categories')->where('is_active',1)->get();
        $job_categories=DB::table('job_categories')->get();
        return view("themes.".$theme.".".$path,array_merge($obj,[
            'countries'=>$countries,
            'primary_menu'=>$primary_menu,
            'job_categories'=>$job_categories
        ]));
    }
}