<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;

class HomeController extends Controller
{
    use ThemeMethods;
    public function home()
    {
        $news = \DB::table('news')->where('is_active', 1)->orderBy('id', 'desc')->limit(10)->get();
        $companies = \DB::table('companies')->where('is_active', 1)->orderBy('id', 'desc')->limit(10)->get();
        return $this->site_view('site.home', ['news' => $news, 'companies' => $companies]);
    }
}
