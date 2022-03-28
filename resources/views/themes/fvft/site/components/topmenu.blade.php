<!--Top Bar-->
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-sm-4 col-7">
                <div class="top-bar-left d-flex">
                    <div class="clearfix">
                        <ul class="socials">
                            <li>
                                <a class="social-icon" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="social-icon" href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="social-icon" href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a class="social-icon" href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix">
                        <ul class="contact border-left">
                            <li class="d-lg-none">
                                <a href="#" class="callnumber"><span><i class="fa fa-phone mr-1"></i>: +425 345 8765</span></a>
                            </li>
                            <li class="dropdown d-none d-xl-inline-block">
                                <a href="#" class="" data-toggle="dropdown"><span> Language <i class="fa fa-caret-down"></i></span> </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item" >
                                        English
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Nepali
                                    </a>
                                </div>
                            </li>
                            <li class="select-country">
                                <select class="form-control select2-flag-search" data-placeholder="Select Country">
                                    @foreach($countries as $index => $country)
                                        <option value="{{$country->iso2}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </li>
                            {{-- <li class="dropdown d-none d-xl-inline-block">
                                <a href="#" class="" data-toggle="dropdown"><span>Currency <i class="fa fa-caret-down"></i></span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item" >
                                        USD
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        EUR
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        INR
                                    </a>
                                    <a href="#" class="dropdown-item" >
                                        GBP
                                    </a>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-sm-8 col-5">
                <div class="top-bar-right">
                    <ul class="custom">
                        @guest
                            <li>
                                <a href="{{ route('candidate.login') }}" class=""><i class="fa fa-user mr-1"></i> <span>Register</span></a>
                            </li>
                            <li>
                                <a href="{{ route('candidate.login') }}" class=""><i class="fa fa-sign-in mr-1"></i> <span>Login</span></a>
                            </li>
                            <li>
                                <a href="{{ route('company.login') }}" class=""><i class="fa fa-black-tie mr-1"></i> <span>For Employer</span></a>
                            </li>
                            <li>
                                <a href="{{ route('candidate.login') }}" class=""><i class="fa fa-users mr-1"></i> <span>For Employee</span></a>
                            </li>
                        @endguest
                        @auth
                            {{--<li class="dropdown">--}}
                            {{--<a href="#" class="" data-toggle="dropdown"><i class="fa fa-home mr-1"></i><span> My Dashboard</span></a>--}}
                            {{--<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
                            {{--<a href="{{ route('company.dash') }}" class="dropdown-item" >--}}
                            {{--<i class="dropdown-icon icon icon-user"></i> My Profile--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item" href="{{ route('company.dash') }}">--}}
                            {{--<i class="dropdown-icon icon icon-speech"></i> Inbox--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item" href="{{ route('company.dash') }}">--}}
                            {{--<i class="dropdown-icon icon icon-bell"></i> Notifications--}}
                            {{--</a>--}}
                            {{--<a href="{{ route('company.dash') }}" class="dropdown-item" >--}}
                            {{--<i class="dropdown-icon  icon icon-settings"></i> Account Settings--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            {{--</li>--}}
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Top Bar-->
