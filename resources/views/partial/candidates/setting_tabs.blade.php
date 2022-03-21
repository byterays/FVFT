<link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
<?php 
use Illuminate\Support\Facades\Route;
$route = 'candidate.profile.';
$RouteName = Route::currentRouteName();
$_index = $RouteName == $route.'index';
$_edit = ($RouteName ==  $route.'get_personal_information' || $RouteName == $route.'get_contact_information' || $RouteName == $route.'get_qualification'
|| $RouteName == $route.'get_experience' || $RouteName == $route.'get_preview' || $RouteName == $route.'get_save');


$setting_route = 'candidate.';
$RouteName = Route::currentRouteName();
$_editProfile = $RouteName == $setting_route . 'account_setting.index';
$_changePassword = $RouteName == $setting_route . 'account_setting.get_change_password';
$_deleteAccount = $RouteName == $setting_route.'account_setting.get_account_setting';
?>
<ul class="nav nav-tabs nav-justified navtab-wizard tabItems bg-muted"
    style="border-bottom: 0px solid #e8ebf3 !important; ">
    <li class="nav-item {{ $_editProfile || $_changePassword || $_deleteAccount ? 'active' : '' }}"><a href="{{ route('candidate.profile.index') }}" class="nav-link font-bold">{{ strtoupper('Account Setting') }}</a>
    </li>
    <li class="nav-item {{ $_edit ? 'active' : '' }}"><a href="{{ route('candidate.profile.get_personal_information') }}"
            class="nav-link font-bold">{{ strtoupper('Job Setting') }}</a></li>
    <li class="nav-item"><a href="#tab3" class="nav-link font-bold">{{ strtoupper('Support') }}</a></li>
    <li class="nav-item"><a href="#tab4" class="nav-link font-bold"></a></li>
</ul>
