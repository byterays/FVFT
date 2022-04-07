<link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
<?php
use Illuminate\Support\Facades\Route;
$route = 'company.';
$RouteName = Route::currentRouteName();
$_index = $RouteName == $route . 'jobs';
$_edit = $RouteName == $route . 'newjob.get_job_detail';
?>
<ul class="nav nav-tabs nav-justified navtab-wizard tabItems bg-muted"
    style="border-bottom: 0px solid #e8ebf3 !important; ">
    <li class="nav-item {{ $_index ? 'active' : '' }}"><a href="{{ route('company.jobs') }}"
            class="nav-link font-bold">{{ strtoupper(__('Job Status')) }}</a>
    </li>
    @if ($company->is_active == 1)
        <li class="nav-item {{ $_edit ? 'active' : '' }}"><a href="{{ route('company.newjob.get_job_detail') }}"
                class="nav-link font-bold">{{ strtoupper(__('Post New Job')) }} </a></li>
    @endif
    <li class="nav-item"><a href="#tab3" class="nav-link font-bold"></a></li>
</ul>
