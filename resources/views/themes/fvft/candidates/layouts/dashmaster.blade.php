@extends('themes.fvft.layouts.master')
{{-- @dd($countries) --}}
@section('main')
        @include('themes.fvft.site.components.header')
		@yield('content')
		@include('themes.fvft.site.components.footer')
@endsection