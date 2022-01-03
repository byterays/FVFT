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
        $user= \Auth::user();
        $admin= \DB::table('admin_profiles')->where('user_id',$user->id)->first();
        return view('admin.dashboard',['user'=>[
            "user_id"=>$user->id,
            "user_email"=>$user->email,
            "admin_id"=>$admin->id,
            "name"=>$admin->name,
            "profile"=>$admin->avatar,
            "cover"=>$admin->cover
            ]]);
        }
}
