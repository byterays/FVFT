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
        return $this->sendResponse($this->process($jobs),"News Fetched.");
    }
    public function list(){
        $results=[];
        $jobs= DB::table('news')->orderBy('id', 'DESC')->get();
        foreach($jobs as $index=>$job){
            $results[$index]=$this->process($job);
        }
        return $this->sendResponse($results,"News List.");
    }
    public function process($news){
        return [
            "id"=>$news->id,
            "title"=>$news->title,
            "body"=>json_decode($news->body),
            "feature_img"=>$news->feature_img,
            "created_at"=>$news->created_at,
            "updated_at"=>$news->updated_at
        ];
    }
}
