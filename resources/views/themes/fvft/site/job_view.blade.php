@extends('themes.fvft.layouts.master')
@section('title', 'Job Detail')
@section('style')
    <!-- jquery ui RangeSlider -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/jquery-uislider/jquery-ui.css" rel="stylesheet">
@endsection
@section('main')
    @include('themes.fvft.site.components.header')
    @php
    $country = App\Models\Country::where('id', $job->country_id);
    if ($country->exists()) {
        $country = $country->first();
    } else {
        $country = null;
    }
    @endphp
    <style>
        .hr hr {
            margin-top: 1rem !important;
            margin-bottom: 1rem !important;
        }

    </style>
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <!--Jobs Description-->
                    <div class="card overflow-hidden">
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col">
                                    <div class="profile-pic mb-0">
                                        <div class="d-md-flex">
                                            <img src="{{ asset('/') }}{{ $job->feature_image_url != null ? $job->feature_image_url : 'images/defaultimage.jpg' }}"
                                                class="w-20 h-20" alt="user">
                                            <div class="ml-4">
                                                <a href="/job/{{ $job->id }}" class="text-dark">
                                                    <h4 class="mt-3 mb-1 fs-20 font-weight-bold">{{ $job->title }}</h4>
                                                </a>
                                                <div class="">
                                                    <ul class="mb-0 d-flex">
                                                        <li class="mr-3"><a href="#" class="icons"><i
                                                                    class="fa fa-building-o text-muted mr-1"></i>
                                                                {{ isset($company) ? $company->company_name : '' }}</a>
                                                        </li>
                                                    </ul>
                                                    <ul class="mb-0 mt-2 d-flex">
                                                        <li class="mr-3">
                                                            <a href="#" class="icons">
                                                                <img src="{{ asset($country != null ? 'https://flagcdn.com/16x12/' . strtolower($country->iso2) . '.png' : '') }}"
                                                                    class="mb-1" alt="">
                                                                {{ $country != null ? $country->name : '' }}
                                                            </a>
                                                        </li>
                                                        <li class="mr-3">
                                                            <a href="#" class="icons">
                                                                Basic Salary: <span class="blue">
                                                                    {{ $country->currency }}&nbsp;{{ $job->country_salary }}&nbsp;&nbsp;
                                                                    @if ($country->currency != 'NPR')
                                                                        NPR: {{ $job->nepali_salary }}
                                                                    @endif
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="mr-3">
                                                            <a href="#" class="icons">
                                                                Post On:
                                                                {{ $job->publish_date != null ? date('j M Y', strtotime($job->publish_date)) : '' }}
                                                            </a>
                                                        </li>
                                                        <li class="mr-3">
                                                            <a href="#" class="icons">
                                                                Apply Before:
                                                                {{ $job->expiry_date != null ? date('j M Y', strtotime($job->expiry_date)) : '' }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="hr">
                                                    <hr>
                                                </div>
                                                <div class="icons">
                                                    <div class="row">
                                                        @auth
                                                            @if (auth()->user()->user_type == 'candidate')
                                                                @php
                                                                    $application = \DB::table('job_applications')
                                                                        ->where('job_id', $job->id)
                                                                        ->where('employ_id', $employ->id)
                                                                        ->first();
                                                                    $savedJob = App\Models\SavedJob::where('employ_id', $employ->id)->where('job_id', $job->id);
                                                                @endphp

                                                                <div class="col-md-3">
                                                                    @if ($application)
                                                                        <a href="javascript:void(0);"
                                                                            class="btn btn-primary mr-5">Applied</a>
                                                                    @else
                                                                        <a href="/apply-job/{{ $job->id }}"
                                                                            class="btn btn-primary mr-5"> Apply
                                                                            Now</a>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-3">
                                                                    @if ($savedJob->exists())
                                                                        <a href="javascript:void(0);"
                                                                            class="saveJobButton ico-grid-font">
                                                                            <i class="fa fa-heart"></i> Saved
                                                                        </a>
                                                                    @else
                                                                        <a href="javascript:void(0);"
                                                                            onclick="savejob({{ $job->id }})"
                                                                            class="saveJobButton ico-grid-font">
                                                                            <i class="fa fa-heart-o"></i> Save Job
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="#" class="ico-grid-font">
                                                                        <i class="fa fa-share-alt"></i>&nbsp;Share
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="/job/{{ $job->id }}" class="ico-grid-font">
                                                                        <i class="fa fa-eye"></i>&nbsp;View
                                                                        Details
                                                                    </a>
                                                                </div>
                                                            @elseif(auth()->user()->user_type == 'company')
                                                                <div class="col-md-3">
                                                                    <a href="#" class="ico-grid-font">
                                                                        <i class="fa fa-share-alt"></i>&nbsp;Share
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="/job/{{ $job->id }}" class="ico-grid-font">
                                                                        <i class="fa fa-eye"></i>&nbsp;View
                                                                        Details
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="col-md-3">
                                                                <a href="/apply-job/{{ $job->id }}"
                                                                    class="btn btn-primary mr-3"> Apply Now</a>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <a href="#" class="ico-grid-font">
                                                                    <i class="fa fa-share-alt"></i>&nbsp;Share
                                                                </a>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="/job/{{ $job->id }}" class="ico-grid-font">
                                                                    <i class="fa fa-eye"></i>&nbsp;View
                                                                    Details
                                                                </a>
                                                            </div>

                                                        @endauth

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="card-body border-top">
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">Job Details</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Job Title&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->title }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Required Numbers&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->num_of_positions }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Job Category&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ !empty($job->job_category) || $job->job_category != null ? $job->job_category->functional_area : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Wokring Hours Per
                                                        Day&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->working_hours }}
                                                    {{ $job->working_hours != null ? ($job->working_hours > 1 ? 'Hours' : 'Hour') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Wokring Days Per
                                                        Week&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->working_days }}
                                                    {{ $job->working_days != null ? ($job->working_days > 1 ? 'Days' : 'Day') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Job Posted On&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->publish_date != null ? date('j M Y', strtotime($job->publish_date)) : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Apply Before&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->expiry_date != null ? date('j M Y', strtotime($job->expiry_date)) : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Contract Period&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->contract_year }}
                                                    {{ $job->contract_year != null ? ($job->contract_year > 1 ? 'Years' : 'Year') : '' }}
                                                    {{ $job->contract_month }}
                                                    {{ $job->contract_month != null ? ($job->contract_month > 1 ? 'Months' : 'Month') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Job Description&nbsp;:</label>
                                            {!! html_entity_decode($job->description_intro) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="card-body border-top">
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">Qualification</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Minimum
                                                        Qualification&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->education_level_id != null && (!empty($job->education_level) || $job->education_level != null)? $job->education_level->title: '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Minimum Experience&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->min_experience }}
                                                    {{ $job->min_experience != null ? ($job->min_experience > 1 ? 'Years' : 'Year') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Age Requirement&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    {{ $job->min_age }}
                                                    {{ $job->min_age != null && $job->max_age != null ? '- ' . $job->max_age : '' }}
                                                    {{ $job->min_age != null && $job->max_age != null ? 'Years' : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            @php
                                                $json_skills = json_decode($job->skills, true);
                                                $skills =
                                                    !empty($json_skills) || $json_skills != null
                                                        ? App\Models\Skill::whereIn('id', $json_skills)
                                                            ->pluck('title')
                                                            ->toArray()
                                                        : '';
                                            
                                                // $skills = '<span class="badge badge-success">' . implode('</span> <span class="badge badge-success">', $skills) . '</span>'; //working code(converted to function)
												$skills = $skills != null ? wrapInTag($skills, 'span', 'class="badge badge-success"', ' ') : '';
                                                
                                            @endphp
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Skills&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
													{!! $skills !!}
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Other Requirements&nbsp;:</label>
                                            {!! html_entity_decode($job->requirement_intro) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <h4 class="mb-4 card-title bg-primary text-white p-2">Salary and Facility</h4>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Basic
                                                        Salary&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @php
                                                        $country = App\Models\Country::where('id', $job->country_id);
                                                        if ($country->exists()) {
                                                            $country = $country->first();
                                                        } else {
                                                            $country = null;
                                                        }
                                                    @endphp
                                                    {{ $job->country_id != null && $country != null && $job->country_salary != null? 'Per Month ' . $country->currency . ' ' . $job->country_salary: '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Average
                                                        Earning&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @php
                                                        $country = App\Models\Country::where('id', $job->country_id)->first() ?? null;
                    
                                                    @endphp
                                                    {{ $job->country_id != null && $country != null && $job->earning_country_salary != null? 'Per Month ' . $country->currency . ' ' . $job->earning_country_salary: '' }}
                                                    {{ $job->country_id != null && $country != null && $job->earning_nepali_salary != null? '- '.$country->currency . ' ' . $job->earning_nepali_salary: '' }}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Accomodation&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @php
                                                        $accomodation = $job->accomodation == 1 ? 'Yes' : 'No';
                                                        
                                                    @endphp
                                                    {{ $accomodation == 'Yes' ? $accomodation . ' (As Per Company Rule)' : $accomodation }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Food&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @php
                                                        $food = $job->food == 1 ? 'Yes' : 'No';
                                                        
                                                    @endphp
                                                    {{ $food == 'Yes' ? $food . ' (As Per Company Rule)' : $food }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Annual Vacation&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @php
                                                        $vacation = $job->annual_vacation == 1 ? 'Yes' : 'No';
                                                    @endphp
                                                    {{ $vacation == 'Yes' ? $vacation . ' (As Per Company Rule)' : $vacation }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Over Time&nbsp;:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    @php
                                                        $overtime = $job->overtime == 1 ? 'Yes' : 'No';
                                                    @endphp
                                                    {{ $overtime == 'Yes' ? $overtime . ' (As Per Company Rule)' : $overtime }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Other Benefits&nbsp;:</label>
                                            {!! html_entity_decode($job->benefit_intro) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card-body border-top">
                            <h4 class="mb-4 card-title">Job Description</h4>
                            <div class="mb-4">
                                <p>{!! html_entity_decode($job->description_intro) !!}</p>

                            </div>
                            <h4 class="mb-4 card-title">Job Details</h4>
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <div class="table-responsive">
                                        <table class="table row table-borderless w-100 m-0 text-nowrap ">
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold">Job
                                                            Type</span></td>
                                                    <td><span>:</span></td>
                                                    <td><span>
                                                            {{ @DB::table('job_shifts')->find($item->job_shift_id)->job_shift }}</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold">Min
                                                            Salary</span></td>
                                                    <td><span>:</span></td>
                                                    <td><span> Rs.{{ $job->salary_from }}/-</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold">Max
                                                            Salary</span></td>
                                                    <td><span>:</span></td>
                                                    <td><span> Rs.{{ $job->salary_to }}/-</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold">Uploads
                                                            at</span></td>
                                                    <td><span>:</span></td>
                                                    <td><span>{{ \Carbon\Carbon::parse($job->updated_at)->diffForHumans() }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                                <tr>
                                                    <td class="w-150 px-0"><span class="font-weight-semibold">
                                                            Expired</span></td>
                                                    <td><span>:</span></td>
                                                    <td><span>
                                                            {{ \Carbon\Carbon::parse($job->expiry_date)->diffForHumans() }}</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="w-150 px-0"><span
                                                            class="font-weight-semibold">Location</span></td>
                                                    <td><span>:</span></td>
                                                    <td><span>
                                                            {{ @DB::table('cities')->find($item->city_id)->name . ',' }}
                                                            {{ @DB::table('countries')->find($item->country_id)->name }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-150 px-0"><span
                                                            class="font-weight-semibold">Eligibility</span></td>
                                                    <td><span>:</span></td>
                                                    <td><span>
                                                            {{ @DB::table('educationlevels')->find($job->education_level_id)->title }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-150 px-0"><span
                                                            class="font-weight-semibold">Company</span></td>
                                                    <td><span>:</span></td>
                                                    <td><span> {{ $company->company_name }}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-id">
                                <div class="row">
                                    <div class="col">
                                        <a class="mb-0">Job ID : #{{ $job->id }}</a>
                                    </div>
                                    <div class="col col-auto">
                                        Posted By <a class="mb-0 font-weight-bold">{{ $company->company_name }}</a> /
                                        {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light-50">
                            <div class="icons">
                                @auth
                                    @if (auth()->user()->user_type == 'candidate')
                                        @php
                                            $application = \DB::table('job_applications')
                                                ->where('job_id', $job->id)
                                                ->where('employ_id', $employ->id)
                                                ->first();
                                        @endphp
                                        @if ($application)
                                            <a href="javascript:void(0);" class="btn btn-danger icons mt-1 mb-1">Applied</a>
                                            
                                        @else
                                            <a href="/apply-job/{{ $job->id }}" class="btn btn-info icons"> Apply Now</a>
                                        @endif
                                    @endif
                                @else
                                    <a href="/apply-job/{{ $job->id }}" class="btn btn-info icons"> Apply Now</a>
                                @endauth
                                <a href="#" class="btn btn-primary icons mt-1 mb-1"><i class="si si-share mr-1"></i> Share
                                    Job</a>
                                <a href="#" class="btn btn-info icons mt-1 mb-1"><i class="si si-printer  mr-1"></i>
                                    Print</a>
                                <a href="#" class="btn btn-danger icons mt-1 mb-1" data-toggle="modal"
                                    data-target="#report"><i class="icon icon-exclamation mr-1"></i> Report Abuse</a>
                            </div>
                        </div> --}}
                    </div>
                    <!--Jobs Description-->

                </div>

                <!--Right Side Content-->

                <!--/Right Side Content-->
            </div>
        </div>
    </section>

    @include('themes.fvft.site.components.footer')
@endsection
@section('script')
    <script>
        @if(auth()->check() && auth()->user()->user_type == 'candidate')
        function savejob(job_id) {
            var url = "{{ route('candidate.savedjob.saveJob') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'job_id': job_id,
                    'employ_id': '{{ $employ->id }}',
                },
                beforeSend: function() {
                    $(".saveJobButton").attr('disabled', true);
                },
                success: function(response) {
                    if (response.db_error) {
                        toastr.warning(response.db_error);
                    } else if (response.error) {
                        toastr.warning(response.error);
                    } else if (response.redirectRoute) {
                        location.href = response.redirectRoute
                    } else {
                        toastr.success(response.msg);
                    }
                },
                complete: function() {
                    $(".saveJobButton").attr('disabled', false);
                },
            });
        }
        @endif
    </script>
@endsection
