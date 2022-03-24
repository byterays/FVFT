<style>
    .tab-menu-heading {
    border: none;
}
</style>
<?php
use Illuminate\Support\Facades\Route;
$route = 'candidate.';
$RouteName = Route::currentRouteName();
$_preferJob = $RouteName == $route . 'job_setting.index';
$_jobalert = $RouteName == $route . 'account_setting.get_change_password';
?>
<div class="tab-menu-heading">
    <div class="tabs-menu ">
        <!-- Tabs -->
        <ul class="nav panel-tabs">
            <li class=""><a href="{{ route('candidate.account_setting.index') }}" class="{{ !$_preferJob ?: 'active' }}">{{ strtoupper('Preferred Job') }}</a></li>
            <li><a href="{{ route('candidate.account_setting.get_change_password') }}" class="{{ !$_jobalert ?: 'active' }}">{{ strtoupper('Job Alert') }}</a></li>
        </ul>
    </div>
</div>