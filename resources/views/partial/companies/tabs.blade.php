<style>
    .tabItems .nav-item {
        background-color: #4e4a4a;
    }

    .tabItems .nav-item.active {
        color: white;
        background-color: blue;
    }

    .tabItems.nav-tabs .nav-link {
        color: white;
    }

    .tabItems.nav-tabs .nav-link:hover {
        color: white;
        background-color: #4e4a4a;
    }

    .tabItems.nav-tabs .nav-item.active .nav-link:hover {
        color: white;
        background-color: blue;
    }

    /* .navtab-wizard li:last-of-type a {
        border-right: 1px solid #fff !important;
    } */
    .navtab-wizard li  {
        border-right: 1px solid #fff !important;
        border-left:none !important;
    }
    .navtab-wizard li .nav-link  {
        border-left:none !important;
        padding: 1rem 1.6rem;
    }

    .nav-tabs .nav-link {

        padding: 0;

    }

</style>
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
            class="nav-link font-bold">JOB STATUS</a>
    </li>
    @if ($company->is_active == 1)
        <li class="nav-item {{ $_edit ? 'active' : '' }}"><a href="{{ route('company.newjob.get_job_detail') }}"
                class="nav-link font-bold">POST NEW JOB </a></li>
    @endif
    <li class="nav-item"><a href="#tab3" class="nav-link font-bold"></a></li>
</ul>
