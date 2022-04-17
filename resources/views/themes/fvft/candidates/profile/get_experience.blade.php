@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title') Experience @stop
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
                    <form action="{{ route('candidate.profile.post_experience') }}" method="POST" id="candidateForm">
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
                            <h3 class="mt-5 ml-3">{{ __('Experience') }}</h3>
                            <div class="card mb-2">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <input type="hidden" name="is_experience" value="Yes" class="form-control">
                                            <input type="hidden" class="form-control" name="user_id"
                                                value="{{ setParameter($employ, 'user_id') }}">
                                            @if (json_decode($employ->experiences, true) != null)
                                                @foreach (json_decode($employ->experiences, true) as $key => $employ_experience)
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{ __('Experience') }}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">{{ __('Country') }}</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select name="country_id[]"
                                                                    class="form-control select2-show-search"
                                                                    data-placeholder="Select Country">
                                                                    <option value="">{{ __('Select Country') }}</option>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ $country->id }}" {{ $country->id == $employ_experience['country_id'] ? 'selected' : '' }}>
                                                                            {{ $country->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">{{ __('Job Category') }}</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select name="job_category_id[]"
                                                                    class="form-control select2-show-search"
                                                                    data-placeholder="Select Job Category" id="">
                                                                    <option value="">{{ __('Select Job Category') }}</option>
                                                                    @foreach ($job_categories as $job_category)
                                                                        <option value="{{ $job_category->id }}"
                                                                            {{ $job_category->id == $employ_experience['job_category_id'] ? 'selected' : '' }}>
                                                                            {{ $job_category->functional_area }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">{{ __('Job Title') }}</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select name="job_title[]"
                                                                    class="form-control select2-show-search" id=""
                                                                    data-placeholder="Select Job Title">
                                                                    <option value="">{{ __('Select Job Title') }}</option>
                                                                    @foreach ($jobs as $job)
                                                                        <option value="{{ $job->id }}"
                                                                            {{ $job->id == $employ_experience['job_title_id'] ? 'selected' : '' }}>
                                                                            {{ $job->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">{{ __('Working Duration') }}</label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select name="working_year[]" class="form-control select2"
                                                                    id="">
                                                                    <option value="">{{ __('Year') }}</option>
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
                                                            <div class="col-md-4">
                                                                <select name="working_month[]" class="form-control select2"
                                                                    id="">
                                                                    <option value="">{{ __('Month') }}</option>
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
                                                @endforeach
                                            @else
                                                @include(
                                                    'admin.pages.candidates.partial.experience_new'
                                                )
                                            @endif
                                            <div id="appendExperience">

                                            </div>
                                            <div class="form-group">
                                                <span class="cur_sor" id="addExperience">{{ __('Add Experience') }} <i
                                                        class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body mx-auto">
                                    <div class="mx-auto">
                                        <span>{{ __('Qualification') }}</span> &nbsp;&nbsp;&nbsp;<a
                                            href="{{ route('candidate.profile.get_qualification') }}"
                                            class="btn btn-primary rounded-0"><i class="fa fa-arrow-left"></i>{{ __('Back') }} </a>
                                        <button type="button" onclick="submitForm(event);"
                                            class="btn btn-primary ml-3 rounded-0">{{ __('Next') }} <i
                                                class="fa fa-arrow-right"></i></button>&nbsp;&nbsp;&nbsp;<span>{{ __('Preview') }}
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
        // Experience Section
        var ecount = 0;
        $(function() {
            $("#addExperience").on('click', () => {
                let html = `<div id="eRow_` + ecount +
                    `">
                    <div class="form-group">
    <label for="" class="form-label">{{ __('Experience') }} <span class="float-right cur_sor p-1 btn-danger" onclick="removeRow('eRow_` +
                    ecount + `')">{{ __('Remove') }}</span></label>

</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="">{{ __('Country') }}</label>
        </div>
        <div class="col-md-8">
            <select name="country_id[]" class="form-control select2-show-search" data-placeholder="Select Country" id="">
                <option value="">{{ __('Select Country') }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="">{{ __('Job Category') }}</label>
        </div>
        <div class="col-md-8">
            <select name="job_category_id[]" class="form-control select2-show-search"
                data-placeholder="Select Job Category" id="">
                <option value="">{{ __('Select Job Category') }}</option>
                @foreach ($job_categories as $job_category)
                    <option value="{{ $job_category->id }}">
                        {{ $job_category->functional_area }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="">{{ __('Job Title') }}</label>
        </div>
        <div class="col-md-8">
            <select name="job_title[]" class="form-control select2-show-search" data-placeholder="Select Job Title"
                id="">
                <option value="">{{ __('Select Job Title') }}</option>
                @foreach ($jobs as $job)
                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="">{{ __('Working Duration') }}</label>
        </div>
        <div class="col-md-4">
            <select name="working_year[]" class="form-control select2" id="">
                <option value="">{{ __('Year') }}</option>
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
        <div class="col-md-4">
            <select name="working_month[]" class="form-control select2" id="">
                <option value="">{{ __('Month') }}</option>
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

                    </div>`;
                $("#appendExperience").append(html);
                ecount++;
            });
        });

        // End Experience Section

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
                            toastr.error(value);
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
