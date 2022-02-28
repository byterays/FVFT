<style>
    .req {
        color: #ff382b !important;
    }

    #profilePicture .dropify-wrapper {
        height: 120px !important;
        width: 50% !important;
        max-width: 50% !important;
    }

    .company_basic_information p,
    .company_contact_information p,
    .company_contact_person_information p {
        line-height: 0.5
    }

    .tempcolor {
        color: #1650e2;
        font-weight: bold;
    }

</style>
<div class="page-header">
    <h4 class="page-title tempcolor">{{ $company->company_name }}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item tempcolor active" aria-current="page">
            <a href="{{ $editRoute }}" class=""><i class="fa fa-pencil"></i>&nbsp;Edit Profile</a>
        </li>
    </ol>
</div>
@php
$country = DB::table('countries')->where('id', $company->country_id);
$state = DB::table('states')->where('id', $company->state_id);
$city = DB::table('cities')->where('id', $company->city_id);

$flag = $country->exists() ? $country->first()->emojiU : DB::table('countries')->where('name', 'Nepal')->first()->emojiU;
// {{ dd($flag) }}
@endphp
<div class="row">
    <div class="col-xl-6">
        <div class="card m-b-20">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($company->company_logo) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6 justify-content-between">
                        {{-- <img src="{{ asset('https://ipdata.co/flags/np.png') }}" class="img-fluid" alt=""> --}}
                        <img src="{{ 'https://ipdata.co/flags/'.strtolower($country->first()->iso2).'.png' }}" style="height: 100%; width: 100%;" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="introsection">
                            <h4 class="tempcolor mb-5">{{ strtoupper('Introduction') }}</h4>
                            {!! html_entity_decode($company->html_content_intro) !!}
                        </div>
                        <hr>
                        <div class="servicesection">
                            <h4 class="tempcolor mb-5">{{ strtoupper('Services') }}</h4>
                            {!! html_entity_decode($company->html_content_service) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card m-b-20">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset($company->company_cover) }}" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="col-xl-6">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="company_basic_information_div">
                            <h4 class="tempcolor">{{ strtoupper('Company Basic Information') }}</h4>
                            <div class="mt-5 company_basic_information">
                                <p>Company Name: <span>{{ $company->company_name }}</span></p>
                                <p>Industry Category: <span>{{ $company->industry->title }}</span></p>
                                <p>Ownership: <span>{{ $company->ownership }}</span></p>
                                <p>Operating Since:
                                    <span>{{ date('Y', strtotime($company->operating_since)) }}</span></p>
                                <p>Number of Employee: <span>{{ $company->no_of_employee }}</span></p>
                            </div>
                        </div>
                        <div class="company_contact_div mt-5">
                            <h4 class="tempcolor">{{ strtoupper('Company Contact Information') }}</h4>
                            <div class="mt-5 company_contact_information">
                                <p>Country: <span>{{ $country->exists() ? $country->first()->name : '' }}</span></p>
                                <p>State/Province/Region:
                                    <span>{{ $state->exists() ? $state->first()->name : '' }}</span>
                                </p>
                                <p>City:
                                    <span>{{ $city->exists() ? $city->first()->name : '' }}</span>
                                </p>
                                <p>Address:
                                    <span>{{ $company->company_address }}</span>
                                </p>
                                <p>Company Website:
                                    <span>{{ $company->company_website }}</span>
                                </p>
                                <p>Company Facebook Page:
                                    <span>{{ $company->company_fb_page }}</span>
                                </p>
                                <p>Company Phone Number:
                                    <span>{{ $company->dialcode1 . '-' . $company->mobile_phone1 }}</span>
                                </p>
                                <p>Company Email ID:
                                    <span>{{ $company->company_email }}</span>
                                </p>
                            </div>
                        </div>

                        @if (!empty($company->company_contact_person))
                            <div class="company_contact_person_div mt-5">
                                <h4 class="tempcolor">{{ strtoupper('Company Contact Information') }}</h4>
                                <div class="mt-5 company_contact_person_information">
                                    <p>Name: <span>{{ $company->company_contact_person->name }}</span></p>
                                    <p>Designation:
                                        <span>{{ $company->company_contact_person->position }}</span>
                                    </p>
                                    <p>Mobile Number:
                                        <span>{{ $company->company_contact_person->phone }}</span>
                                    </p>
                                    <p>Email:
                                        <span>{{ $company->company_contact_person->email }}</span>
                                    </p>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
