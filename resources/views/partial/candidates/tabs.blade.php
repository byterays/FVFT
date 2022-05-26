<link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
<?php
use Illuminate\Support\Facades\Route;
$route = 'candidate.profile.';
$RouteName = Route::currentRouteName();
$_index = $RouteName == $route.'index';
$_edit = ($RouteName ==  $route.'get_personal_information' || $RouteName == $route.'get_contact_information' || $RouteName == $route.'get_qualification'
    || $RouteName == $route.'get_experience' || $RouteName == $route.'get_preview' || $RouteName == $route.'get_save');
$_cv = $RouteName == $route.'get_cv';
?>

<div class="card mb-0">
    <div class="card-body">
        <h3 class="card-title">{{ __($title ?? 'No Title') }}</h3>
        <ul class="nav nav-tabs nav-justified navtab-wizard tabItems bg-muted"
            style="border-bottom: 0px solid #e8ebf3 !important; ">
            <li class="nav-item {{ $_index ? 'active' : '' }}"><a href="{{ route('candidate.profile.index') }}" class="nav-link font-bold">{{ __('My Profile') }}</a>
            </li>
            <li class="nav-item {{ $_edit ? 'active' : '' }}"><a href="{{ route('candidate.profile.get_personal_information') }}"
                                                                 class="nav-link font-bold">{{ __('Edit Profile') }}</a></li>
            <li class="nav-item {{ $_cv ? 'active' : '' }}"><a href="{{ route('candidate.profile.get_cv') }}" class="nav-link font-bold">{{ __('CV') }}</a></li>
            {{-- <li class="nav-item"><a href="#tab4" class="nav-link font-bold"></a></li> --}}
        </ul>
    </div>
</div>
