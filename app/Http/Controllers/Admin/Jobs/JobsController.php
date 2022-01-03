<?php

namespace App\Http\Controllers\Admin\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(){

        return view('admin.pages.jobs.jobs_list',[
            'jobs' => \DB::table('jobs')->paginate(15)
        ]);
    }
    public function list(){

    }
}