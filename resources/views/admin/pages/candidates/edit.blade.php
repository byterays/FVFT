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

    </style>
    <div class="page-header">
        <h4 class="page-title">{{ $action }} Candidate</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Modules</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="/admin/candidates/">Candidate</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </div>

    <div class="alert alert-secondary d-none" role="alert"><button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">×</button><span id="db_error" class="db_error">Secondary alert—At vero eos et accusamus
            praesentium!</span></div>
    <form action="{{ route('admin.canidates.store') }}" method="POST" enctype="multipart/form-data" id="candidateForm">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">{{ strtoupper('Picture') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group profilePicture" id="profilePicture">
                                    <label for="">Profile Picture</label>
                                    <input type="file" name="profile_picture"
                                        data-default-file="{{ $employ->avatar != null && file_exists($employ->avatar) ? env('APP_URL') . $employ->avatar : '' }}"
                                        class="dropify" data-allowed-file-extensions="png jpg jpeg"
                                        data-height="180">
                                    <div class="require text-danger profile_picture"></div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-group profilePicture">
                                    <label for="">Full Picture</label>
                                    <input type="file" name="full_picture[]" id="fullPicture" class="dropify"
                                        data-height="180" data-allowed-file-extensions="png jpg jpeg" multiple>
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
                        <h3 class="card-title">{{ strtoupper('Personal Information') }}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="first_name">First Name&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{ $employ->first_name }}"
                                        id="first_name" name="first_name" placeholder="Enter First Name">
                                    <div class="require text-danger first_name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Middle Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{ $employ->middle_name }}"
                                        id="middle_name" name="middle_name" placeholder="Enter Middle Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="last_name" class="form-label">Last Name&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{ $employ->last_name }}"
                                        id="last_name" name="last_name" placeholder="Enter Last Name">
                                    <div class="require text-danger last_name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="gender" class="form-control select2">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ $employ->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ $employ->gender == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="Other" {{ $employ->gender == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                    <div class="require text-danger gender"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="marital_status" class="form-label">Marital Status&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="marital_status" class="form-control select2">
                                        <option value="">Select Marital Status</option>
                                        <option value="Unmarried"
                                            {{ $employ->marital_status == 'Unmarried' ? 'selected' : '' }}>Unmarried
                                        </option>
                                        <option value="Married"
                                            {{ $employ->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Divorced"
                                            {{ $employ->marital_status == 'Divorced' ? 'selected' : '' }}>Divorced
                                        </option>
                                        <option value="Widow" {{ $employ->marital_status == 'Widow' ? 'selected' : '' }}>
                                            Widow</option>
                                    </select>
                                    <div class="require text-danger marital_status"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Date of Birth(Nepali B.S)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control nepaliDatePicker"
                                        value="{{ $employ->dob_in_bs }}" name="nepali_dob" readonly
                                        placeholder="Enter Birth Date" id="nepali-datepicker">
                                    <div class="require text-danger nepali_dob"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Date of Birth(English A.D)&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control datetime" value="{{ $employ->dob }}"
                                        name="english_dob" readonly placeholder="Enter Birth Date">
                                    <div class="require text-danger english_dob"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Height</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $employ->height }}"
                                            name="height" placeholder="000">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary">CM</button>
                                        </div>
                                    </div>
                                    <div class="require text-danger height"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Weight</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{ $employ->weight }}"
                                            name="weight" placeholder="000">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary">KG</button>
                                        </div>
                                    </div>
                                    <div class="require text-danger weight"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">{{ strtoupper('Contact Information') }}</h3>

                    </div>
                    <div class="card-body mb-0">
                        <div class="form-group">
                            <label for="">Mobile Number&nbsp;<span class="req">*</span></label>
                            <div class="d-inline-flex">
                                <input type="text" name="mobile_number1" value="{{ $employ->mobile_phone }}"
                                    class="form-control" placeholder="Enter Mobile Number 1">
                                <input type="text" name="mobile_number2" value="{{ $employ->mobile_phone2 }}"
                                    class="form-control ml-3" placeholder="Enter Mobile Number 2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Email ID</label>
                            <input type="email" class="form-control" name="email" value="{{ $employ->user->email }}"
                                placeholder="Enter Email ID">
                            <div class="require text-danger email"></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Address</label>
                            <div class="row">
                                <div class="col-6">
                                    <select name="state_id" class="form-control select2" id="states"
                                        onchange="patchGetDistricts(this)" value="{{ $employ->state_id }}">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ $state->id == $employ->state_id ? 'selected' : '' }}>
                                                {{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select name="district_id" class="form-control select2" id="districts"
                                        value="{{ $employ->district_id }}">
                                        <option value="">Select District</option>
                                    </select>
                                </div>
                                <div class="col-6 mt-3">
                                    <input type="text" name="municipality" value="{{ $employ->municipality }}"
                                        class="form-control" placeholder="Municipality">
                                </div>
                                <div class="col-6 mt-3">
                                    <input type="text" name="ward" class="form-control" value="{{ $employ->ward }}"
                                        placeholder="Ward">
                                </div>
                                <div class="col-12 mt-3">
                                    <input type="text" name="city_street" value="{{ $employ->city_street }}"
                                        class="form-control" placeholder="City/Street/Tole/Town/Village">
                                </div>
                                <div class="col-12 mt-3">
                                    <input type="text" name="address_line" value="{{ $employ->address_line }}"
                                        class="form-control" placeholder="Address Line">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-xl-6">


                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">{{ strtoupper('Passport Details') }}</h3>

                    </div>
                    <div class="card-body mb-0">
                        <div class="form-group">
                            <label for="" class="form-label">Passport Number</label>
                            <input type="text" name="passport_number" value="{{ $employ->passport_number }}"
                                class="form-control" placeholder="Enter Passport Number">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Passport Expiry Date</label>
                            <input type="text" name="passport_expiry_date" value="{{ $employ->passport_expiry_date }}"
                                class="form-control datetimepicker"
                                placeholder="Enter Passport Expiry Date, eg:2020-01-02">
                        </div>
                    </div>
                </div>



                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">{{ strtoupper('Experience') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="card p-2" style="width: 15rem">

                            <div class="custom-controls-stacked d-inline-flex">
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="Yes" name="is_experience"
                                        {{ $employ->is_experience == 1 ? 'checked' : '' }}>
                                    <span class="custom-control-label">Yes</span>
                                </label>
                                <label class="custom-control custom-radio ml-5">
                                    <input type="radio" class="custom-control-input" value="No" name="is_experience"
                                        {{ $employ->is_experience == 0 ? 'checked' : '' }}>
                                    <span class="custom-control-label">No</span>
                                </label>
                            </div>

                        </div>
                        <div class="row d-none" id="experienceData">
                            @foreach (json_decode($employ->experiences, true) as $key => $employ_experience)
                                <div class="form-group">
                                    <div class="form-label">Experience</div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Country</label>
                                                <select name="country_id[]" class="form-control select2" id="">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            {{ $country->id == $key ? 'selected' : '' }}>
                                                            {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Job Category</label>
                                                <select name="job_category_id[]" class="form-control select2" id="">
                                                    <option value="">Select Job Category</option>
                                                    @foreach ($job_categories as $job_category)
                                                        <option value="{{ $job_category->id }}"
                                                            {{ $job_category->id == $employ_experience['job_category_id'] ? 'selected' : '' }}>
                                                            {{ $job_category->functional_area }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Job Title</label>
                                                <select name="job_title[]" class="form-control select2" id="">
                                                    <option value="">Select Job Title</option>
                                                    @foreach ($jobs as $job)
                                                        <option value="{{ $job->id }}"
                                                            {{ $job->id == $employ_experience['job_title_id'] ? 'selected' : '' }}>
                                                            {{ $job->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Working Duration</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select name="working_year[]" class="form-control select2" id="">
                                                            <option value="">Year</option>
                                                            <?php
                                                            $dyear = $employ_experience['working_year'];
                                                            $year = date('Y');
                                                            $min = $year - 250;
                                                            $max = $year;
                                                            for ($i = $max; $i >= $min; $i--) {
                                                                $selected = $dyear == $i ? 'selected' : '';
                                                                echo "<option value='$i' $selected>$i</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select name="working_month[]" class="form-control select2" id="">
                                                            <option value="">Month</option>
                                                            <?php
                                                            $dmonth = $employ_experience['working_month'];
                                                            ?>
                                                            <?php for( $m = 1; $m <= 12; ++$m ) {
                                            $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                            $selected_month = $dmonth == $month_label ? 'selected' : '';
                                            ?>
                                                            <option value="<?php echo $month_label; ?>" <?php echo $selected_month; ?>>
                                                                <?php echo $month_label; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div id="appendExperience">

                            </div>

                            <div class="form-group">
                                <span class="cur_sor" id="addExperience">Add Experience <i
                                        class="fa fa-plus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">{{ strtoupper('Education/Training/Skill') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Education Level&nbsp;<span class="req">*</span></label>
                            <select name="education_level_id" class="form-control select2">
                                <option value="">Select Level</option>
                                @foreach ($educationLevels as $educationLevel)
                                    <option value="{{ $educationLevel->id }}"
                                        {{ $educationLevel->id == $employ->education_level_id ? 'selected' : '' }}>
                                        {{ $educationLevel->title }}</option>
                                @endforeach
                            </select>
                            <div class="require text-danger education_level_id"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Training</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="training[]" class="form-control select2 training" multiple="multiple"
                                        id="training">
                                        <option value="">Select Training</option>
                                        @foreach ($trainings as $training)
                                            <option value="{{ $training->id }}"
                                                {{ in_array($training->id, json_decode($employ->trainings)) ? 'selected' : '' }}>
                                                {{ $training->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <span class="cur_sor" data-toggle="modal" data-target="#newTrainingModal">Add
                                        Training <span><i class="fa fa-plus"></i></span></span>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="">Skill</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="skill[]" class="form-control select2" multiple="multiple" id="skill">
                                        <option value="">Select Skill</option>
                                        @foreach ($skills as $skill)
                                            <option value="{{ $skill->id }}"
                                                {{ in_array($skill->id, json_decode($employ->skills)) ? 'selected' : '' }}>
                                                {{ $skill->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <span class="cur_sor" data-toggle="modal" data-target="#newSkillModal">Add Skill
                                        <span><i class="fa fa-plus"></i></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label">Language</div>
                            @foreach(json_decode($employ->languages, true) as $key => $employ_language)
                            <div class="row {{ !$loop->first ? 'mt-2' : '' }}">
                                <div class="col-md-6">
                                    <select name="language[]" class="form-control select2">
                                        <option value="">Select Language</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}" {{ $language->id == $key ? "selected" : "" }}>{{ $language->lang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="language_level[]" class="form-control select2">
                                        <option value="">Select Level</option>
                                        <option value="Very Good" {{ $employ_language == 'Very Good' ? 'selected' : '' }}>Very Good</option>
                                        <option value="Good" {{ $employ_language == 'Good' ? 'selected' : '' }}>Good</option>
                                        <option value="Fair" {{ $employ_language == 'Fair' ? 'selected' : '' }}>Fair</option>
                                    </select>
                                </div>
                            </div>
                            @endforeach
                            <div id="appendLanguageDiv">

                            </div>
                            <div class="form-group mt-5">
                                {{-- <div class="form-group"> --}}
                                <span class="cur_sor" id="addLanguage">Add Language <i
                                        class="fa fa-plus"></i></span>
                                {{-- </div> --}}
                                {{-- <select name="" class="form-control select2" id="languageSelect">
                                    <option value="">Select Language</option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}" data-id="{{ $language->id }}"
                                            data-name="{{ $language->lang }}">{{ $language->lang }}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto mb-2">
                {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                <button type="button" class="btn btn-success text-center" onclick="submitForm(event);">Submit</button>
            </div>
        </div>
    </form>

    @include('admin.partial.modals.newTrainingModal')
    @include('admin.partial.modals.newSkillModal')
    <!-- end row -->
    {{-- End Form Here --}}
@endsection
@section('script')
    <script src="{{ env('APP_URL') }}js/location.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            getDistricts($("#states").val());
            $('.datetime').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });

            var is_experience = $("input[name=is_experience]").val();
            if (is_experience == "Yes") {
                $("#experienceData").removeClass('d-none');
            } else if (is_experience == "No") {
                $("#experienceData").addClass('d-none');
            }

            $("#fullPicture").on("change", function() {
                if ($("#fullPicture")[0].files.length > 5) {
                    alert("You can select only 5 images");
                    $("#fullPicture").val(null);
                }
            });
            $(".datetime").on('change', () => {
                let dateTime = $(".datetime").val();
                let dateObj = new Date(dateTime);
                let year = dateObj.getUTCFullYear();
                let month = dateObj.getUTCMonth() + 1;
                let day = dateObj.getUTCDate();
                let nepaliDate = NepaliFunctions.AD2BS({
                    year: year,
                    month: month,
                    day: day
                });
                let nepaliYear = nepaliDate.year;
                let nepaliMonth = ("0" + nepaliDate.month).slice(-2);
                let nepaliDay = ("0" + nepaliDate.day).slice(-2);
                let nepaliValue = nepaliYear + '-' + nepaliMonth + '-' + nepaliDay;
                $("#nepali-datepicker").val(nepaliValue);
            });

            // $(".training").on('change', function(){
            //     updateSelectedList('training');
            //     disableSelectedList('training');
            // });

            $("#newTrainingModal").on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $('.require').css('display', 'none');
            });

            $("#newSkillModal").on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $('.require').css('display', 'none');
            });


            $('.dropify').dropify({
                error: {

                    'imageFormat': 'The image format is not allowed (png, jpg, jpeg only).'
                }
            });

        });


        function submitForm(e) {
            e.preventDefault();
            $('.require').css('display', 'none');
            let url = $("#candidateForm").attr('action');
            $.ajax({
                url: url,
                type: 'post',
                data: new FormData($("#candidateForm")[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response.db_error) {
                        $(".alert-secondary").css('display', 'block');
                        $(".db_error").html(response.db_error);
                    } else if (response.errors) {
                        var error_html = "";
                        $.each(response.errors, function(key, value) {
                            error_html = '<div>' + value + '</div>';
                            $('.' + key).css('display', 'block').html(error_html);
                        });
                    } else if (!response.errors && !response.db_error) {
                        location.href = response.redirectRoute;
                        toastr.success(response.msg);
                    }
                }
            });
        }

        // Experience Section
        var ecount = 0;
        $(function() {
            var myexperienceRadio = $("input[name=is_experience]");
            $(myexperienceRadio).on('change', function() {
                let this_value = $(this).val();
                if (this_value == 'Yes') {
                    $("#experienceData").removeClass('d-none');
                } else if (this_value == 'No') {
                    $("#experienceData").addClass('d-none');
                }
            });


            $("#addExperience").on('click', () => {
                let html = `<div class="form-group" id="eRow_` + ecount +
                    `">
                                <div class="form-label">Experience <span class="float-right cur_sor btn btn-danger" onclick="removeRow('eRow_` +
                    ecount + `')">Remove</span></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Country</label>
                                            <select name="country_id[]" class="form-control select2" id="">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Job Category</label>
                                            <select name="job_category_id[]" class="form-control select2" id="">
                                                <option value="">Select Job Category</option>
                                                @foreach ($job_categories as $job_category)
                                                    <option value="{{ $job_category->id }}">
                                                        {{ $job_category->functional_area }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Job Title</label>
                                            <select name="job_title[]" class="form-control select2" id="">
                                                <option value="">Select Job Title</option>
                                                @foreach ($jobs as $job)
                                                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Working Duration</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="working_year[]" class="form-control select2" id="">
                                                        <option value="">Year</option>
                                                        <?php
                                                        $dyear = old('year');
                                                        $year = date('Y');
                                                        $min = $year - 250;
                                                        $max = $year;
                                                        for ($i = $max; $i >= $min; $i--) {
                                                            $selected = $dyear == $i ? 'selected' : '';
                                                            echo "<option value='$i' $selected>$i</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="working_month[]" class="form-control select2" id="">
                                                        <option value="">Month</option>
                                                        <?php
                                                        $dmonth = old('month');
                                                        ?>
                                                        <?php for( $m = 1; $m <= 12; ++$m ) {
                                            $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                            $selected_month = $dmonth == $month_label ? 'selected' : '';
                                            ?>
                                                        <option value="<?php echo $month_label; ?>" <?php echo $selected_month; ?>>
                                                            <?php echo $month_label; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>`;
                $("#appendExperience").append(html);
                ecount++;
            });
        });

        // End Experience Section


        // Ajax Add Training and Skill Section
        $("#addNewTraining").on('click', function(e) {
            $('.require').css('display', 'none');
            e.preventDefault();
            var formData = ($("#newTrainingForm").serialize());
            var action = $("#newTrainingForm").attr('action');
            $.ajax({
                url: action,
                type: 'post',
                data: formData,
                dataType: 'json',
                success: function(data) {
                    if (data.errors) {
                        var error_html = "";
                        $.each(data.errors, function(key, value) {
                            error_html = '<div>' + value + '</div>';
                            $('.' + key).css('display', 'block');
                            $('.' + key).css('color', 'red');
                            $('.' + key).html(error_html);
                        });
                    } else {
                        $("#newTrainingModal").modal('hide');
                        let new_option = $('<option></option>').val(data.training_id).html(data
                                .training_title)
                            .attr('selected', 'selected');
                        $("#training").append(new_option);

                    }

                }
            });
        });

        $("#addNewSkill").on('click', function(e) {
            $('.require').css('display', 'none');
            e.preventDefault();
            var formData = ($("#newSkillForm").serialize());
            var action = $("#newSkillForm").attr('action');
            $.ajax({
                url: action,
                type: 'post',
                data: formData,
                dataType: 'json',
                success: function(data) {
                    if (data.errors) {
                        var error_html = "";
                        $.each(data.errors, function(key, value) {
                            error_html = '<div>' + value + '</div>';
                            $('.' + key).css('display', 'block');
                            $('.' + key).css('color', 'red');
                            $('.' + key).html(error_html);
                        });
                    } else {
                        $("#newSkillModal").modal('hide');
                        let new_option = $('<option></option>').val(data.skill_id).html(data
                                .skill_title)
                            .attr('selected', 'selected');
                        $("#skill").append(new_option);

                    }

                }
            });
        });

        // End Ajax Add Training and Skill Section

        // Language Section
        var count = 0;
        $("#languageSelect").on('change', function() {

            let language_id = $(this).find(':selected').data('id');
            let language_name = $(this).find(':selected').data('name');
            let html = `<div class="row" id="languageRow_` + count + `">
                            <div class="col-md-4">
                                <label for="" class="">` + language_name + `</label>
                                <input type="hidden" name="language[]" class="form-control"
                                    value="` + language_id +
                `">
                            </div>
                            <div class="col-md-4">
                                <div class="custom-controls-stacked d-inline-flex">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="Good" name="language_level_` +
                language_id +
                `[]">
                                        <span class="custom-control-label">Good</span>
                                    </label>
                                    <label class="custom-control custom-radio ml-2">
                                        <input type="radio" class="custom-control-input" value="Fair" name="language_level_` +
                language_id + `[]">
                                        <span class="custom-control-label">Fair</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                            <span class="text-danger cur_sor" onclick="removeRow('languageRow_` + count + `')">X</span>
                        </div>
                        </div>`;
            $("#appendLanguageDiv").append(html);
            count++;
        });


        $("#addLanguage").on('click', () => {
            let language_html = `<div class="row mt-5" id="languageRow_` + count + `">
                                <div class="col-md-6">
                                    <select name="language[]" class="form-control select2" id="lang_` + count + `">
                                        <option value="">Select Language</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}">{{ $language->lang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="language_level[]" class="form-control select2">
                                        <option value="">Select Level</option>
                                        <option value="Very Good">Very Good</option>
                                        <option value="Good">Good</option>
                                        <option value="Fair">Fair</option>
                                    </select>
                                </div>
                                <div class="col-md-1 mt-2">
                            <span class="text-danger cur_sor" onclick="removeRow('languageRow_` + count + `')">X</span>
                        </div>
                            </div>`;
            $("#appendLanguageDiv").append(language_html);
            count++;
        });
        // End Language Section

        function removeRow(idname) {
            $("#" + idname).remove();
        }

        var listData = [];

        function updateSelectedList(classname) {
            console.log(classname)
            var listData = classname + 'selectedList';
            listData = [];
            var valuedata = classname + 'selectedValue';
            $("." + classname).each(function() {
                valuedata = $(this).find('option:selected').val();
                console.log(valuedata);
                if (valuedata != "" && $.inArray(valuedata, listData) == "-1") {
                    listData.push(valuedata);
                }
            });
            console.log(listData);
        }

        function disableSelectedList(class_name) {
            $("." + class_name + ' option').each(function() {
                console.log(class_name + 'selectedList')
                if ($.inArray(this.value, listData) != "-1") {
                    console.log($(this));
                    $(this).hide();
                } else {
                    $(this).show();
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
