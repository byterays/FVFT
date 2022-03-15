<div class="app-header1 header py-1 d-flex">
    <div class="container-fluid">
        <div class="d-flex">
            <a class="header-brand" href="/admin/">
                <img src="{{asset('/uploads/site/fvft_logo.jpeg')}}" class="header-brand-img" alt="Jobslist logo">
            </a>
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
            <div class="header-navicon">
                <a href="#" data-toggle="search" class="nav-link d-lg-none navsearch-icon">
                    <i class="fa fa-search"></i>
                </a>
            </div>
            <div class="header-navsearch">
                <a href="#" class=" "></a>
                <form class="form-inline mr-auto">
                    <div class="nav-search">
                        <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-none d-md-flex">
                    <a class="nav-link icon full-screen-link">
                        <i class="fe fe-maximize-2" id="fullscreen-button"></i>
                    </a>
                </div>
                <div class="dropdown d-none d-md-flex country-selector">
                    <a href="#" class="d-flex nav-link leading-none" data-toggle="dropdown">
                        <img src="{{asset('themes/fvft/')}}/assets/images/us_flag.jpg" alt="img" class="avatar avatar-xs mr-1 align-self-center">
                        <div>
                            <strong class="text-dark">English</strong>
                        </div>
                    </a>
                    {{-- <div class="language-width dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a href="#" class="dropdown-item d-flex pb-3">
                            <img src="{{asset('themes/fvft/')}}/assets/images/  Nepal_flag.jpg" alt="flag-img" class="avatar  mr-3 align-self-center">
                            <div>
                                <strong>    Nepali</strong>
                            </div>
                        </a>
                    </div> --}}
                </div>
                {{-- <div class="dropdown d-none d-md-flex">
                    <a class="nav-link icon" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class=" nav-unread badge badge-danger  badge-pill">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a href="#" class="dropdown-item text-center">You have 4 notification</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item d-flex pb-3">
                            <div class="notifyimg">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div>
                                <strong>2 new Messages</strong>
                                <div class="small text-muted">17:50 Pm</div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item d-flex pb-3">
                            <div class="notifyimg">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div>
                                <strong> 1 Event Soon</strong>
                                <div class="small text-muted">19-10-2019</div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item d-flex pb-3">
                            <div class="notifyimg">
                                <i class="fa fa-comment-o"></i>
                            </div>
                            <div>
                                <strong> 3 new Comments</strong>
                                <div class="small text-muted">05:34 Am</div>
                            </div>
                        </a>
                        <a href="#" class="dropdown-item d-flex pb-3">
                            <div class="notifyimg">
                                <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div>
                                <strong> Application Error</strong>
                                <div class="small text-muted">13:45 Pm</div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center">See all Notification</a>
                    </div>
                </div> --}}
                <div class="dropdown d-none d-md-flex">
                    <a class="nav-link icon" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class=" nav-unread badge badge-warning  badge-pill">{{ Auth::user()->unReadNotifications->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        @if(Auth::user()->unReadNotifications->count() > 0)
                            @foreach(Auth::user()->unReadNotifications()->get() as $ntitem)
                                <a href="{{ route('markread', $ntitem->id) }}" class="dropdown-item d-flex pb-3">
                                    {{-- <a href="{!! $ntitem->data['link'] != null ? $ntitem->data['link'] : '#' !!}" class="dropdown-item d-flex pb-3"> --}}
                                    <img src="{{asset('themes/fvft/')}}/assets/images/users/male/41.jpg" alt="avatar-img" class="avatar brround mr-3 align-self-center">
                                    <div>
                                        <span>{!! $ntitem->data['msg'] !!}</span>
                                        <div class="small text-muted"></div>
                                    </div>
                                </a>
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item text-center">View all Notification</a>
                        @else
                            <span class="dropdown-item text-center">No Notification</span>
                        @endif
                    </div>
                </div>
                {{-- <div class="dropdown d-none d-md-flex">
                    <a class="nav-link icon" data-toggle="dropdown">
                        <i class="fe fe-grid"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  app-selector">
                        <ul class="drop-icon-wrap">
                            <li>
                                <a href="#" class="drop-icon-item">
                                    <i class="icon icon-speech text-dark"></i>
                                    <span class="block"> E-mail</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="drop-icon-item">
                                    <i class="icon icon-map text-dark"></i>
                                    <span class="block">map</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="drop-icon-item">
                                    <i class="icon icon-bubbles text-dark"></i>
                                    <span class="block">Messages</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="drop-icon-item">
                                    <i class="icon icon-user-follow text-dark"></i>
                                    <span class="block">Followers</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="drop-icon-item">
                                    <i class="icon icon-picture text-dark"></i>
                                    <span class="block">Photos</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="drop-icon-item">
                                    <i class="icon icon-settings text-dark"></i>
                                    <span class="block">Settings</span>
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center">View all</a>
                    </div>
                </div> --}}
                <div class="dropdown ">
                    <a href="{{ route('admin.user.profile') }}" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
                        @if(!blank($user["profile"]))
                            <img src="{{ asset('/')}}{{ $user["profile"] }}" alt="profile-img" class="avatar avatar-md brround">
                        @else
                            <img src="{{ asset('/defaults/profile.png') }}" alt="profile-img" class="avatar avatar-md brround">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                        <a class="dropdown-item" href="{{ route('admin.user.profile') }}">
                            <i class="dropdown-icon icon icon-user"></i> My Profile
                        </a>
                        {{-- <a class="dropdown-item" href="emailservices.html">
                            <i class="dropdown-icon icon icon-speech"></i> Inbox
                        </a> --}}
                        <a class="dropdown-item" href="/admin/edit-profile">
                            <i class="dropdown-icon  icon icon-settings"></i> Account Settings
                        </a>
                        <form action="/admin/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="dropdown-icon icon icon-power"></i> Log out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
