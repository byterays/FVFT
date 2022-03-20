@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title') My Jobs @stop
@section('style')
    <!-- file Uploads -->
    <link href="/themes/fvft/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
@endsection
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
                    <form action="{{ route('candidate.profile.post_contact_information') }}" method="POST"
                        id="candidateForm">
                        @csrf
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
                            <h3 class="mt-5 ml-3">Contact Information</h3>
                            <div class="card mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="user_id"
                                                    value="{{ setParameter($employ, 'user_id') }}">
                                                <label for="">Mobile Number&nbsp;<span
                                                        class="req">*</span></label>
                                                <div class="d-inline-flex">
                                                    <input type="text" name="mobile_number1"
                                                        value="{{ setParameter($employ, 'mobile_phone') }}" class="form-control"
                                                        placeholder="Enter Mobile Number 1">
                                                    <input type="text" name="mobile_number2"
                                                        value="{{ setParameter($employ,'mobile_phone2') }}" class="form-control ml-3"
                                                        placeholder="Enter Mobile Number 2">
                                                </div>
                                                <div class="require text-danger mobile_number1"></div>
                                                <div class="require text-danger mobile_number2"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Email ID</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ setParameter($employ->user, 'email') }}" placeholder="Enter Email ID"
                                                    readonly>
                                                <div class="require text-danger email"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Address</label>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <select name="state_id" class="form-control select2-show-search"
                                                            id="states" data-placeholder="Select State"
                                                            onchange="patchGetDistricts(this)"
                                                            value="{{ setParameter($employ,'state_id') }}">
                                                            <option value="">Select State</option>
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->id }}"
                                                                    {{ $state->id == setParameter($employ,'state_id') ? 'selected' : '' }}>
                                                                    {{ $state->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <select name="district_id" class="form-control select2-show-search"
                                                            id="districts" value="{{ setParameter($employ,'district_id') }}"
                                                            data-placeholder="Select District">
                                                            <option value="">Select District</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <input type="text" name="municipality"
                                                            value="{{ setParameter($employ,'municipality') }}" class="form-control"
                                                            placeholder="Municipality">
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <input type="text" name="ward" class="form-control"
                                                            value="{{ setParameter($employ,'ward') }}" placeholder="Ward">
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <input type="text" name="city_street"
                                                            value="{{ setParameter($employ, 'city_street') }}" class="form-control"
                                                            placeholder="City/Street/Tole/Town/Village">
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <input type="text" name="address_line"
                                                            value="{{ setParameter($employ,'address') }}" class="form-control"
                                                            placeholder="Address Line">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body mx-auto">
                                    <div class="mx-auto">
                                       <span>Personal
                                            Information</span>  &nbsp;&nbsp;&nbsp;<a href="{{ route('candidate.profile.get_personal_information') }}"
                                            class="btn btn-primary rounded-0"><i
                                            class="fa fa-arrow-left"></i>Back </a>
                                        <button type="button" onclick="submitForm(event);"
                                            class="btn btn-primary ml-3 rounded-0">Next <i
                                                class="fa fa-arrow-right"></i></button>&nbsp;&nbsp;&nbsp;<span>Contact
                                            Information</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ env('APP_URL') }}js/location.js"></script>

    <script>
        $(document).ready(function(){
            getDistricts($("#states").val());
        });
        function submitForm(e) {
            e.preventDefault();
            $('.require').css('display', 'none');
            let url = $("#candidateForm").attr('action');
            var data = new FormData($("#candidateForm")[0]);
            $.ajax({
                url: url,
                type: 'post',
                // _method: 'put',
                // data: data,
                data: new FormData($("#candidateForm")[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response.db_error) {
                        $(".alert-secondary").css('display', 'block');
                        $(".db_error").html(response.db_error);
                        toastr.warning(response.db_error);
                    } else if (response.errors) {
                        var error_html = "";
                        $.each(response.errors, function(key, value) {
                            error_html = '<div>' + value + '</div>';
                            $('.' + key).css('display', 'block').html(error_html);
                        });
                    } else if (!response.errors && !response.db_error) {
                        location.href = response.redirectRoute;
                    }
                }
            });
        }
    </script>
    <script>
        const _token = $('meta[name="csrf-token"]')[0].content;
        const state_id = {{ isset($employ->state_id) ? $employ->state_id : '3871' }};
        const city_id = {{ isset($employ->city_id) ? $employ->city_id : 'null' }};
        const district_id = {{ isset($employ->district_id) ? $employ->district_id : 'null' }};
        const appurl = "{{ env('APP_URL') }}";
    </script>
@endsection
