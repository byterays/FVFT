@extends('themes.fvft.layouts.master')
{{-- @dd($countries) --}}
@section('main')
        @include('themes.fvft.site.components.header')
		@include('themes.fvft.site.components.hero')
		@include('themes.fvft.site.components.job_categories')
		@include('themes.fvft.site.components.recentjobs')
		@include('themes.fvft.site.components.topcompeny')
		@include('themes.fvft.site.components.news')
		@include('themes.fvft.site.components.actions')
		@include('themes.fvft.site.components.footer')
@endsection