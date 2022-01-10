{{-- @dd($user["profile"]) --}}
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar doc-sidebar ps ps--active-y">
					<div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body">
							<div>
								<img src="{{asset('/')}}{{ $user["profile"] }}" alt="user-img" class="avatar avatar-lg brround">
								<a href="editprofile.html" class="profile-img">
									<span class="fa fa-pencil" aria-hidden="true"></span>
								</a>
							</div>
							<div class="user-info">
								<h2>{{ $user["name"] }}</h2>
								<span>Admin</span>
							</div>
						</div>
					</div>
					<ul class="side-menu">
						<li class="slide is-expanded">
							<a class="side-menu__item active" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-tachometer"></i><span class="side-menu__label">Dashboard</span></a>
						</li>
                        <li class="slide">
							<span class="side-menu__item">
                                <span class="side-menu__label">MODULES</span>
                            </span>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Jobs</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="/admin/jobs-list">List Jobs</a></li>
								<li><a class="slide-item" href="/admin/jobs-new">Add Job</a></li>
							</ul>
						</li>
                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Companies</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="/admin/companies/">List Companies</a></li>
								<li><a class="slide-item" href="/admin/companies/new">Add Company</a></li>
							</ul>
						</li>
                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Candidates</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="/admin/candidates/">List Candidates</a></li>
								<li><a class="slide-item" href="/admin/candidates/new">Add Candidate</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Applicants</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="/admin/applicants/">List Applicants</a></li>
								{{-- <li><a class="slide-item" href="/admin/applicants/new">Add Applicants</a></li> --}}
							</ul>
						</li> 
                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="/admin/pages/">List Pages</a></li>
								<li><a class="slide-item" href="/admin/pages/new">Add Page</a></li>
							</ul>
						</li> 
                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
                                <i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">News</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="admin-pricing.html">List News</a></li>
								<li><a class="slide-item" href="Ads.html">Add New</a></li>
							</ul>
						</li>  
						<li class="slide">
							<span class="side-menu__item">
                                <span class="side-menu__label">MANAGE</span>
                            </span>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
                            <i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Admin Users</span></a>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#">
                            <i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">Site Settings</span></a>
						</li>
						
					</ul>
		
				