@extends('themes.fvft.company.layouts.dashmaster')
@section('title', 'Applicants')
@section('applicants', 'active')
@section('data')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Applicants Management') }}</h3>
        </div>

        <div id="app">
            <applicants></applicants>
        </div>
    </div>
@endsection

@section('js')
    @include('themes/fvft/company/newapplicant/script')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
