@extends('themes.fvft.candidates.layouts.dashmaster')
@section('content')
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg"
            style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">My Jobs</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">My Dashboard </a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">My Jobs</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12 col-md-12">
                    @include('themes.fvft.candidates.components.sidebar')
                </div>
                <div class="col-xl-9 col-lg-12 col-md-12">
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Dashboard</h3>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="row">
                                @foreach ($totals as $item)
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                                        <div class="card overflow-hidden">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ $item['title'] }}</h3>
                                                <div class="card-options"> <a class="btn btn-sm btn-primary"
                                                        href="{{ $item['links'] }}">View</a> </div>
                                            </div>
                                            <div class="card-body ">
                                                <h5 class="">Total {{ $item['title'] }}</h5>
                                                <h2 class="text-dark  mt-0 ">{{ $item['total'] }}</h2>
                                                <div class="progress progress-sm mt-0 mb-2">
                                                    <div class="progress-bar bg-primary w-{{ $item['total'] }}"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <style>
                                    .profile-completeness .progress {
                                        background: none;
                                        margin: 0 auto;
                                        box-shadow: none;
                                        width: 150px;
                                        height: 150px;
                                        line-height: 150px;
                                        position: relative;
                                    }

                                    .profile-completeness .progress:after {
                                        content: "";
                                        border-radius: 50%;
                                        border: 15px solid #f2f5f5;
                                        position: absolute;
                                        width: 100%;
                                        height: 100%;
                                        top: 0;
                                        left: 0;
                                    }

                                    .profile-completeness .progress>span {
                                        position: absolute;
                                        top: 0;
                                        z-index: 1;
                                        width: 50%;
                                        height: 100%;
                                        overflow: hidden;
                                    }

                                    .profile-completeness .progress .progress-left {
                                        left: 0;
                                    }

                                    .profile-completeness .progress .progress-bar {
                                        border-width: 15px;
                                        border-style: solid;
                                        position: absolute;
                                        width: 100%;
                                        height: 100%;
                                        background: none;
                                        top: 0;
                                    }

                                    .profile-completeness .progress .progress-left .progress-bar {
                                        left: 100%;
                                        border-top-right-radius: 80px;
                                        border-bottom-right-radius: 80px;
                                        border-left: 0;
                                        -webkit-transform-origin: center left;
                                        transform-origin: center left;
                                    }

                                    .profile-completeness .progress .progress-right {
                                        right: 0;
                                    }

                                    .profile-completeness .progress .progress-right .progress-bar {
                                        left: -100%;
                                        -webkit-transform-origin: center right;
                                        transform-origin: center right;
                                        border-top-left-radius: 80px;
                                        border-bottom-left-radius: 80px;
                                        border-right: 0;
                                        animation: loading-1 1.8s linear forwards;
                                    }

                                    .profile-completeness .progress .progress-value {
                                        font-size: 24px;
                                        color: #26abfd;
                                        text-align: center;
                                        width: 100%;
                                        height: 100%;
                                        position: absolute;
                                    }


                                    @keyframes loading-1 {
                                        0% {
                                            -webkit-transform: rotate(0deg);
                                            transform: rotate(0deg);
                                        }

                                        100% {
                                            -webkit-transform: rotate(180deg);
                                            transform: rotate(180deg);
                                        }
                                    }

                                    @keyframes loading-2 {
                                        0% {
                                            -webkit-transform: rotate(0deg);
                                            transform: rotate(0deg);
                                        }

                                        100% {
                                            -webkit-transform: rotate(144deg);
                                            transform: rotate(144deg);
                                        }
                                    }

                                    @keyframes loading-3 {
                                        0% {
                                            -webkit-transform: rotate(0deg);
                                            transform: rotate(0deg);
                                        }

                                        100% {
                                            -webkit-transform: rotate(90deg);
                                            transform: rotate(90deg);
                                        }
                                    }

                                    @keyframes loading-4 {
                                        0% {
                                            -webkit-transform: rotate(0deg);
                                            transform: rotate(0deg);
                                        }

                                        100% {
                                            -webkit-transform: rotate(36deg);
                                            transform: rotate(36deg);
                                        }
                                    }

                                    @keyframes loading-5 {
                                        0% {
                                            -webkit-transform: rotate(0deg);
                                            transform: rotate(0deg);
                                        }

                                        100% {
                                            -webkit-transform: rotate(126deg);
                                            transform: rotate(126deg);
                                        }
                                    }

                                    .profile-completeness .progress.blue .progress-bar {
                                        border-color: #26abfd;
                                    }

                                    .profile-completeness .progress.blue .progress-left .progress-bar {
                                        animation: loading-2 1.5s linear forwards 1.8s;
                                    }

                                </style>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="profile-completeness">
                                            <h5 class="text-center mb-3 font-weight-bold">Profile Completion</h5>
                                            <div class="progress blue">
                                                <span class="progress-left">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <div class="progress-value">{{ $employe->calculateProfileCompletion() }}%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
