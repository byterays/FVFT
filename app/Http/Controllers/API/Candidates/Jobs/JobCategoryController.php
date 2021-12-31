<?php

namespace App\Http\Controllers\API\Candidates\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Api\ApiMethods;
use DB;
class JobCategoryController extends Controller
{
    use ApiMethods;
    public function index(Request $request){
        $job_category= DB::table('job_categories')->
        find($request->job_categoriy_id);
        return $this->sendResponse($this->process($job_category),"Jobs Category List.");
    }
    public function list(){
        $results=[];
        $job_categorys= DB::table('job_categories')->get();
        foreach($job_categorys as $index=>$category){
            $results[$index]=$this->process($category);
        }
        return $this->sendResponse($results,"Jobs Category List.");
    }
    public function process($category){
        return [
            "id" => $category->id,
            "category" => $category->functional_area,
            "image_url" => $category->image_url,
            "sort_order"=>$category->sort_order
        ];
    }
}
