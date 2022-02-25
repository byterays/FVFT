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
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('company.update_profile', $company->id) }}" method="post" enctype="multipart/form-data" id="companyForm">
                @csrf
                @method('put')
                @include('partial/companies/companyEdit')
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('/') }}themes/fvft/assets/plugins/fileuploads/js/dropify.js"></script>
    <script src="/themes/fvft/assets/plugins/fileuploads/js/dropfy-custom.js"></script>
    {{-- <script src="{{ env('APP_URL') }}js/location.js"></script> --}}
    @include('partial/companies/script')
@endsection
