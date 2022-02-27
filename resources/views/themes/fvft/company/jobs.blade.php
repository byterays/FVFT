@extends('themes.fvft.company.layouts.dashmaster')
@section('content')
    <div class="card-header">
        {{-- <h3 class="card-title">My Jobs</h3> --}}
        <div class="col-md-6">
            <h3 class="">My Jobs</h3>
        </div>
        @if($company->is_active == 1)
        <div class="col-md-6 mr-auto">
            <a href="{{ route('company.addNewJob') }}" class="btn btn-success">Add New Job</a>
        </div>
        @endif
    </div>
    <div class="card-body">
        <div class="ads-tabs">
            <div class="tabs-menus">
                <!-- Tabs -->
                <ul class="nav panel-tabs">
                    <li class=""><a href="#tab1" class="active" data-toggle="tab">All Jobs</a></li>
                    <li><a href="#tab2" data-toggle="tab" class="">Approved</a></li>
                    <li><a href="#tab3" data-toggle="tab" class="">Not Approved</a></li>
                    <li><a href="#tab4" data-toggle="tab" class="">Published</a></li>
                    <li><a href="#tab5" data-toggle="tab" class="">Expired</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane table-responsive border-top userprof-tab active" id="tab1">
                    @include('themes.fvft.company.components.jobs.joblist',['items'=>$all_jobs,'action'=>'All
                    Jobs'])
                </div>
                <div class="tab-pane table-responsive border-top userprof-tab" id="tab2">
                    @include('themes.fvft.company.components.jobs.joblist',['items'=>$approved_jobs,'action'=>'Approved
                    '])
                </div>
                <div class="tab-pane table-responsive border-top userprof-tab" id="tab3">
                    @include('themes.fvft.company.components.jobs.joblist',['items'=>$unapproved_jobs,'action'=>'Not Approved
                    Jobs'])
                </div>
                <div class="tab-pane table-responsive border-top userprof-tab " id="tab4">
                    @include('themes.fvft.company.components.jobs.joblist',['items'=>$published_jobs,'action'=>'Published
                    Jobs'])
                </div>
                <div class="tab-pane table-responsive border-top userprof-tab " id="tab5">
                    @include('themes.fvft.company.components.jobs.joblist',['items'=>$expired_jobs,'action'=>'Expired
                    Jobs'])
                </div>
            </div>
        </div>
    </div>
@endsection
