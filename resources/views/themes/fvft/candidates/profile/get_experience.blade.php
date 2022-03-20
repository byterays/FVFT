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
                    <form action="{{ route('candidate.profile.post_qualification') }}" method="POST" id="candidateForm">
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
                            <h3 class="mt-5 ml-3">Experience</h3>
                            <div class="card mb-2">
                                <div class="row" id="experienceData">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <input type="hidden" class="form-control" name="user_id"
                                                value="{{ setParameter($employ, 'user_id') }}">
                                            @if (json_decode($employ->experiences, true) != null)
                                                @foreach (json_decode($employ->experiences, true) as $key => $employ_experience)
                                                    <div class="form-group">
                                                        <div class="form-label">Experience</div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Country</label>
                                                                    <select name="country_id[]"
                                                                        class="form-control select2-flag-search">
                                                                        <option value="">Select Country</option>
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id }}"
                                                                                {{ $country->id == $employ_experience['country_id'] ? 'selected' : '' }}>
                                                                                {{ $country->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Job Category</label>
                                                                    <select name="job_category_id[]"
                                                                        class="form-control select2-flag-search" id="">
                                                                        <option value="">Select Job Category</option>
                                                                        @foreach ($job_categories as $job_category)
                                                                            <option value="{{ $job_category->id }}"
                                                                                {{ $job_category->id == $employ_experience['job_category_id'] ? 'selected' : '' }}>
                                                                                {{ $job_category->functional_area }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Job Title</label>
                                                                    <select name="job_title[]"
                                                                        class="form-control select2-flag-search" id="">
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
                                                                            <select name="working_year[]"
                                                                                class="form-control select2" id="">
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
                                                                            <select name="working_month[]"
                                                                                class="form-control select2" id="">
                                                                                <option value="">Month</option>
                                                                                <?php
                                                                                $dmonth = $employ_experience['working_month'];
                                                                                ?>
                                                                                <?php for( $m = 1; $m <= 12; ++$m ) {
                                                                        $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                                                        $selected_month = $dmonth == $month_label ? 'selected' : '';
                                                                        ?>
                                                                                <option value="<?php echo $month_label; ?>"
                                                                                    <?php echo $selected_month; ?>>
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
                                            @else
                                                @include(
                                                    'admin.pages.candidates.partial.experience'
                                                )
                                            @endif
                                        </div>
                                    </div>


                                    <div id="appendExperience">

                                    </div>

                                    <div class="form-group">
                                        <span class="cur_sor" id="addExperience">Add Experience <i
                                                class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body mx-auto">
                                    <div class="mx-auto">
                                        <span>Contact
                                            Information</span> &nbsp;&nbsp;&nbsp;<a
                                            href="{{ route('candidate.profile.get_contact_information') }}"
                                            class="btn btn-primary rounded-0"><i class="fa fa-arrow-left"></i>Back </a>
                                        <button type="button" onclick="submitForm(event);"
                                            class="btn btn-primary ml-3 rounded-0">Next <i
                                                class="fa fa-arrow-right"></i></button>&nbsp;&nbsp;&nbsp;<span>Experience
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('admin.partial.modals.newTrainingModal')
    @include('admin.partial.modals.newSkillModal')
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#newTrainingModal").on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $('.require').css('display', 'none');
            });

            $("#newSkillModal").on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $('.require').css('display', 'none');
            });
        });

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
                            <button class="text-danger btn btn-sm btn-default" onclick="removeRow('languageRow_` +
                count + `')"><i class="fa fa-minus"/></button>
                        </div>
                            </div>`;
            $("#appendLanguageDiv").append(language_html);
            count++;
        });
        // End Language Section

        function removeRow(idname) {
            $("#" + idname).remove();
        }

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
@endsection
