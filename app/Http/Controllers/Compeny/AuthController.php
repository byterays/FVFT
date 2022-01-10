<?php

namespace App\Http\Controllers\Compeny;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;

class AuthController extends Controller
{
    use ThemeMethods;
    public function login(){
        return $this->site_view('compeny.auth.auth');
    }
}