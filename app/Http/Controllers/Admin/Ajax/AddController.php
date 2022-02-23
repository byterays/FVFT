<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddController extends Controller
{
    public function ajaxStoreSkill(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => ['required', 'unique:skills,title'],
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        if($validator->passes()){
            $input = $request->except('_token');
            
            $input['is_active'] = 1;
            $input['sort_order'] = DB::table('skills')->orderBy('created_at', 'DESC')->first()->sort_order + 1;
            DB::table('skills')->insert($input);
            $skill = DB::table('skills')->orderBy('created_at', 'DESC')->first();
            return response()->json(['skill_id' => $skill->id, 'skill_title' => $skill->title]);
        }
    }
}
