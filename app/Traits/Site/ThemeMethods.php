<?php
 
namespace App\Traits\Site;
use Illuminate\Http\Response;
use DB;
trait ThemeMethods{
    public function site_view($path,$obj=[]){
        $theme="fvft";
        $countries=DB::table('countries')->where('is_active',1)->get();
        return view("themes.".$theme.".".$path,array_merge($obj,[
            'countries'=>$countries
        ]));
    }
}