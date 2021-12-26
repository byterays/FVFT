<?php

namespace App\Http\Controllers\API\Candidates\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Api\ApiMethods;
use DB;
class NewsController extends Controller
{
    use ApiMethods;
    public function index($id){
        $jobs= DB::table('news')->
        find($id);
        return $this->sendResponse($jobs,"News Fetched.");
    }
    public function list(){
        $jobs= DB::table('news')->orderBy('id', 'DESC')->get();
        return $this->sendResponse($jobs,"News List.");
    }
}
