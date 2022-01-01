<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;
class HomeController extends Controller
{
    use ThemeMethods;
    public function home(){
   
        return $this->site_view('site.home');
    }
}
