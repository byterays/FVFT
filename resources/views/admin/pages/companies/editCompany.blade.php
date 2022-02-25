@extends('admin.layouts.master')
@section('style')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .ql-editor {
            height: 100%;
        }

        .req {
            color: red;
        }

    </style>
@endsection
@section('main')
    <div class="page-header">
        <h4 class="page-title">{{ strtoupper('Company Profile') }}{{ $action }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Modules</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="/admin/companies/">Company</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>
    <form action="{{ route('admin.companies.udpateCompany', $company->id) }}" id="companyForm" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        {{-- @if (Request::is('candidate/profile'))
                            <div class="col-md-6">
                                <h3>{{ strtoupper('Picture') }}</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ $viewRoute }}" class="btn btn-success mr-auto">View Profile</a>
                            </div>
                        @else --}}
                        <h3 class="card-title">{{ strtoupper('Picture') }}</h3>
                        {{-- @endif --}}


                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group company_logo" id="company_logo">
                                    <label for="">Display Picture</label>
                                    <input type="file" name="company_logo"
                                        data-default-file="{{ $company->company_logo != null && file_exists($company->company_logo)? env('APP_URL') . $company->company_logo: '' }}"
                                        class="dropify" data-allowed-file-extensions="png jpg jpeg"
                                        data-height="180">
                                    <div class="require text-danger profile_picture"></div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group company_logo">
                                    <label for="">Cover Picture</label>
                                    <input type="file" name="company_cover" data-default-file="{{ $company->company_cover }}" class="dropify" data-height="180"
                                        data-allowed-file-extensions="png jpg jpeg">
                                    <div class="require text-danger full_picture"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">{{ strtoupper('Basic Information') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="company_name">Company Name&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{ $company->company_name }}"
                                        id="company_name" name="company_name" placeholder="Enter Company Name">
                                    <div class="require text-danger company_name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="industry_category">Industry Category&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="industry_id" class="form-control select2">
                                        <option value="">Select Industry Category</option>
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}"
                                                {{ $industry->id == $company->industry_id ? 'selected' : '' }}>
                                                {{ $industry->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="require text-danger industry_id"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="ownership">Ownership&nbsp;<span class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="ownership" class="form-control select2">
                                        <option value="">Select Ownership</option>
                                        <option value="Private" {{ $company->ownership == 'Private' ? 'selected' : '' }}>
                                            Private</option>
                                        <option value="Public" {{ $company->ownership == 'Public' ? 'selected' : '' }}>
                                            Public</option>
                                        <option value="Government"
                                            {{ $company->ownership == 'Government' ? 'selected' : '' }}>Government
                                        </option>
                                        <option value="Non Profit"
                                            {{ $company->ownership == 'Non Profit' ? 'selected' : '' }}>Non Profit
                                        </option>
                                    </select>
                                    <div class="require text-danger ownership"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="no_of_employee">Number of Employee&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="no_of_employee" value="{{ $company->no_of_employee }}" class="form-control"
                                        placeholder="eg, 1-50, 51-200">
                                    <div class="require text-danger no_of_employee"></div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Operating Since</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control datepicker"
                                        value="{{ $company->operating_since }}" name="operating_since" readonly id="">
                                    <div class="require text-danger operating_since"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company_introduction">Company Introduction</label>
                            <input type="hidden" class="form-control" name="company_introduction" id="body_id" value="{{ isset($company->company_details) ? $company->company_details : null }}">
                            <input type="hidden" class="form-control" name="html_content_intro" id="html_content_intro" value="{{ isset($company->html_content_intro) ? $company->html_content_intro : null }}">
                            <div id="editor" style="min-height: 15rem;">
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-8">
                                    
                                </div>
                            </div> --}}

                        </div>
                        <div class="form-group">
                            <label for="company_services">Company Services</label>
                            <input type="hidden" class="form-control" name="company_services" id="company_service_id" value="{{ isset($company->company_services) ? $company->company_services : null }}">
                            <input type="hidden" class="form-control" name="html_content_service" id="html_content_service" value="{{ isset($company->html_content_service) ? $company->html_content_service : null }}">
                            <div id="companyServices" style="min-height: 20rem;">
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-8">
                                    
                                </div>
                            </div> --}}

                        </div>


                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-xl-6">


                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">{{ strtoupper('Company Contact Information') }}</h3>

                    </div>
                    <div class="card-body mb-0">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="country" class="form-label">Country</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="country_id" id="select-country" class="form-control select2" value="{{ isset($company->country_id) ? $company->country_id : '' }}" onchange="patchStates(this)">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $company->country_id == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="state" class="form-label">State/Province</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="state_id" id="select-state" class="form-control select2" value="{{ isset($company->state_id) ? $company->state_id : '' }}"
                                        onchange="patchCities(this)">
                                        <option value="">Select State/Province</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="state" class="form-label">City</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="state_id" id="select-city" class="form-control select2"
                                    value="{{ isset($company->city_id) ? $company->city_id : '' }}">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="company_address" value="{{ $company->company_address }}" class="form-control"
                                        placeholder="Enter Company Address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="phn">Company Phone Number</label>
                                </div>
                                <div class="col-md-2">
                                    <select name="dial_code" class="form-control select2">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->phonecode }}"
                                                {{ $company->dialcode1 == $country->phonecode ? 'selected' : '' }}>
                                                {{ $country->phonecode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="mobile_phone1" class="form-control"
                                        placeholder="Enter Phone Number1" value="{{ $company->mobile_phone1 }}">
                                    <input type="text" name="mobile_phone1" class="form-control mt-3"
                                        placeholder="Enter Phone Number2" value="{{ $company->mobile_phone2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="company_email">Company Email ID</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" name="company_email"
                                        placeholder="Enter Company Email ID" value="{{ $company->company_email }}">
                                    <div class="require text-danger company_email"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Company Website</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="company_website" class="form-control"
                                        placeholder="Enter Website" value="{{ $company->company_website }}">
                                    <div class="require text-danger company_website"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Company Facebook Page</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="company_fb_page" class="form-control"
                                        placeholder="Enter Company Facebook Page Link" value="{{ $company->company_fb_page }}">
                                    <div class="require text-danger company_fb_page"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">{{ strtoupper('Contact Person Details') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Full Name&nbsp;<span class="req">*</span></label>
                                </div>
                                <div class="col-md-2">
                                    <select name="person_designation" class="form-control select2">
                                        <option value="Mr" {{ $company->company_contact_person->person_designation == 'Mr' ? 'selected' : '' }}>
                                            Mr.</option>
                                        <option value="Miss"
                                            {{ $company->company_contact_person->person_designation == 'Miss' ? 'selected' : '' }}>Miss.</option>
                                        <option value="Mrs"
                                            {{ $company->company_contact_person->person_designation == 'Mrs' ? 'selected' : '' }}>Mrs.</option>
                                    </select>
                                    <div class="require text-danger person_designation"></div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $company->company_contact_person->name }}" name="full_name"
                                        placeholder="Enter Full Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Designation&nbsp;<span class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="contact_person_designation" value="{{ $company->company_contact_person->person_designation }}" class="form-control"
                                        placeholder="Enter Designatio">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Mobile Number</label>
                                </div>
                                <div class="col-md-2">
                                    <select name="dialcode" class="form-control select2">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->phonecode }}"
                                                {{ $country->phonecode == $company->dialcode ? 'selected' : '' }}>
                                                {{ $country->phonecode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="contact_person_mobile"
                                        placeholder="Enter Mobile Number" value="{{ $company->company_contact_person->phone }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" class="form-control" value="{{ $company->company_contact_person->email }}" name="contact_person_email"
                                        placeholder="Enter Email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto mb-2">
                <button type="button" class="btn btn-success text-center" onclick="submitForm(event);">Submit</button>
            </div>
        </div>
    </form>

    <!-- end row -->
    {{-- End Form Here --}}
@endsection
@section('script')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ env('APP_URL') }}js/location.js"></script>
    <script>
        const _token = $('meta[name="csrf-token"]')[0].content;
        const state_id = {{ isset($company->state_id) ? $company->state_id : 'null' }};
        const city_id = {{ isset($company->city_id) ? $company->city_id : 'null' }};
        const appurl = "{{ env('APP_URL') }}";
    </script>
    <script>
        let body = "";
        let company_services = ""
        var toolbarOptions = [
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            // [{ 'font': [] }],
            // [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{
                'align': []
            }],
            ['bold', 'italic', 'underline'],
            ['link', 'image']
        ];
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });

        var quill1 = new Quill('#companyServices', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });
        quill.on('text-change', function() {
            body = JSON.stringify(quill.getContents());
            $("#body_id")[0].value = body;
            $("#html_content_intro")[0].value = escapeHtml($('.ql-editor').html());
        });
        // // console.log($("#body_id")[0].value);
        // console.log(JSON.parse($("#body_id")[0].value));
        if($("#body_id")[0].value != ''){
        quill.setContents(JSON.parse($("#body_id")[0].value))
        }

        // for services
        quill1.on('text-change', function() {
            // body = JSON.stringify(quill1.getContents());
            company_services = JSON.stringify(quill1.getContents());
            $("#company_service_id")[0].value = company_services;
            $("#html_content_service")[0].value = escapeHtml($('.ql-editor').html());
        });
        // quill1.setContents(JSON.parse($("#body_id")[0].value))
        console.log($("#company_service_id")[0].value)
        if($("#company_service_id")[0].value != ''){
            quill1.setContents(JSON.parse($("#company_service_id")[0].value))
        }
        

        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };

            return text.replace(/[&<>"']/g, function(m) {
                return map[m];
            });
        }



        function submitForm(e) {
            e.preventDefault();
            $('.require').css('display', 'none');
            let url = $("#companyForm").attr('action');
            var data = new FormData($("#companyForm")[0]);
            data.append('_method', 'put');
            $.ajax({
                url: url,
                type: 'post',
                // _method: 'put',
                // data: data,
                data: new FormData($("#companyForm")[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    return true;
                    // if (response.db_error) {
                    //     $(".alert-secondary").css('display', 'block');
                    //     $(".db_error").html(response.db_error);
                    // } else if (response.errors) {
                    //     var error_html = "";
                    //     $.each(response.errors, function(key, value) {
                    //         error_html = '<div>' + value + '</div>';
                    //         $('.' + key).css('display', 'block').html(error_html);
                    //     });
                    // } else if (!response.errors && !response.db_error) {
                    //     location.href = response.redirectRoute;
                    //     toastr.success(response.msg);
                    // }
                }
            });
        }
    </script>
@endsection
