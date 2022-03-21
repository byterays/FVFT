@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title') My Jobs @stop
@section('content')
<style>
    .icon-service {
        width: 100px !important;
        height: 100px !important;
    }
</style>
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg"
            style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">My Jobs</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">My Profile</li>
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
                                <h3 class="font-weight-bold">{{ strtoupper('Profile') }}</h3>
                                <div id="basicwizard" class="border pt-0">
                                    @include('partial/candidates/tabs')
                                </div>
                                @include('partial/candidates/step')
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 mx-auto mt-5">
                                    <div class="card">
                                        <div class="card-body bg-primary">
                                            <div class="service-card text-center">
                                                <div class="icon-bg icon-service text-white" style="background-color: #adabb3;">
                                                    <span class="" style="color: #0e0d0d; font-size: 18px">{{ $employ->calculateProfileCompletion() }} %</span>
                                                </div>
                                                <div class="servic-data text-white mt-3">
                                                    <h4 class="font-weight-semibold mb-2">Profile Completion</h4>
                                                    @if($employ->calculateProfileCompletion() < 100)
                                                    <p class="text-muted text-white">Complete your profile to 100% to increase the chance of getting shortlisted for the right job!</p>
                                                    @else
                                                    <p class="text-muted text-white">Congratulation your profile is 100% complete. You have more chance of getting shortlisted for the right job!</p>
                                                    @endif
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
