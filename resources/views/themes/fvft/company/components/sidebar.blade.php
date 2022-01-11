<div class="card">
    <div class="card-header">
        <h3 class="card-title">My Dashboard</h3>
    </div>
    <div class="card-body text-center item-user border-bottom">
        <div class="profile-pic">
            <div class="profile-pic-img">
                <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="" data-original-title="online"></span>
                <img src="../assets/images/users/male/25.jpg" class="brround" alt="user">
            </div>
            <a href="userprofile.html" class="text-dark"><h4 class="mt-3 mb-0 font-weight-semibold">Robert McLean</h4></a>
        </div>
    </div>
    <div class="item1-links  mb-0">
        <a href="/company/home" class="active d-flex border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-home fs-20"></i></span> Home
        </a>
        <a href="/company/profile" class="d-flex border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-edit fs-20"></i></span> Profile
        </a>
        <a href="/company/jobs" class=" d-flex border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-briefcase fs-20"></i></span> My Jobs
        </a>
        <a href="/company/applicants" class="d-flex border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-heart-outline fs-20"></i></span> Applicants
        </a>

        <a href="/company/settings" class="d-flex border-bottom">
            <span class="icon1 mr-2"><i class="typcn typcn-cog-outline fs-20"></i></span> Settings
        </a>
        <a href="login.html" class="d-flex">
            <form action="/candidate/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-secondary mb-1 mt-1">
                    <span class="icon1 mr-2" style="background: #ffffff00;color: #f3f6ff;"><i class="typcn typcn-power-outline fs-20"></i></span> Logout
                </button>
            </form>
        </a>
    </div>
</div>