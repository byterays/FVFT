<?php

namespace App\Http\Controllers\Compeny;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;

class DashController extends Controller
{
    use ThemeMethods;
    public function dashboard(){
        return $this->site_view('company.dash');
    }
}
