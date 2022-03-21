@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title') My Jobs @stop
@section('content')
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
                            </div>
                        </div>
                        <h3 class="mt-5 ml-3">My Profile</h3>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="d-inline-flex justify-content-between">
                                    <img src="{{ asset($employ->avatar ?? 'uploads/default.jpg') }}" style="width: 100px;"
                                        alt="">
                                    <h3 class="mt-6 ml-5 text-center">{{ $employ->full_name }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">Personal Information</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Name&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->full_name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Gender&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->gender }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Marital Status&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->marital_status }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Date or Birth&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ date('Y F d', strtotime($employ->dob)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Height&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->height ? $employ->height . ' CM' : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Weight&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->weight ? $employ->weight . ' KG' : '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">Contact Information</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Mobile Phone&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->mobile_phone }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Email ID&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->user != null ? $employ->user->email : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Address&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->state != null ? $employ->state->name : '' }}
                                                    {{ $employ->country != null ? ', ' . $employ->country->name : '' }}
                                                    {{ $employ->city != null ? ', ' . $employ->city->name : '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">Qualification</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Education&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->education_level != null ? $employ->education_level->title : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Training&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @if (json_decode($employ->trainings != null))
                                                        @foreach (json_decode($employ->trainings) as $etraining)
                                                            <span>{{ $loop->iteration }}.&nbsp;</span>{{ App\Models\Training::where('id', $etraining)->value('title') ?? '' }}
                                                            <br>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Skills&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @if ($employ->employeeSkills != null)
                                                        @foreach ($employ->employeeSkills as $eskill)
                                                            @if ($eskill->skill != null)
                                                                <span>{{ $loop->iteration }}.&nbsp;</span>{{ $eskill->skill != null ? $eskill->skill->title : '' }}
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Languages&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @if ($employ->employeeLanguage != null)
                                                        @foreach ($employ->employeeLanguage as $elanguage)
                                                            @if ($elanguage->language != null)
                                                                <span>{{ $loop->iteration }}.&nbsp;</span>{{ $elanguage->language != null ? $elanguage->language->lang : '' }}
                                                                : {{ $elanguage->language_level }} <br>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">Experience</h4>
                                        @if ($employ->experience != null)
                                        @foreach($employ->experience as $eexperience)
                                        <h6 class="form-label">Experience {{ $loop->iteration }}</h6>
                                            <div class="form-group">
                                               <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="" class="form-label">Country&nbsp;:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        {{ $eexperience->country != null ? $eexperience->country->name : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                               <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="" class="form-label">Job Category&nbsp;:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        {{ $eexperience->job_category != null ? $eexperience->job_category->functional_area : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                               <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="" class="form-label">Job Title&nbsp;:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        {{ $eexperience->job != null ? $eexperience->job->title : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                               <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="" class="form-label">Working Duration&nbsp;:</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        {{ $eexperience['working_year'] }}
                                                        {{ $eexperience['working_month'] }}
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif
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