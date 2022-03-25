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
                                                <p class="h2 text-center">{{ $profile_data['totalcount'] }}
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
                                <div class="col-md-6">
                                    <div class="row">
                                        <h3 class="card-title" style="width: 100%;">Saved Jobs</h3>

                                    </div>
                                </div>
                                <div class="col-md-6 my-auto">
                                    <div class="row float-right">
                                        <a href="{{ route('candidate.savedjob.saveJobLists') }}">View all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="item2-gl">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-11">
                                                @foreach ($saved_jobs as $item)
                                                    <div class="card overflow-hidden  shadow-none">
                                                        <div class="d-md-flex">
                                                            <div class="p-0 m-0 item-card9-img">
                                                                <div class="item-card9-imgs">
                                                                    <a href="job/{{ $item->job->id }}"></a>
                                                                    @if ($item->feature_image_url)
                                                                        <img src="{{ asset($item->feature_image_url) }}"
                                                                            alt="img" class="h-100">
                                                                    @else
                                                                        <img src="{{ asset('uploads/defaultimage.jpg') }}"
                                                                            alt="img" class="h-100">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                                <div class="card-body pt-0 pt-md-5">
                                                                    <div class="item-card9">
                                                                        <a href="/job/{{ $item->job->id }}"
                                                                            class="text-dark">
                                                                            <h4 class="font-weight-semibold mt-1">
                                                                                {{ $item->job->title }}({{ $item->job->num_of_positions }})
                                                                            </h4>
                                                                        </a>
                                                                        <div class="mt-2 mb-2">
                                                                            @if ($item->job != null && $item->job->company != null)
                                                                                <a href="/company-view/{{ $item->job->company->id }}"
                                                                                    class="mr-4"><span><i
                                                                                            class="fa fa-building-o text-muted mr-1"></i>
                                                                                        {{ $item->job->company->company_name }}</span></a>
                                                                            @endif
                                                                        </div>
                                                                        <div class="mt-2 mb-2">
                                                                            <a class="mr-4">
                                                                                <span>
                                                                                    @if ($item->job != null && $item->job->country != null)
                                                                                        <img class="mb-1"
                                                                                            src="{{ asset('https://flagcdn.com/16x12/' . strtolower($item->job->country->iso2) . '.png') }}"
                                                                                            alt="">
                                                                                        {{ $item->job->country->name }}
                                                                                    @endif
                                                                                </span>
                                                                            </a>
                                                                            <a class="mr-4">
                                                                                <span>
                                                                                    Basic Salary:
                                                                                    <span style="color: blue">
                                                                                        {{ $item->job != null && $item->job->country != null ? $item->job->country->currency : '' }}&nbsp;{{ $item->job != null ? $item->job->country_salary : '' }}&nbsp;&nbsp;
                                                                                        @if ($item->job->country && $item->job->country->currency != 'NPR')
                                                                                            NPR:
                                                                                            {{ $item->job->nepali_salary ?? '' }}
                                                                                        @endif

                                                                                    </span>
                                                                                </span>
                                                                            </a>
                                                                            <a class="mr-4">
                                                                                <span>
                                                                                    Post On:
                                                                                    @if ($item->job != null)
                                                                                        {{ $item->job->publish_date != null ? date('j M Y', strtotime($item->job->publish_date)) : '' }}
                                                                                    @endif
                                                                                </span>
                                                                            </a>
                                                                            <a class="mr-4">
                                                                                <span>
                                                                                    Apply Before:
                                                                                    @if ($item->job != null)
                                                                                        {{ $item->job->expiry_date != null ? date('j M Y', strtotime($item->job->expiry_date)) : '' }}
                                                                                    @endif
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer pt-3 pb-3">
                                                                    <div class="item-card9-footer">
                                                                        <div class="row">
                                                                            @auth
                                                                                @if (auth()->user()->user_type == 'candidate')
                                                                                    @php
                                                                                        $application = \DB::table('job_applications')
                                                                                            ->where('job_id', $item->job->id)
                                                                                            ->where('employ_id', $employe->id)
                                                                                            ->first();
                                                                                        
                                                                                    @endphp

                                                                                    <div class="col-md-3">
                                                                                        @if ($application)
                                                                                            <a href="javascript:void(0);"
                                                                                                class="btn btn-primary mr-5">Applied</a>
                                                                                        @else
                                                                                            <a href="/apply-job/{{ $item->job->id }}"
                                                                                                class="btn btn-primary mr-5">
                                                                                                Apply
                                                                                                Now</a>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="javascript:void(0);"
                                                                                            class="saveJobButton ico-font">
                                                                                            <i class="fa fa-heart"></i> Saved
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="#" class="ico-font">
                                                                                            <i
                                                                                                class="fa fa-share-alt"></i>&nbsp;Share
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="/job/{{ $item->job->id }}"
                                                                                            class="ico-font">
                                                                                            <i
                                                                                                class="fa fa-eye"></i>&nbsp;View
                                                                                            Details
                                                                                        </a>
                                                                                    </div>
                                                                                @elseif(auth()->user()->user_type == 'company')
                                                                                    <div class="col-md-3">
                                                                                        <a href="#" class="ico-font">
                                                                                            <i
                                                                                                class="fa fa-share-alt"></i>&nbsp;Share
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="/job/{{ $item->job->id }}"
                                                                                            class="ico-font">
                                                                                            <i
                                                                                                class="fa fa-eye"></i>&nbsp;View
                                                                                            Details
                                                                                        </a>
                                                                                    </div>
                                                                                @endif
                                                                            @else
                                                                                <div class="col-md-3">
                                                                                    <a href="/apply-job/{{ $item->job->id }}"
                                                                                        class="btn btn-primary mr-3"> Apply
                                                                                        Now</a>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="#" class="ico-font">
                                                                                        <i
                                                                                            class="fa fa-share-alt"></i>&nbsp;Share
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="/job/{{ $item->job->id }}"
                                                                                        class="ico-font">
                                                                                        <i
                                                                                            class="fa fa-eye"></i>&nbsp;View
                                                                                        Details
                                                                                    </a>
                                                                                </div>

                                                                            @endauth
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <h3 class="card-title">Countries</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row float-right">
                                                <a href="#" class="float-right">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($Countries as $country)
                                                <div class="col-md-6">
                                                    <div class="row {{ $loop->iteration % 2 == 0 ? 'ml-auto' : '' }}">
                                                        <div class="card card-aside">
                                                            <div class="card-body" style="padding: 1rem 1rem;">
                                                                <div class="card-item d-flex">
                                                                    <img src="{{ 'https://ipdata.co/flags/' . strtolower($country->iso2) . '.png' }}"
                                                                        alt="img" class="w-8 h-8">
                                                                    <div class="ml-5 my-auto">
                                                                        <h6 class="font-weight-bold">
                                                                            {{ $country->name }}&nbsp;({{ $country->jobs_count }})
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row ml-1">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <h3 class="card-title text-red">Latest News Update</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row float-right">
                                                <a href="#" class="float-right">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($news as $nitem)
                                            <a href="">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="news-title">
                                                                <h3>{{ $nitem->title }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row float-right">
                                                            <p class="">{{ parseDate($nitem->created_at) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="desc ml-2">
                                                        <p>{!! mb_strimwidth(html_entity_decode($nitem->html_content), 0, 100, '..') !!}</p>
                                                    </div>
                                                </div>
                                            </a>
                                            @if ($loop->first)
                                                <hr style="margin-top: 0rem !important; margin-bottom: 1rem !important;">
                                            @endif
                                        @endforeach
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
