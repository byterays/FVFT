<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Admin\AdminMethods;

class SiteSettingController extends Controller
{   
    use AdminMethods;
    public function index(){
        return $this->view('admin.site-settings');
    }
    public function save(Request $request){
        return $this->view('admin.site-settings');
    }
}
