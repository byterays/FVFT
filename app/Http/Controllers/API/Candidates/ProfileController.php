<?php

namespace App\Http\Controllers\API\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employe;
use Illuminate\Support\Facades\Auth;
use App\Traits\Api\ApiMethods;
use DB;

class ProfileController extends Controller
{
    use ApiMethods;

    public function get_profile($message= "User Profile."){
        return $this->sendResponse(
            $this->process(Auth::user()),
            $message
        );
    }
    public function save_profile(Request $request){        
        $employe= Employe::where('user_id',Auth::user()->id)->first();
        $user=User::find(Auth::user()->id);
        if($request->has('phone')){
            $employe->update(["mobile_phone"=>$request->phone]);
        }
        if($request->has('first_name')){
            $employe->update(["first_name"=>$request->first_name]);
        }
        if($request->has('middle_name')){
            $employe->update(["middle_name"=>$request->middle_name]);
        }
        if($request->has('last_name')){
            $employe->update([ "last_name"=>$request->last_name]);
        }
        if($request->has('profile_img')){
            $base64 =  $request->profile_img["base64"];
            $image_info = getimagesize($base64);
            $extension = (isset($image_info["mime"]) ? explode('/', $image_info["mime"] )[1]: "");
            $suported_type= array('png', 'jpg', 'jpeg');
            if (in_array($extension,$suported_type)){
                $upload=$this->upload($request->profile_img["base64"]);
                $employe->update(["avatar"=>$upload]);
            }
        }
        return $this->get_profile("Profile Update Succesful !");

    }
    private function process($user){
        $employe= Employe::where('user_id',$user->id)->first();
        return [
            "user_id"=>$user->id,
            "first_name"=>$employe->first_name,
            "middle_name"=>$employe->middle_name,
            "last_name"=>$employe->last_name,
            "email"=>$user->email,
            "phone"=>$employe->mobile_phone,
            "user_type"=>$user->user_type,
            'is_verified'=>$employe->is_verified==1?true:false,
            'image_url'=>env("APP_URL").$employe->avatar,
        ];
    }

    public function change_password(Request $request){
        // return $request;
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required'
        ]);
        
        if(\Hash::check($request->old_password, auth()->user()->password)){
            $authuser=Auth::user();
            $user=User::find($authuser->id);
            $user->update([
                "password"=>bcrypt($request->new_password)
            ]);
            $employe= Employe::where('user_id',$user->id)->first();
            $token = $authuser->token();
            $token->revoke();
            $accesstoken = $authuser->createToken('FVFT_AcessToken')->accessToken;
            return $this->sendResponse([
                "token" => $accesstoken
            ],"Password Changed!");
        }else{
            return $this->sendError("Password Not Matched !");
        }
    }
    public function upload($img)
    {
        $folderPath = "uploads/candidates/profiles/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . sha1(time()).'.'.$image_type;
        file_put_contents(public_path("/").$file, $image_base64);
        return $file;
    }
}
