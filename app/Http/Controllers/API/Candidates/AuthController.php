<?php

namespace App\Http\Controllers\API\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employe;
use Illuminate\Support\Facades\Auth;
use App\Traits\Api\ApiMethods;
class AuthController extends Controller
{
    use ApiMethods;
    /**
     * Registration
     */
    public function register(Request $request)
    {
        try{
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
            $login=$request->validate([
                'email'=>'required|string',
                'password'=>'required|string',
            ]);
            if(!Auth::attempt($login)){
                return  $this->sendError('Login Failed !');
            }else{
                return  $this->success_response("Sign Up Succesful !");
            }
        }catch(\Exception $e){
            return $this->sendError('Sign Up Failed');
        }
    }
 
    /**
     * Login
     */
    public function login(Request $request){
        try{
            try{
                $login=$request->validate([
                    'email'=>'required|string',
                    'password'=>'required|string',
                ]);
            }catch(\Exception $e){
                $this->sendError($e);
            }
            if(!Auth::attempt($login)){
                return $this->sendError("Login failed !");
            }else{
                return  $this->success_response("Login Successfully");
            }
        }catch(\Exception $e){
            return $this->sendError("Login failed !");
        }
    }
    
    public function getToken(Request $request){
        $credentials=$request->validate([
            'client_id'=>'required|string',
            'client_secret'=>'required|string',
        ]);
        return $credentials;
    }
    public function success_response($message){
        $user=Auth::user();
        $employe= Employe::where('user_id',$user->id)->first();
        $accesstoken = $user->createToken('FVFT_AcessToken')->accessToken;
        
        return  
            [
                'success'=>true,
                'message'=>$message,
                'data'=>[
                    'user'=>[
                        "user_id"=>$user->id,
                        "first_name"=>$employe->first_name,
                        "middle_name"=>$employe->middle_name,
                        "last_name"=>$employe->last_name,
                        "email"=>$user->email,
                        "image_url"=>$employe->avatar,
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
