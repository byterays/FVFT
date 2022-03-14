@extends('themes.fvft.layouts.master')
@section('title')
    Job
@endsection
@section('style')
    <!-- jquery ui RangeSlider -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/jquery-uislider/jquery-ui.css" rel="stylesheet">
@endsection
@section('main')
    @include('themes.fvft.site.components.header')

    @php
    if (checkUserType('candidate')) {
        $employ_id = App\Models\Employe::where('user_id', \Auth::user()->id)->first()->id;
        // dd($employ_id);
    } else {
        $employ_id = '';
    }
    @endphp
    <!--Breadcrumb-->
    <div class="bg-white border-bottom">
        <div class="container">
            <div class="page-header">
                <h4 class="page-title">Jobs list </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jobs list</li>
                </ol>
            </div>
        </div>
    </div>
    <!--/Breadcrumb-->

    <!--Job listing-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                @include('themes.fvft.site.components.jobs.sidebar')
                <div class="col-xl-9 col-lg-8 col-md-12">
                    <!--Job lists-->
                    <div class=" mb-lg-0">
                        <div class="">
                            <div class="item2-gl">
                                <div class=" mb-0">
                                    <div class="">
                                        <div class="p-5 bg-white item2-gl-nav d-flex">
                                            <h6 class="mb-0 mt-3">Showing @if ($jobs->count() > 1)
                                                    <b>1 to {{ $jobs->count() }}
                                                    @else
                                                        {{ $jobs->count() }}
                                                @endif
                                                </b> of {{ $jobs->total() }} Entries</h6>
                                            <ul class="nav item2-gl-menu mt-1 ml-auto">
                                                <li class=""><a href="#tab-11" class="active show"
                                                        data-toggle="tab" title="List style"><i
                                                            class="fa fa-list"></i></a></li>
                                                <li><a href="#tab-12" data-toggle="tab" class=""
                                                        title="Grid"><i class="fa fa-th"></i></a></li>
                                            </ul>
                                            {{-- <div class="d-flex">
													<label class="mr-2 mt-2 mb-sm-1">Sort By:</label>
													<select name="item" class="form-control select2-no-search w-70">
														<option value="1">Relavant</option>
														<option value="2">Newest First</option>
														<option value="3">Highest Paid</option>
														<option value="4">Lowest Paid</option>
														<option value="5">High Ratings</option>
														<option value="6">Popular</option>
													</select>
												</div> --}}
                                        </div>
                                    </div>
                                </div>
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
                                                            <img src="{{ asset('/') }}{{ $item->feature_image_url ?? 'uploads/defaultimage.jpg' }}"
                                                                alt="img" class="h-100">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                        <div class="card-body pt-0 pt-md-5">
                                                            <div class="item-card9">
                                                                <a href="/job/{{ $item->id }}" class="text-dark">
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
                                                                                {{ $cntry->currency }}&nbsp;{{ $item->country_salary }}&nbsp;&nbsp;
                                                                                @if ($cntry->currency != 'NPR')
                                                                                    NPR: {{ $item->nepali_salary }}
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
                                                                                        class="btn btn-primary mr-5">Applied</a>
                                                                                @else
                                                                                    <a href="/apply-job/{{ $item->id }}"
                                                                                        class="btn btn-primary mr-5"> Apply
                                                                                        Now</a>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                @if ($savedJob->exists())
                                                                                    <a href="javascript:void(0);"
                                                                                        class="saveJobButton ico-font">
                                                                                        <i class="fa fa-heart"></i> Saved
                                                                                    </a>
                                                                                @else
                                                                                    <a href="javascript:void(0);"
                                                                                        onclick="savejob({{ $item->id }})"
                                                                                        class="saveJobButton ico-font">
                                                                                        <i class="fa fa-heart-o"></i> Save Job
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <a href="#" class="ico-font">
                                                                                    <i class="fa fa-share-alt"></i>&nbsp;Share
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <a href="/job/{{ $item->id }}"
                                                                                    class="ico-font">
                                                                                    <i class="fa fa-eye"></i>&nbsp;View
                                                                                    Details
                                                                                </a>
                                                                            </div>
                                                                        @elseif(auth()->user()->user_type == 'company')
                                                                            <div class="col-md-3">
                                                                                <a href="#" class="ico-font">
                                                                                    <i class="fa fa-share-alt"></i>&nbsp;Share
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <a href="/job/{{ $item->id }}"
                                                                                    class="ico-font">
                                                                                    <i class="fa fa-eye"></i>&nbsp;View
                                                                                    Details
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <div class="col-md-3">
                                                                            <a href="/apply-job/{{ $item->id }}"
                                                                                class="btn btn-primary mr-3"> Apply Now</a>
                                                                        </div>
                                                                        {{-- <div class="col-md-3">
                                                                            <a href="javascript:void(0);"
                                                                                onclick="savejob({{ $item->id }})"
                                                                                class="saveJobButton ico-font">
                                                                                <i class="fa fa-heart-o"></i> Save Job
                                                                            </a>
                                                                        </div> --}}
                                                                        <div class="col-md-3">
                                                                            <a href="#" class="ico-font">
                                                                                <i class="fa fa-share-alt"></i>&nbsp;Share
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <a href="/job/{{ $item->id }}"
                                                                                class="ico-font">
                                                                                <i class="fa fa-eye"></i>&nbsp;View
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
                                    <div class="tab-pane " id="tab-12">
                                        <div class="row">
                                            @foreach ($jobs as $item)
                                                @php
                                                    $company = DB::table('companies')->find($item->company_id);
                                                    $cntry = App\Models\Country::where('id', $item->country_id)->first();
                                                @endphp
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
                                                    <div class="card overflow-hidden">
                                                        <div class="item-card9-img border-bottom">
                                                            <div class="item-card9-imgs">
                                                                <a href="{{ route('viewJob', $item->id) }}"></a>
                                                                <img src="{{ asset('/') }}{{ $item->feature_image_url ?? 'uploads/defaultimage.jpg' }}"
                                                                    alt="img" class="h-100">
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="item-card9">
                                                                <a href="{{ route('viewJob', $item->id) }}"
                                                                    class="text-dark mt-2">
                                                                    <h4 class="font-weight-semibold mt-1 mb-2">
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
                                                                </div>
                                                                <div class="mt-2 mb-2">
                                                                    <a class="mr-4">
                                                                        <span>
                                                                            Basic Salary:
                                                                            <span style="color: blue">
                                                                                {{ $cntry->currency }}&nbsp;{{ $item->country_salary }}&nbsp;&nbsp;
                                                                                @if ($cntry->currency != 'NPR')
                                                                                    NPR: {{ $item->nepali_salary }}
                                                                                @endif

                                                                            </span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="mt-2 mb-2">
                                                                    <a class="mr-4">
                                                                        <span>
                                                                            Post On:
                                                                            {{ $item->publish_date != null ? date('j M Y', strtotime($item->publish_date)) : '' }}
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="mt-2 mb-2">

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
                                                                            <div class="col-md-6">
                                                                                @if ($savedJob->exists())
                                                                                    <a href="javascript:void(0);"
                                                                                        class="saveJobButton ico-grid-font">
                                                                                        <i class="fa fa-heart"></i> Saved
                                                                                    </a>
                                                                                @else
                                                                                    <a href="javascript:void(0);"
                                                                                        onclick="savejob({{ $item->id }})"
                                                                                        class="saveJobButton ico-grid-font">
                                                                                        <i class="fa fa-heart-o"></i> Save Job
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <a href="#" class="ico-grid-font">
                                                                                    <i class="fa fa-share-alt"></i>&nbsp;Share
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                @if ($application)
                                                                                    <a href="javascript:void(0);"
                                                                                        class="btn btn-primary mr-5">Applied</a>
                                                                                @else
                                                                                    <a href="/apply-job/{{ $item->id }}"
                                                                                        class="btn btn-primary mr-5"> Apply
                                                                                        Now</a>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-6 mt-3">
                                                                                <a href="/job/{{ $item->id }}"
                                                                                    class="ico-grid-font">
                                                                                    <i class="fa fa-eye"></i>&nbsp;View
                                                                                    Details
                                                                                </a>
                                                                            </div>
                                                                        @elseif(auth()->user()->user_type == 'company')
                                                                            <div class="col-md-6">
                                                                                <a href="#" class="ico-grid-font">
                                                                                    <i class="fa fa-share-alt"></i>&nbsp;Share
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <a href="/job/{{ $item->id }}"
                                                                                    class="ico-grid-font">
                                                                                    <i class="fa fa-eye"></i>&nbsp;View
                                                                                    Details
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <div class="col-md-6">
                                                                            <a href="#" class="ico-grid-font">
                                                                                <i class="fa fa-share-alt"></i>&nbsp;Share
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <a href="/apply-job/{{ $item->id }}"
                                                                                class="btn btn-primary mr-3"> Apply Now</a>
                                                                        </div>
                                                                        <div class="col-md-6 mt-3">
                                                                            <a href="/job/{{ $item->id }}"
                                                                                class="ico-grid-font">
                                                                                <i class="fa fa-eye"></i>&nbsp;View
                                                                                Details
                                                                            </a>
                                                                        </div>
                                                                        

                                                                    @endauth

                                                                </div>
                                                                {{-- <div class="btn-block">
                                                                    @auth
                                                                        @if (auth()->user()->user_type == 'candidate')
                                                                            @php
                                                                                $application = \DB::table('job_applications')
                                                                                    ->where('job_id', $item->id)
                                                                                    ->where('employ_id', $employ->id)
                                                                                    ->first();
                                                                                $savedJob = App\Models\SavedJob::where('employ_id', $employ->id)->where('job_id', $item->id);
                                                                            @endphp
                                                                            @if ($application)
                                                                                <div class="ml-auto">
                                                                                   <a href="javascript:void(0);"
                                                                                        class="btn btn-primary mr-3">
                                                                                        Applied</a>
                                                                                </div>
                                                                            @else
                                                                                <div class="ml-auto">
                                                                                    <a href="/apply-job/{{ $item->id }}"
                                                                                        class="btn btn-primary mr-3"> Apply
                                                                                        Now</a>
                                                                                    @if ($savedJob->exists())
                                                                                        <a href="javascript:void(0);"
                                                                                            class="btn btn-primary saveJobButton">
                                                                                            Saved</a>
                                                                                    @else
                                                                                        <a href="javascript:void(0);"
                                                                                            onclick="savejob({{ $item->id }})"
                                                                                            class="btn btn-primary saveJobButton">
                                                                                            Save Job</a>
                                                                                    @endif
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <a href="/job/{{ $item->id }}"
                                                                                class="btn btn-block btn-primary">View</a>
                                                                        @endif
                                                                    @else
                                                                        <div class="ml-auto">
                                                                            <a href="/apply-job/{{ $item->id }}"
                                                                                class="btn btn-primary mr-3"> Apply Now</a>
                                                                        </div>
                                                                    @endauth
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="center-block text-center">
                                {{ $jobs->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    <!--/Job lists-->
                </div>
            </div>
        </div>
    </section>
    <!--/Job Listings-->
    @include('themes.fvft.site.components.footer')
@endsection
@section('script')
    <script src="{{ env('APP_URL') }}js/location.js"></script>
    <script>
        const _token = $('meta[name="csrf-token"]')[0].content;
        const state_id = {{ isset($candidate->state_id) ? $candidate->state_id : '3871' }};
        const city_id = {{ isset($candidate->city_id) ? $candidate->city_id : 'null' }};
        const appurl = "{{ env('APP_URL') }}";
    </script>

    <script>
        function savejob(job_id) {
            var url = "{{ route('candidate.savedjob.saveJob') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'job_id': job_id,
                    'employ_id': '{{ $employ_id }}',
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
    </script>
@endsection
