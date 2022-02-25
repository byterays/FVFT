<?php

use App\Models\Job;
use Illuminate\Support\Str;

if(!function_exists('createSlug')){
    function createSlug($title){
        return Str::slug($title);
    }
}


if(!function_exists('notifyMsg')){
    function notifyMsg($type, $msg){
        return [
            'alert-type' => $type,
            'message' => $msg,
        ];
    }
}


if(!function_exists('getApplicantCompanyList')){
    function getApplicantCompanyList($applicant){
        $job_id = $applicant->job_applications()->pluck('job_id');
        $companies_id = Job::whereIn('id', $job_id)->pluck('company_id')->toArray();
        $unique_company_id = array_unique($companies_id);
        return $unique_company_id;
    }
}