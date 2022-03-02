@extends('themes.fvft.company.layouts.dashmaster')
@section('css')
    <link href="{{ asset('/') }}themes/fvft/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
    <style>
        .form-control {
            color: #272626 !important;
        }

    </style>
    <style>
        .ql-editor {
            height: 100%;
        }

        .req {
            color: red;
        }

        .tempcolor {
            color: #1650e2;
            font-weight: bold;
        }

    </style>
@endsection
@section('title') Profile @endsection
@section('edit_profile') active @endsection
@section('content')
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg" style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">Profile</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="{{ route('company.dash') }}">Company</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12 col-md-12">
                    @include('themes.fvft.company.components.sidebar')
                </div>
                <div class="col-xl-9 col-lg-12 col-md-12">
                    <form action="{{ route('company.update_profile', $company->id) }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('partial/companies/companyEdit')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset("/")}}themes/fvft/assets/plugins/fileuploads/js/dropify.js"></script>
    <script src="/themes/fvft/assets/plugins/fileuploads/js/dropfy-custom.js"></script>
    <script src="{{env('APP_URL')}}js/location.js"></script>
    <script>
        const _token=$('meta[name="csrf-token"]')[0].content;
        const state_id={{isset($company->state_id)?$company->state_id:"null" }};
        const city_id={{isset($company->city_id)?$company->city_id:"null" }};
        const appurl="{{env('APP_URL')}}";
    </script>
@endsection
