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
        if($request->has('email')){
            $user->update(["email"=>$request->email]);
        }
        if($request->has('password')){
            $user->update(["password"=>bcrypt($request->password)]);
        }
        if($request->has('first_name')){
            $employe->update(["first_name"=>$request->first_name]);
        }
        if($request->has('middle_name')){
            $employe->update(["middle_name"=>$request->middle_name]);
        }
        if($request->has('middle_name')){
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
            "user_type"=>$user->user_type,
            'is_verified'=>$employe->is_verified==1?true:false,
            'image_url'=>$employe->avatar,
        ];
    }
    public function upload($img)
    {
        $folderPath = "uploads/candidates/profiles/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . sha1(time()).'.'.$image_type;
        file_put_contents($file, $image_base64);
        return $file;
    }
}
