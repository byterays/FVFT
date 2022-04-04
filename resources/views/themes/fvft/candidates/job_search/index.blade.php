@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title') Job Search @stop
@section('content')
    <style>
        .tabs-menu1 .nav {
            flex-wrap: nowrap;
            padding-left: 15px;
        }

        .tabs-menu1 li a:not(:active) {
            background-color: #868e96;
            border-color: #868e96;
            color: #171a1d;
        }

        .tabs-menu1 li a:focus {
            background-color: #868e96;
            border-color: #868e96;
            color: #171a1d;
        }

        .tabs-menu1 li a.active {
            background-color: #2861b1;
            border-color: #2861b1;
            color: #fff;
        }

        .input-icons i {
            position: absolute;
        }

        .input-icons input {
            text-indent: 20px;
        }

        .icon {
            padding: 10px;
            min-width: 40px;
            z-index: 99999
        }

    </style>
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg"
            style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">{{ __('My Jobs') }}</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }} </a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Setting') }}</li>
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
                    <div class="row">
                        <div class="card mb-2">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Job Search') }}</h3>
                            </div>
                        </div>
                    </div>
                    @include('partial.candidates.job_search.tabs')
                    @if(!request()->has('is_active') && !request()->is_active == 'about')
                    <div class="row">
                        <div class="mb-lg-0">
                            <div class="">
                                <div class="item2-gl">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-11">
                                            @foreach ($jobs as $item)
                                                @php
                                                    $company = DB::table('companies')->find($item->company_id);
                                                    $cntry = App\Models\Country::where('id', $item->country_id)->first();
                                                @endphp
                                                <div class="card overflow-hidden  shadow-none">
                                                    <div class="d-md-flex">
                                                        <div class="p-0 m-0 item-card9-img">
                                                            <div class="item-card9-imgs">
                                                                <a href="job/{{ $item->id }}"></a>
                                                                @if ($item->feature_image_url)
                                                                    <img src="{{ asset($item->feature_image_url) }}"
                                                                        alt="img" class="h-100">
                                                                @else
                                                                    <img src="{{ asset('images/defaultimage.jpg') }}"
                                                                        alt="img" class="h-100">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                            <div class="card-body pt-0 pt-md-5">
                                                                <div class="item-card9">
                                                                    <a href="/job/{{ $item->id }}"
                                                                        class="text-dark">
                                                                        <h4 class="font-weight-semibold mt-1">
                                                                            {{ $item->title }}({{ $item->num_of_positions }})
                                                                        </h4>
                                                                    </a>
                                                                    <div class="mt-2 mb-2">
                                                                        @isset($company)
                                                                            <a href="/company-view/{{ $company->id }}"
                                                                                class="mr-4"><span><i
                                                                                        class="fa fa-building-o text-muted mr-1"></i>
                                                                                    {{ $company->company_name }}</span></a>
                                                                        @endisset
                                                                    </div>
                                                                    <div class="mt-2 mb-2">
                                                                        <a class="mr-4">
                                                                            <span>
                                                                                @php
                                                                                    $country_flag = @DB::table('countries')->find($item->country_id)->iso2;
                                                                                @endphp
                                                                                {{-- <i class="fa fa-map-marker text-muted mr-1"></i> --}}
                                                                                <img class="mb-1"
                                                                                    src="{{ asset('https://flagcdn.com/16x12/' . strtolower($country_flag) . '.png') }}"
                                                                                    alt="">
                                                                                {{ @DB::table('countries')->find($item->country_id)->name }}
                                                                            </span>
                                                                        </a>
                                                                        <a class="mr-4">
                                                                            <span>
                                                                                Basic Salary:
                                                                                <span style="color: blue">
                                                                                    {{ $cntry->currency ?? '' }}&nbsp;{{ $item->country_salary ?? '' }}&nbsp;&nbsp;
                                                                                    @if ($cntry and $cntry->currency != 'NPR')
                                                                                        NPR:
                                                                                        {{ $item->nepali_salary ?? '' }}
                                                                                    @endif

                                                                                </span>
                                                                            </span>
                                                                        </a>
                                                                        <a class="mr-4">
                                                                            <span>
                                                                                Post On:
                                                                                {{ $item->publish_date != null ? date('j M Y', strtotime($item->publish_date)) : '' }}
                                                                            </span>
                                                                        </a>
                                                                        <a class="mr-4">
                                                                            <span>
                                                                                Apply Before:
                                                                                {{ $item->expiry_date != null ? date('j M Y', strtotime($item->expiry_date)) : '' }}
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
                                                                                        ->where('job_id', $item->id)
                                                                                        ->where('employ_id', $employ->id)
                                                                                        ->first();
                                                                                    $savedJob = App\Models\SavedJob::where('employ_id', $employ->id)->where('job_id', $item->id);
                                                                                @endphp

                                                                                <div class="col-md-3">
                                                                                    @if ($application)
                                                                                        <a href="javascript:void(0);"
                                                                                            class="btn btn-primary mr-5">{{ __('Applied') }}</a>
                                                                                    @else
                                                                                        <a href="/apply-job/{{ $item->id }}"
                                                                                            class="btn btn-primary mr-5"> {{ __('Apply Now') }}</a>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    @if ($savedJob->exists())
                                                                                        <a href="javascript:void(0);"
                                                                                            class="saveJobButton ico-font">
                                                                                            <i class="fa fa-heart"></i> {{ __('Saved') }}
                                                                                        </a>
                                                                                    @else
                                                                                        <a href="javascript:void(0);"
                                                                                            onclick="savejob({{ $item->id }})"
                                                                                            class="saveJobButton ico-font">
                                                                                            <i class="fa fa-heart-o"></i> {{ __('Save Job') }}
                                                                                        </a>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="#" class="ico-font">
                                                                                        <i
                                                                                            class="fa fa-share-alt"></i>&nbsp;{{ __('Share') }}
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="/job/{{ $item->id }}"
                                                                                        class="ico-font">
                                                                                        <i class="fa fa-eye"></i>&nbsp;{{ __('View Details') }}
                                                                                    </a>
                                                                                </div>
                                                                            @elseif(auth()->user()->user_type == 'company')
                                                                                <div class="col-md-3">
                                                                                    <a href="#" class="ico-font">
                                                                                        <i
                                                                                            class="fa fa-share-alt"></i>&nbsp;{{ __('Share') }}
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="/job/{{ $item->id }}"
                                                                                        class="ico-font">
                                                                                        <i class="fa fa-eye"></i>&nbsp;{{ __('View Details') }}
                                                                                    </a>
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <div class="col-md-3">
                                                                                <a href="/apply-job/{{ $item->id }}"
                                                                                    class="btn btn-primary mr-3"> {{ __('Apply Now') }}</a>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <a href="#" class="ico-font">
                                                                                    <i class="fa fa-share-alt"></i>&nbsp;{{ __('Share') }}
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <a href="/job/{{ $item->id }}"
                                                                                    class="ico-font">
                                                                                    <i class="fa fa-eye"></i>&nbsp;{{ __('View Details') }}
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
                                <div class="center-block text-center">
                                    {{ $jobs->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ env('APP_URL') }}js/location.js"></script>
    <script>
        function savejob(job_id) {
            var url = "{{ route('candidate.savedjob.saveJob') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'job_id': job_id,
                    'employ_id': '{{ $employ->id }}',
                },
                beforeSend: function() {
                    $(".saveJobButton").attr('disabled', true);
                },
                success: function(response) {
                    if (response.db_error) {
                        toastr.warning(response.db_error);
                    } else if (response.error) {
                        toastr.warning(response.error);
                    } else if (response.redirectRoute) {
                        location.href = response.redirectRoute
                    } else {
                        toastr.success(response.msg);
                    }
                },
                complete: function() {
                    $(".saveJobButton").attr('disabled', false);
                },
            });
        }

        function follow_company(company_id, employ_id){
            $.ajax({
                type: "POST",
                url: "{{ route('candidate.follow_company') }}",
                data: {'company_id': company_id, 'employ_id': employ_id},
                beforeSend: function(){
                    $("#follow").text('Wait Submitting...')
                }, 
                success: function(data){
                    if(data.db_error){
                        toastr.warning(data.db_error)
                    } else if(data.alreadyFollowed==true){
                        toastr.info(data.msg);
                        $("#follow").text('Following');
                    } else if(data.alreadyFollowed == false){
                        toastr.success(data.msg);
                        $("#follow").text('Following');
                    }
                },
            });
        }
    </script>
@endsection
