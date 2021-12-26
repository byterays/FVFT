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
        $jobs= DB::table('job_categories')->
        find($request->job_categoriy_id);
        return $this->sendResponse($jobs,"Jobs Category List.");
    }
    public function list(){
        $jobs= DB::table('job_categories')->get();
        return $this->sendResponse($jobs,"Jobs Category List.");
    }
}
