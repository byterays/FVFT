<?php

use Carbon\Carbon;
use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('createSlug')) {
    function createSlug($title)
    {
        return Str::slug($title);
    }
}

if (!function_exists('notifyMsg')) {
    function notifyMsg($type, $msg)
    {
        return [
            'alert-type' => $type,
            'message' => $msg,
        ];
    }
}

if (!function_exists('getApplicantCompanyList')) {
    function getApplicantCompanyList($applicant)
    {
        $job_id = $applicant->job_applications()->pluck('job_id');
        $companies_id = Job::whereIn('id', $job_id)->pluck('company_id')->toArray();
        $unique_company_id = array_unique($companies_id);
        return $unique_company_id;
    }
}

if (!function_exists('authIsCandidate')) {
    function authIsCandidate()
    {
        if (Auth::check() && Auth::user()->user_type == 'candidate') {
            return true;
        }
        return false;
    }
}

if (!function_exists('checkUserType')) {
    function checkUserType($type)
    {
        if (Auth::check() && Auth::user()->user_type == $type) {
            return true;
        }
        return false;
    }
}

if (!function_exists('paginateCollection')) {
    function paginateCollection($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}

if (!function_exists('wrapInTag')) {
    function wrapInTag($arr, $tag = 'span', $atts = '', $sep = ',')
    {
        return "<$tag $atts>" . implode("</$tag>$sep<$tag $atts>", $arr) . "</$tag>";
    }
}
if (!function_exists('setParameter')) {
    function setParameter($model, $parameter)
    {
        return $data = $model != null ? $model->$parameter : '';
    }
}


if(!function_exists('str_limit')){
    function str_limit($desc, $limit){
        return Str::limit($desc, $limit);
    }
}

if(!function_exists('parseDate')){
    function parseDate($date){
        return Carbon::parse($date)->diffForHumans();
    }
}