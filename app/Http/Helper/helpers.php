<?php

use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
    function setParameter($job, $parameter)
    {
        return $data = $job != null ? $job->$parameter : '';
    }
}
