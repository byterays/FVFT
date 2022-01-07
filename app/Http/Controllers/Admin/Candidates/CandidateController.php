<?php

namespace App\Http\Controllers\Admin\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Employe;
use App\Traits\Admin\AdminMethods;

class CandidateController extends Controller
{
    use AdminMethods;
    public function __construct(){

        $this->countries=DB::table('countries')->get();
    }
    public function list(){
        return $this->view('admin.pages.candidates.list',[
            'candidates'=>Employe::paginate(10)
        ]);
    }
    public function new(){
        return $this->view('admin.pages.candidates.editadd',[
            'action'=>"New",
            'countries'=>$this->countries
        ]);
    }
    public function edit($id){
        $candidate =Employe::find($id);
        // dd(User::find($candidate->user_id));
        return $this->view('admin.pages.candidates.editadd',[
            'candidate'=>$candidate,
            'action'=>"Edit",
            'candidate_user'=>User::find($candidate->user_id),
            'countries'=>$this->countries
        ]);
    }
    public function save(Request $request){
        // dd($request);
        $userfield =[];
        $request->password?$userfield['password']=bcrypt($request->password):null;
        $userfield['email'] =$request->email;
        $user=User::updateOrCreate(['id'=>$request->user_id],$userfield);
        
        $request->avatar?$avatarfile=time().'_'.$request->avatar->getClientOriginalName():null;
        $request->avatar?$request->avatar->move(public_path('uploads/candidates/profiles','public'),$avatarfile):null;

        $fields = [];
        $request->first_name?$fields['first_name']=$request->first_name:null;
        $request->middle_name?$fields['middle_name']=$request->middle_name:null;
        $request->last_name?$fields['last_name']=$request->last_name:null;
        $request->mobile_phone?$fields['mobile_phone']=$request->mobile_phone:null;
        $request->avatar?$fields['avatar']='uploads/candidates/profiles/'.$avatarfile:null;
        $request->dob?$fields['dob']=$request->dob:null;
        $fields['user_id']=$user->id;
        $request->gender?$fields['gender']=$request->gender:null;
        $request->marital_status?$fields['marital_status']=$request->marital_status:null;
        $request->nationality?$fields['nationality']=$request->nationality:null;

        $request->country_id?$fields['country_id']=$request->country_id:null;
        $request->state_id?$fields['state_id']=$request->state_id:null;
        $request->city_id?$fields['city_id']=$request->city_id:null;

        $request->address?$fields['address']=$request->address:null;
        $request->is_active?$fields['is_active']=$request->is_active=="on"?1:0:null;

        $candidate=Employe::updateOrCreate(['id'=>$request->id],$fields);

        return $this->view('admin.pages.candidates.editadd',[
            'candidate'=>$candidate,
            'action'=>"Edit",
            'candidate_user'=>User::find($candidate->user_id),
            'countries'=>$this->countries
        ]);
    }
    public function delete($id){
        try {
            DB::table('employes')->delete($id);
            return redirect()
            ->route('admin.candidates.list')
            ->with(['delete'=>[
                'status' => 'success'
            ]]);
        } catch (\Throwable $th) {
            return redirect()
            ->route('admin.candidates.list')
            ->with(['delete'=>[
                'status' => 'failed'
            ]]);
        }
    }
}
