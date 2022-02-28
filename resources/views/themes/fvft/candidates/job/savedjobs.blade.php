@extends('themes.fvft.candidates.layouts.dashmaster')
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
                    <h1 class="">Profile</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Profile</li>
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
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Saved Jobs</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Job Position</th>
                                        <th>Company</th>
                                        <th>Apply Before</th>
                                        <th>Detail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($saved_jobs as $item)
                                        <tr>
                                            <td>
                                                {{ $item->job->exists() ? $item->job->title : '' }}
                                            </td>
                                            <td>
                                                {{ $item->job->exists() && $item->job->company->exists() ? $item->job->company->company_name : '' }}
                                            </td>

                                            <td>
                                                @php
                                                    $deadline = $item->job->exists() ? $item->job->expiry_date : '';

                                                @endphp
                                                {{ $deadline != '' ? date('Y-m-d', strtotime($deadline)) : '----' }}
                                                
                                            </td>
                                            <td>
                                                <a href="" class="">View Details</a>
                                            </td>
                                            <td>
            
                                                <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip"
                                                    data-original-title="Delete"
                                                    href="{{ route('candidate.savedjob.delete', $item->id) }}"><i
                                                        class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {{ $saved_jobs->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
