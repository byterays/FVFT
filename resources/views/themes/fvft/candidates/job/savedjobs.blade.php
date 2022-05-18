@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title', 'Saved Jobs')
@section('style')
    <!-- file Uploads -->
    <link href="/themes/fvft/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
@endsection

@section('content')
    <style>
        .form-control {
            color: #272626 !important;
        }

    </style>
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg"
            style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">{{ __('Saved Jobs') }}</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }} </a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Saved Jobs') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="sptb">
        <div class="container">
            <div class="row ">
                <div class="col-xl-3 col-lg-12 col-md-12">
                    @include('themes.fvft.candidates.components.sidebar')
                </div>
                <div class="col-xl-9 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="card mb-2">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Saved Jobs') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-lg-0 w-100">
                            <div class="item2-gl">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-11">
                                        @foreach ($saved_jobs as $item)
                                            @if (!blank(data_get($item, 'job')))
                                                <div class="card overflow-hidden  shadow-none">
                                                    <div class="d-md-flex">
                                                        <div class="p-0 m-0 item-card9-img">
                                                            <div class="item-card9-imgs">
                                                                <a href="{{ route('viewJob', $item->job_id) }}"></a>
                                                                @if ($item->job->feature_image_url)
                                                                    <img src="{{ asset($item->job->feature_image_url) }}"
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
                                                                    <a href="{{ route('viewJob', $item->job_id) }}"
                                                                        class="text-dark">
                                                                        <h4 class="font-weight-semibold mt-1">
                                                                            {{ data_get($item, 'job.title') }}({{ data_get($item, 'job.num_of_positions') }})
                                                                        </h4>
                                                                    </a>
                                                                    <div class="mt-2 mb-2">
                                                                        @if (!blank(data_get($item, 'job.company.company_name')))
                                                                            <a href="{{ route('site.companydetail', data_get($item, 'job.company.id')) }}"
                                                                                class="mr-4"><span><i
                                                                                        class="fa fa-building-o text-muted mr-1"></i>
                                                                                    {{ data_get($item, 'job.company.company_name') }}</span></a>
                                                                        @endif
                                                                    </div>
                                                                    <div class="mt-2 mb-2">
                                                                        <a class="mr-4">
                                                                            <span>
                                                                                @if (!blank(data_get($item, 'job.country')))
                                                                                    <img class="mb-1"
                                                                                        src="{{ asset('https://flagcdn.com/16x12/' . strtolower(data_get($item, 'job.country.iso2')) . '.png') }}"
                                                                                        alt="">
                                                                                    {{ data_get($item, 'job.country.name') }}
                                                                                @endif
                                                                            </span>
                                                                        </a>
                                                                        <a class="mr-4">
                                                                            <span>
                                                                                Basic Salary:
                                                                                <span style="color: blue">
                                                                                    @if (!blank(data_get($item, 'job.country')))
                                                                                        {{ data_get($item, 'job.country.currency') ?? '' }}&nbsp;{{ data_get($item,'job.country_salary') ?? '' }}&nbsp;&nbsp;
                                                                                    @endif
                                                                                    @if (!blank(data_get($item, 'job.country')) and data_get($item, 'job.country.currency') != 'NPR')
                                                                                        NPR:
                                                                                        {{ data_get($item,'job.nepali_salary') ?? '' }}
                                                                                    @endif

                                                                                </span>
                                                                            </span>
                                                                        </a>
                                                                        <a class="mr-4">
                                                                            <span>
                                                                                Post On:
                                                                                {{ data_get($item,'job.publish_date') != null ? date('j M Y', strtotime(data_get($item,'job.publish_date'))) : '' }}
                                                                            </span>
                                                                        </a>
                                                                        <a class="mr-4">
                                                                            <span>
                                                                                Apply Before:
                                                                                {{ data_get($item,'job.expiry_date') != null ? date('j M Y', strtotime(data_get($item,'job.expiry_date'))) : '' }}
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
                                                                                        ->where('job_id', $item->job_id)
                                                                                        ->where('employ_id', $employ->id)
                                                                                        ->first();
                                                                                    $savedJob = App\Models\SavedJob::where('employ_id', $employ->id)->where('job_id', $item->job_id);
                                                                                @endphp

                                                                                <div class="col-md-3">
                                                                                    @if ($application)
                                                                                        <a href="javascript:void(0);"
                                                                                            class="btn btn-primary mr-5 btn-block">{{ __('Applied') }}</a>
                                                                                    @else
                                                                                        <a href="{{ route('applyForJob', $item->job_id) }}"
                                                                                            class="btn btn-primary mr-5 btn-block">
                                                                                            {{ __('Apply Now') }}</a>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    @if ($savedJob->exists())
                                                                                        <a href="javascript:void(0);"
                                                                                            class="saveJobButton btn btn-warning btn-block">
                                                                                            <i class="fa fa-heart"></i>
                                                                                            {{ __('Saved') }}
                                                                                        </a>
                                                                                    @else
                                                                                        <a href="javascript:void(0);"
                                                                                            onclick="savejob({{ $item->job_id }}, $(this))"
                                                                                            class="saveJobButton btn btn-warning btn-block">
                                                                                            <i class="fa fa-heart-o"></i>
                                                                                            {{ __('Save Job') }}
                                                                                        </a>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="{{ route('viewJob', $item->job_id) }}"
                                                                                        class="btn btn-success btn-block"
                                                                                        target="_blank">
                                                                                        <i
                                                                                            class="fa fa-eye"></i>&nbsp;{{ __('View Details') }}
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sharethis-inline-share-buttons"
                                                                                        data-url="{{ route('viewJob', $item->job_id) }}">
                                                                                    </div>
                                                                                </div>
                                                                            @elseif(auth()->user()->user_type == 'company')
                                                                                <div class="col-md-3">
                                                                                    <a href="{{ route('viewJob', $item->job_id) }}"
                                                                                        class="btn btn-success btn-block"
                                                                                        target="_blank">
                                                                                        <i
                                                                                            class="fa fa-eye"></i>&nbsp;{{ __('View Details') }}
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="sharethis-inline-share-buttons"
                                                                                        data-url="{{ route('viewJob', $item->job_id) }}">
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <div class="col-md-3">
                                                                                <a href="{{ route('applyForJob', $item->job_id) }}"
                                                                                    class="btn btn-primary mr-3 btn-block">
                                                                                    {{ __('Apply Now') }}</a>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <a href="{{ route('viewJob', $item->job_id) }}"
                                                                                    class="btn btn-success btn-block"
                                                                                    target="_blank">
                                                                                    <i
                                                                                        class="fa fa-eye"></i>&nbsp;{{ __('View Details') }}
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="sharethis-inline-share-buttons"
                                                                                    data-url="{{ route('viewJob', $item->job_id) }}">
                                                                                </div>
                                                                            </div>

                                                                        @endauth
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="center-block text-center">
                                {{ $saved_jobs->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Delete Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white font-weight-bold">
                    <h5 class="modal-title" id="deleteModalLabel">{{ __('Delete Saved Job') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you sure, you want to delete this saved job?') }}</p>
                    <form action="#" method="POSt" id="deleteForm">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gray" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-secondary" id="deleteJob">{{ __('Delete') }}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End Delete Modal --}}
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#deleteModal").on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var jobId = $(button).data("id");
                var action = "{{ route('candidate.savedjob.delete', ':id') }}";
                action = action.replace(':id', jobId);
                $("#deleteForm").attr("action", action);
            });

            $("#deleteJob").on('click', function(e) {
                e.preventDefault();
                $("#deleteForm").submit();
            });

            $("#deleteModal").on("hide.bs.modal", function() {
                $("#deleteForm").attr("action", "#");
            });
        });
    </script>
@endsection
