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

</style>
<?php 
use Illuminate\Support\Facades\Route;
$route = 'candidate.profile.';
$RouteName = Route::currentRouteName();
$_index = $RouteName == $route.'index';
$_edit = ($RouteName ==  $route.'get_personal_information' || $RouteName == $route.'get_contact_information' || $RouteName == $route.'get_qualification'
|| $RouteName == $route.'get_experience' || $RouteName == $route.'get_preview' || $RouteName == $route.'get_save');
?>
<ul class="nav nav-tabs nav-justified navtab-wizard tabItems bg-muted"
    style="border-bottom: 0px solid #e8ebf3 !important; ">
    <li class="nav-item {{ $_index ? 'active' : '' }}"><a href="{{ route('candidate.profile.index') }}" class="nav-link font-bold">My
            Profile</a>
    </li>
    <li class="nav-item {{ $_edit ? 'active' : '' }}"><a href="{{ route('candidate.profile.get_personal_information') }}"
            class="nav-link font-bold">Edit
            Profile</a></li>
    <li class="nav-item"><a href="#tab3" class="nav-link font-bold">CV</a></li>
    <li class="nav-item"><a href="#tab4" class="nav-link font-bold"></a></li>
</ul>
