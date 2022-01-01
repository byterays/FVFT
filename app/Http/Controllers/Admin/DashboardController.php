<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Vue;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function index(){
        return view('admin.dashboard');
    }
}
