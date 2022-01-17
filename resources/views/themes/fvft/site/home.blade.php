@extends('themes.fvft.layouts.master')
{{-- @dd($countries) --}}
@section('main')
        @include('themes.fvft.site.components.header')
		@include('themes.fvft.site.components.hero')
		@include('themes.fvft.site.components.recentjobs_scroll')
		{{-- @include('themes.fvft.site.components.job_categories') --}}
		{{-- @include('themes.fvft.site.components.recentjobs') --}}
		@include('themes.fvft.site.components.topcompeny')
		@include('themes.fvft.site.components.news')
		@include('themes.fvft.site.components.actions')
		@include('themes.fvft.site.components.footer')
@endsection
@section('script')
<script src="{{env('APP_URL')}}js/location.js"></script>
<script>
    const _token=$('meta[name="csrf-token"]')[0].content;
    const state_id={{isset($candidate->state_id)?$candidate->state_id:"3871" }};
    const city_id={{isset($candidate->city_id)?$candidate->city_id:"null" }};
    const appurl="{{env('APP_URL')}}";
</script>
@endsection