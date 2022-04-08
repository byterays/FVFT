<link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
<?php 
use Illuminate\Support\Facades\Route;



$setting_route = 'candidate.';
$RouteName = Route::currentRouteName();
$_editProfile = $RouteName == $setting_route . 'account_setting.index';
$_changePassword = $RouteName == $setting_route . 'account_setting.get_change_password';
$_deleteAccount = $RouteName == $setting_route.'account_setting.get_account_setting';
$_support = $RouteName == $setting_route.'support.index';

$_jobsetting = $RouteName == $setting_route.'job_setting.index';
?>
<ul class="nav nav-tabs nav-justified navtab-wizard tabItems bg-muted"
    style="border-bottom: 0px solid #e8ebf3 !important; ">
    <li class="nav-item {{ $_editProfile || $_changePassword || $_deleteAccount ? 'active' : '' }}"><a href="{{ route('candidate.account_setting.index') }}" class="nav-link font-bold">{{ strtoupper(__('Account Setting')) }}</a>
    </li>
    <li class="nav-item {{ $_jobsetting ? 'active' : '' }}"><a href="{{ route('candidate.job_setting.index') }}"
            class="nav-link font-bold">{{ strtoupper(__('Job Setting')) }}</a></li>
    <li class="nav-item {{ !$_support ?: 'active' }}"><a href="{{ route('candidate.support.index') }}" class="nav-link font-bold">{{ strtoupper(__('Support')) }}</a></li>
    <li class="nav-item"><a href="#" class="nav-link font-bold"></a></li>
</ul>
