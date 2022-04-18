@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title') Save Page @stop
@section('content')
<style>
    .icon-service {
        width: 100px !important;
        height: 100px !important;
    }
</style>
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="/uploads/site/banner.png"
            style="background: url(/uploads/site/banner.png) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">{{ __('My CV') }}</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }} </a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">{{ __('My CV') }}</li>
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
                            <div class="card-body">
                                <h3 class="font-weight-bold">{{ strtoupper(__('Profile')) }}</h3>
                                <div id="basicwizard" class="border pt-0">
                                    @include('partial/candidates/tabs')
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 mx-auto mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-center">{{ __('My CV') }}</p>
                                            <div class="card">
                                                <p class="text-center mt-3">{{ __('CV generated from profile') }}</p>
                                                <div class="d-flex mx-auto mb-5 mt-2">
                                                    <a href="{{ route('candidate.profile.downloadGeneratedCV', ['type' => 'preview']) }}" target="_blank" class="btn btn-primary">{{ __('Preview') }}</a>
                                                    <a href="{{ route('candidate.profile.downloadGeneratedCV') }}" class="btn btn-primary ml-5">{{ __('Download') }} <i class="fa fa-download"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
