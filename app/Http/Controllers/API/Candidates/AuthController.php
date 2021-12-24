<?php

namespace App\Http\Controllers\API\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employe;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:55',
            'last_name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
        ]);
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $employe= Employe::create(
            [
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name?$request->middle_name:null,
                'last_name' => $request->last_name,
                'user_id' => $user->id
            ]
        );
        return $this->login($request);
    }
 
    /**
     * Login
     */
    public function login(Request $request){
        $login=$request->validate([
            'email'=>'required|string',
            'password'=>'required|string',
        ]);
        if(!Auth::attempt($login)){
            return  $this->failed_response();
        }else{
            return  $this->success_response();
        }
    }

    public function getToken(Request $request){
        $credentials=$request->validate([
            'client_id'=>'required|string',
            'client_secret'=>'required|string',
        ]);
        return $credentials;
    }
    public function success_response(){
        $user=Auth::user();
        $employe= Employe::where('user_id',$user->id)->first();
        $accesstoken = $user->createToken('FVFT_AcessToken')->accessToken;
        
        return  
            [
                'success'=>true,
                'message'=>'Logined Succesful !',
                'data'=>[
                    'user'=>[
                        "user_id"=>$user->id,
                        "fullname"=>$employe->first_name." ".$employe->middle_name." ".$employe->last_name,
                        "email"=>$user->email,
                        "imageurl"=>$employe->avatar,
                        "user_type"=>$user->user_type
                    ],
                    'token'=> $accesstoken
                ]
            ];
    }
    public function failed_response(){
        return 
            [
                'success'=>false,
                'message'=>'Invalid login credentials'
            ];
    }
}
