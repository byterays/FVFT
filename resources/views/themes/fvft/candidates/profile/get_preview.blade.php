@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title') Preview @stop
@section('content')
    <style>
        .widgets-cards .wrp.icon-circle {
            width: 60px !important;
            height: 60px !important;
        }

    </style>
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg"
            style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">{{ __('My Profile') }}</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }} </a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">{{ __('My Profile') }}</li>
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
                                @include('partial/candidates/step')
                            </div>
                        </div>
                        <h3 class="mt-5 ml-3">{{ __('Preview') }}</h3>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-inline-flex">
                                        <img src="{{ asset($employ->avatar ?? 'uploads/default.jpg') }}"
                                            style="width: 100px;" alt="">
                                        <h3 class="mt-6 ml-5 text-center">{{ $employ->full_name }}</h3>
                                    </div>
                                    <div class="widgets-cards">
                                        <div class="d-flex">
                                            <div class="widgets-cards-icons">
                                                <div class="wrp icon-circle bg-success">
                                                    <span
                                                        class="text-white" style="padding: 8px 5px 5px 8px;">{{ $employ->calculateProfileCompletion() }}
                                                        %</span>
                                                </div>
                                            </div>

                                        </div>
                                        <p class="mt-3 white">{{ __('Profile Completeness') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">{{ __('Personal Information') }}</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Name') }}&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->full_name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Gender') }}&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->gender }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Marital Status') }}&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->marital_status }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Date of Birth') }}&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ date('Y F d', strtotime($employ->dob)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Height') }}&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->height ? $employ->height . ' ' .__('CM') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Weight') }}&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->weight ? $employ->weight . ' ' .__('KG') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">{{ __('Contact Information') }}</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Mobile Phone') }}&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->mobile_phone }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Email ID') }}&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->user != null ? $employ->user->email : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Address') }}&nbsp;:</label>
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
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">{{ __('Qualification') }}</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Education') }}&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $employ->education_level != null ? $employ->education_level->title : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">{{ __('Training') }}&nbsp;:</label>
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
                                                    <label for="" class="form-label">{{ __('Skills') }}&nbsp;:</label>
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
                                                    <label for="" class="form-label">{{ __('Languages') }}&nbsp;:</label>
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
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">{{ __('Experience') }}</h4>
                                        @if ($employ->experience != null)
                                            @foreach ($employ->experience as $eexperience)
                                                <h6 class="form-label">{{ __('Experience') }} {{ $loop->iteration }}</h6>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">{{ __('Country') }}&nbsp;:</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $eexperience->country != null ? $eexperience->country->name : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">{{ __('Job Category') }}&nbsp;:</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $eexperience->job_category != null ? $eexperience->job_category->functional_area : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">{{ __('Job Title') }}&nbsp;:</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $eexperience->job != null ? $eexperience->job->title : '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">{{ __('Working Duration') }}&nbsp;:</label>
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
                        <div class="card">
                            <div class="card-body mx-auto">
                                <div class="mx-auto">
                                    <span>{{ __('Experience') }}</span> &nbsp;&nbsp;&nbsp;<a
                                        href="{{ route('candidate.profile.get_experience') }}"
                                        class="btn btn-primary rounded-0"><i class="fa fa-arrow-left"></i>{{ __('Back') }} </a>
                                    <a href="{{ route('candidate.profile.get_save') }}" class="btn btn-primary ml-3 rounded-0">{{ __('Save') }}</a>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
