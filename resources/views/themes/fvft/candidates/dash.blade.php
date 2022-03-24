@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title', 'My Dashboard')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/progress.css') }}">
    <style>
        .progress-lg {
            height: 1.75rem;
        }

        .progress-lg .progress-bar {
            height: 1.75rem;
        }

        .progress {
            font-size: 1rem;
        }

        .profileRow .feature .icons {
            font-size: 2em;
            position: relative;
            display: inline-block;
            width: 3em;
            height: 2em;
            line-height: 3em;
            vertical-align: middle;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

    </style>
@endsection
@section('content')
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg"
            style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">My Dashboard</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">My Dashboard </a></li>
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
                        <div class="card-body">
                            <h3 class="card-title">Profile Status</h3>
                            <div class="row">
                                <div
                                    class="col-md-{{ $employe->calculateProfileCompletion() < 100 ? '9' : '12' }} my-auto">
                                    <div class="progress progress-lg">
                                        <div class="progress-bar bg-green w-{{ $employe->calculateProfileCompletion() }}"
                                            style="color: #fff !important;">{{ $employe->calculateProfileCompletion() }}%
                                            Complete</div>
                                    </div>
                                </div>
                                @if ($employe->calculateProfileCompletion() < 100)
                                    <div class="col-md-3 my-auto">
                                        <a href="#" class="btn btn-md btn-primary">Complete your Profile</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="row row-cards">
                            @foreach ($application_datas as $a_data)
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <a href="{{ $a_data['link'] }}">
                                        <div class="card">
                                            <div class="card-body p-4 text-center feature">
                                                <div
                                                    class="fa-stack fa-lg fa-1x icons shadow-default bg-primary-transparent">
                                                    <i class="icon icon-people text-primary"></i>
                                                </div>
                                                <p class="card-text mt-3 mb-3">{{ $a_data['title'] }}</p>
                                                <p class="h2 text-center text-primary">{{ $a_data['totalcount'] }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="row row-cards">
                            @foreach ($profile_datas as $profile_data)
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <a href="{{ $profile_data['link'] }}">
                                        <div class="card bg-blue profileRow">
                                            <div class="card-body p-4 text-center feature">
                                                <div
                                                    class="fa-stack fa-lg fa-1x icons shadow-default bg-primary-transparent">
                                                    <i class="{{ $profile_data['icon'] }}"></i>
                                                </div>
                                                <p class="card-text mt-3 mb-3">{{ $profile_data['title'] }}</p>
                                                <p class="h2 text-center text-primary">{{ $profile_data['totalcount'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mb-0">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="card-title" style="width: 100%;">Saved Jobs</h3>
                                        
                                    </div>
                                    <div class="col-md-6 my-auto float-right">
                                        <a href="#" class="float-right">View all</a>
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
