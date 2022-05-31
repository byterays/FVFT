<?php

namespace App\Http\Controllers;

use App\Models\ApplicantFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApplicantFilterController extends Controller
{
    public function __construct()
    {
        
    }

    public function getApplicantFilter(Request $request)
    {
        try{
            $applicantFilter = ApplicantFilter::where("id", $request->applicantFilterId)->first();
            return response()->json(['applicantFilter' => $applicantFilter, "success" => true]);
        } catch(\Exception $e){
            return response()->json(['error' => $e->getMessage(), "success" => false]);
        }
    }

    public function saveFilter(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'filter_name' => ['required', 'unique:applicant_filters,filter_name'],
        ]);
        if($validator->fails()){
            return response()->json(['success' => false,'errors' => $validator->errors()]);
        }
        try{
            DB::beginTransaction();
            $datas = [];
            $datas[] = [
                'job_title' => $request->job_title,
                'gender' => $request->gender,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'experience' => $request->experience,
                'education_level' => $request->education_level,
                'application_status' => $request->application_status,
                'profile_score' => $request->profile_score,
                'min_age' => $request->min_age,
                'max_age' => $request->max_age,
                'skills' => !blank($request->skills) ? json_encode($request->skills) : null,
                'trainings' => !blank($request->trainings) ? json_encode($request->trainings) : null,
                'languages' => !blank($request->languages) ? json_encode($request->languages) : null,
                'preferred_jobs' => !blank($request->preferred_jobs) ? json_encode($request->preferred_jobs) : null,
                'preferred_countries' => !blank($request->preferred_countries) ? json_encode($request->preferred_countries) : null,

            ];
            $applicant_filter = ApplicantFilter::create([
                'filter_name' => $request->filter_name,
                'filter_value' => json_encode($datas),
            ]);
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Filter saved successfully']);
        } catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'db_error' => $e->getMessage()]);
        }
    }
}
