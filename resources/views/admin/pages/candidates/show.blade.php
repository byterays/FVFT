@extends('admin.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
@endsection
@section('main')
    <style>
        .req {
            color: #ff382b !important;
        }

        #profilePicture .dropify-wrapper {
            height: 120px !important;
            width: 50% !important;
            max-width: 50% !important;
        }

        .personal_information p,
        .passport_detail p,
        .education_detail p,
        .training_detail p,
        .skill_detail p,
        .preferred_job_detail p,
        .language_detail p {
            line-height: 0.5
        }

        ..experience_detail p {
            line-height: 0.9
        }

        .tempcolor {
            color: #1650e2;
            font-weight: bold;
        }

    </style>
    {{-- {{ dd($employ->first_name) }} --}}
    <div class="page-header">
        <h4 class="page-title tempcolor">Profile:&nbsp;{{ $employ->full_name }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item tempcolor active" aria-current="page">
                <a href="{{ route('admin.candidates.editCandidate', $employ->id) }}" class=""><i
                        class="fa fa-pencil"></i>&nbsp;Edit Profile</a>
            </li>
        </ol>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card m-b-20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="personal_information_div">
                                <h4>{{ strtoupper('Personal Information') }}</h4>
                                <div class="mt-5 personal_information">
                                    <p>Name: <span>{{ $employ->full_name }}</span></p>
                                    <p>Gender: <span>{{ $employ->gender }}</span></p>
                                    <p>Marital Status: <span>{{ $employ->marital_status }}</span></p>
                                    <p>Date of Birth: <span>{{ date('Y F d', strtotime($employ->dob)) }}</span></p>
                                    <p>Height: <span>{{ $employ->height ? $employ->height . ' CM' : '' }}</span></p>
                                    <p>Weight: <span>{{ $employ->weight ? $employ->weight . ' KG' : '' }}</span></p>
                                </div>
                            </div>
                            <div class="passport_detail_div mt-5">
                                <h4>{{ strtoupper('Passport Details') }}</h4>
                                <div class="mt-5 passport_detail">
                                    <p>Passport Number: <span>{{ $employ->passport_number }}</span></p>
                                    <p>Passport Expiry Date:
                                        <span>{{ date('Y F d', strtotime($employ->passport_expiry_date)) }}</span>
                                    </p>
                                </div>
                            </div>
                            @if (json_decode($employ->experiences, true) != null)
                                <div class="experience_div mt-5">
                                    <h4>{{ strtoupper('Experience') }}</h4>

                                    <div class="mt-5 experience_detail">
                                        @foreach (json_decode($employ->experiences, true) as $employ_experience)
                                            <?php
                                            $job_title = DB::table('jobs')
                                                ->where('id', $employ_experience['job_title_id'])
                                                ->first()->title;
                                            $job_category = DB::table('job_categories')
                                                ->where('id', $employ_experience['job_category_id'])
                                                ->first()->functional_area;
                                            $country_name = DB::table('countries')
                                                ->where('id', $employ_experience['country_id'])
                                                ->first()->name;
                                            ?>
                                            <p>{{ $loop->iteration }}.&nbsp;<span>{{ $job_title }},
                                                    {{ $employ_experience['working_year'] }}
                                                    {{ $employ_experience['working_year'] > 1 ? 'Years' : 'Year' }}
                                                    {{ $employ_experience['working_month'] }}
                                                    {{ $employ_experience['working_month'] > 1 ? 'Months' : 'Month' }},
                                                    {{ $job_category }}, {{ $country_name }}</span></p>
                                        @endforeach
                                    </div>

                                </div>
                            @endif

                            @if ($employ->education_level_id != null)
                                <div class="education_div mt-5">
                                    <h4>{{ strtoupper('Education') }}</h4>
                                    <div class="mt-3 education_detail">
                                        <p>{{ DB::table('educationlevels')->where('id', $employ->education_level_id)->first()->title }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                            @if (json_decode($employ->trainings) != null)
                                <div class="training_div mt-5">
                                    <h4>{{ strtoupper('Training') }}</h4>
                                    <div class="mt-3 training_detail">
                                        @foreach (json_decode($employ->trainings) as $etraining)
                                            <p>{{ $loop->iteration }}.&nbsp;<span>{{ App\Models\Training::where('id', $etraining)->first()->title }}</span>
                                            </p>
                                        @endforeach

                                    </div>
                                </div>
                            @endif
                            @if (json_decode($employ->skills) != null)
                                <div class="skill_div mt-5">
                                    <h4>{{ strtoupper('Skills') }}</h4>
                                    <div class="mt-3 skill_detail">
                                        @foreach (json_decode($employ->skills) as $eskill)
                                            <p>{{ $loop->iteration }}.&nbsp;<span>{{ DB::table('skills')->where('id', $eskill)->first()->title }}</span>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if (count(json_decode($employ->languages, true)) > 0)
                                <div class="language_div mt-5">
                                    <h4>{{ strtoupper('Language') }}</h4>
                                    <div class="mt-3 language_detail">
                                        @foreach (json_decode($employ->languages, true) as $elanguage)
                                            <p>{{ $loop->iteration }}.&nbsp;{{ DB::table('languages')->where('id', $elanguage['language_id'])->first()->lang }}:&nbsp;<span>{{ $elanguage['language_level'] }}</span>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            {{-- <div class="preferred_job_div mt-5">
                                <h4>{{ strtoupper('Preferred Jobs') }}</h4>
                                <div class="mt-3 preferred_job_detail">
                                    <p>1.&nbsp;English:&nbsp;<span>Good</span></p>
                                    <p>2.&nbsp;Hindi:&nbsp;<span>Very Good</span></p>
                                    <p>2.&nbsp;Malay:&nbsp;<span>Good</span></p>
                                    <p>2.&nbsp;Chinese:&nbsp;<span>Fair</span></p>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-md-4">
                            <div class="image">
                                @php
                                    $avatar = $employ->avatar != null ? $employ->avatar : 'uploads/default.jpg';
                                @endphp
                                <img src="{{ asset($avatar) }}" style="object-fit: cover" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        @if (count(json_decode($employ->full_picture, true)) > 0)
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <div class="row">
                            @foreach (json_decode($employ->full_picture, true) as $efullpicture)
                                <div class="col-md-6 mt-5">
                                    <div class="image">
                                        <img src="{{ asset($efullpicture) }}" style="object-fit: cover" alt="">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('script')
@endsection
