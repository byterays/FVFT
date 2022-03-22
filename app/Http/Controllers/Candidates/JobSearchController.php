<?php

namespace App\Http\Controllers\Candidates;

use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;
use App\Http\Controllers\Controller;
use App\Traits\Site\CandidateMethods;

class JobSearchController extends Controller
{
    use ThemeMethods, CandidateMethods;
    private $page = "candidates.job_search.";

    public function __construct()
    {
        
    }

    public function index()
    {

    }
}
