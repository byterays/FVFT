@extends('themes.fvft.company.layouts.dashmaster')
@section('jobs') active @endsection
@section('content')
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg" style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
        <div class="header-text mb-0">
            <div class="text-center text-white">
                <h1 class="">My Jobs</h1>
                <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="#">Company</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">My Jobs</li>
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
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">My Jobs</h3>
                    </div>
                    <div class="card-body">
                        <div class="ads-tabs">
                            <div class="tabs-menus">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li class="active"><a href="#tab1" class="active" data-toggle="tab">All Jobs</a></li>
                                    <li class=""><a href="#tab2" class="" data-toggle="tab">Active Jobs</a></li>
                                    <li class=""><a href="#tab3" class="" data-toggle="tab">InActive Jobs</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane table-responsive border-top userprof-tab active" id="tab1">
                                    @include('themes.fvft.company.components.jobs.joblist',['items'=>$all_jobs,'action'=>'All Jobs'])
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab " id="tab2">
                                    @include('themes.fvft.company.components.jobs.joblist',['items'=>$active_jobs,'action'=>'Active Jobs'])
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab" id="tab3">
                                    @include('themes.fvft.company.components.jobs.joblist',['items'=>$inactive_jobs,'action'=>'InActive Jobs'])
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
