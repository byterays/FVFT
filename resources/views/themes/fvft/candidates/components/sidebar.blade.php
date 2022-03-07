<div class="card">
    <div class="card-header">
        <h3 class="card-title">My Dashboard</h3>
    </div>
    <div class="card-body text-center item-user border-bottom">
        <div class="profile-pic">
            <div class="profile-pic-img">
                <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="" data-original-title="online"></span>
                <img src="{{ asset($employe->avatar ?? 'uploads/default.jpg') }}" class="brround" alt="user">
            </div>
            <a href="userprofile.html" class="text-dark"><h4 class="mt-3 mb-0 font-weight-semibold">{{$employe->first_name}} {{$employe->middle_name}} {{$employe->last_name}}</h4></a>
        </div>
    </div>
    <div class="item1-links  mb-0">
        <a href="/candidate/jobs" class="@if(Route::currentRouteName()=="candidate.jobs" OR Route::currentRouteName()=="candidate.dashboard") active @endif   d-flex  border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-briefcase fs-20"></i></span> My Jobs
        </a>
        <a href="/candidate/profile" class="@if(Route::currentRouteName()=="candidate.profile") active @endif d-flex border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-edit fs-20"></i></span> Profile
        </a>
        <a href="{{ route('candidate.savedjob.saveJobLists') }}" class="@if(Route::currentRouteName()=="candidate.savedjob.saveJobLists") active @endif   d-flex  border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-briefcase fs-20"></i></span> Saved Jobs
        </a>
        <a href="{{ route('candidate.recommended_job') }}" class="@if(Route::currentRouteName()=="candidate.recommended_job") active @endif   d-flex  border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-briefcase fs-20"></i></span> Recommended Jobs
        </a>
        <a href="{{ route('candidate.company_lists') }}" class="@if(Route::currentRouteName()=="candidate.company_lists") active @endif   d-flex  border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-briefcase fs-20"></i></span> Company Lists
        </a>
        {{-- <a href="/pages/tips" class="d-flex border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-flag-outline fs-20"></i></span> Safety Tips
        </a> --}}
        <a href="/candidate/job-preferences" class="@if(Route::currentRouteName()=="candidate.job-preferences") active @endif  d-flex border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-cog-outline fs-20"></i></span> Job Preferences
        </a>
        <a href="/candidate/settings" class="@if(Route::currentRouteName()=="candidate.settings") active @endif  d-flex border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-cog-outline fs-20"></i></span> Settings
        </a>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-secondary btn-block">
                <span class="icon1 mr-2" style="background: #ffffff00;color: #f3f6ff;"><i class="typcn typcn-power-outline fs-20"></i></span> Logout
            </button>
        </form>
    </div>
</div>
