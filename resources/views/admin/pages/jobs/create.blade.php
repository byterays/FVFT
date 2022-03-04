@extends('admin.layouts.master')
@section('main')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
    <style>
        .req {
            color: red;
        }

        .tempcolor {
            color: #1650e2;
            font-weight: bold;
        }

        .ql-container {
            height: 0 !important;
        }

    </style>
    <div class="page-header">
        <h4 class="page-title tempcolor">{{ strtoupper('Post a new Job') }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Modules</a></li>
            <li class="breadcrumb-item" aria-current="page">Jobs</li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </div>
    <div class="alert alert-secondary d-none" role="alert"><button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">×</button><span id="db_error" class="db_error"></span></div>
    <form action="{{ route('admin.saveNewJob') }}" method="post" enctype="multipart/form-data" id="jobForm">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title tempcolor">{{ strtoupper('Job Details') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Job Title&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="title" class="form-control" placeholder="Enter Job Title">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="company" class="form-label">Company Name&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="company_id" class="form-control select2">
                                        <option value="">Select Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="no_of_employee" class="form-label">No of Employee&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="male_employee" class="form-label">Male</label>
                                            <input type="number" class="form-control" name="male_employee"
                                                placeholder="Enter number">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="female_employee" class="form-label">Female</label>
                                            <input type="number" class="form-control" name="female_employee"
                                                placeholder="Enter number">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="any_employee" class="form-label">Any</label>
                                            <input type="number" class="form-control" name="any_employee"
                                                placeholder="Enter number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="job_category" class="form-label">Job Category&nbsp;<span
                                            class="req"></span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="category_id" class="form-control select2-flag-search">
                                        <option value="">Select Job Category</option>
                                        @foreach ($job_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->functional_area }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="working_hours" class="form-label">Working Hours Per Day&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="working_hours" placeholder="eg, 8">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary">In Hour(/hr)</button>
                                        </div>
                                    </div>
                                    <div class="require text-danger working_hour"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="working_days" class="form-label">Working Days Per Week&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="working_days" placeholder="eg, 5">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary">Days</button>
                                        </div>
                                    </div>
                                    <div class="require text-danger working_days"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="deadline" class="form-label">Apply Before</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="deadline" class="form-control datetime" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="contract" class="form-label">Contract Period&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="contract_year" class="form-control select2">
                                                <option value="">Select Year</option>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="contract_month" class="form-control select2">
                                                <option value="">Select Month</option>
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <textarea name="contract_description" class="form-control mt-3" cols="10"
                                        rows="5"></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="custom-switch-checkbox">
                                <input type="checkbox" name="is_active" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Active</span>
                            </label>
                            <label class="custom-switch-checkbox">
                                <input type="checkbox" name="is_featured" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Featured</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title tempcolor">{{ strtoupper('Applicant Qualification') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="education_level" class="form-label">Minimum Qualification&nbsp;<span
                                            class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="education_level" class="form-contorl select2-flag-search">
                                        <option value="">Select Qualification</option>
                                        @foreach ($educationlevels as $educationlevel)
                                            <option value="{{ $educationlevel->id }}">{{ $educationlevel->title }}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="year_of_experience" class="form-label">Year of Experience</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="min_experience" class="form-control select2">
                                                <option value="">Min</option>
                                                @for ($i = 0; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="max_experience" class="form-control select2">
                                                <option value="">Max</option>
                                                @for ($i = 1; $i <= 15; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="age_requirement" class="form-label">Age Requirement</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="min_age" class="form-control select2">
                                                <option value="">Min</option>
                                                @for ($i = 18; $i <= 25; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="max_age" class="form-control select2">
                                                <option value="">Max</option>
                                                @for ($i = 18; $i <= 50; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="skils" class="form-label">Skills</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="skills[]" class="form-control select2" multiple="multiple">
                                        @foreach ($skills as $skill)
                                            <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="requirements" class="form-label">Other Requirements</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="hidden" class="form-control" name="other_requirements"
                                        id="requirementID">
                                    <input type="hidden" class="form-control" name="requirement_intro"
                                        id="requirement_intro">
                                    <div id="editor" style="min-height: 15rem;">
                                    </div>
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
                        <h3 class="card-title tempcolor">{{ strtoupper('Salary Facility') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="salary" class="form-label">Salary&nbsp;<span class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                           <div class="row">
                                               <div class="col-md-8">
                                                   <input type="text" name="country_salary" class="form-control">
                                               </div>
                                               <div class="col-md-4">
                                                   <label for="" class="form-label">USD</label>
                                               </div>
                                           </div>
                                           <div class="row mt-3">
                                            <div class="col-md-8">
                                                <input type="text" name="nepali_salary" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label">NPR</label>
                                            </div>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group mt-2">
                                        <label class="custom-switch-checkbox">
                                            <input type="checkbox" name="hide_salary" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Hide Salary</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="accomodation" class="form-label">Accomodation&nbsp;<span class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="accomodation" class="form-control select2">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="food" class="form-label">Food&nbsp;<span class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="food" class="form-control select2">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="annual_vacation" class="form-label">Annual Vacation&nbsp;<span class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="annual_vacation" class="form-control select2">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="over_time" class="form-label">Over Time&nbsp;<span class="req">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <select name="over_time" class="form-control select2">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="requirements" class="form-label">Other Benefits</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="hidden" class="form-control" name="other_benefits"
                                        id="benefitID">
                                    <input type="hidden" class="form-control" name="benefit_intro"
                                        id="benefit_intro">
                                    <div id="benefitEditor" style="min-height: 15rem;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title tempcolor">{{ strtoupper('Profile Picture') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Upload Picture(Max Number is 5)</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control dropify" name="picture[]" data-allowed-file-extensions="png jpg jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="form-label">Upload Featured Image</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control dropify" name="feature_image" data-allowed-file-extensions="png jpg jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/location.js') }}"></script>
    <script>
        const _token = $('meta[name="csrf-token"]')[0].content;
        const state_id = {{ isset($job->state_id) ? $job->state_id : 'null' }};
        const city_id = {{ isset($job->city_id) ? $job->city_id : 'null' }};
        const appurl = "{{ env('APP_URL') }}";


        $(function() {
            $('.datetime').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });


        });

        function submitForm(e) {
            e.preventDefault();
            $('.require').css('display', 'none');
            let url = $("#jobForm").attr("action");
            $.ajax({
                url: url,
                type: 'post',
                data: new FormData($("#jobForm")[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    // return true;
                    if (data.db_error) {
                        $(".alert-warning").css('display', 'block');
                        $(".db_error").html(data.db_error);
                    } else if (data.errors) {
                        var error_html = "";
                        $.each(data.errors, function(key, value) {
                            error_html = '<div>' + value + '</div>';
                            $('.' + key).css('display', 'block').html(error_html);
                        });
                    } else if (!data.errors && !data.db_error) {
                        location.href = data.redirectRoute;
                        toastr.success(data.msg);
                    }
                }
            });
        }



        let requirement = "";
        let benefits = ""
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
        var req_quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });

        var ben_quill = new Quill('#benefitEditor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });

        req_quill.on('text-change', function() {
            requirement = JSON.stringify(req_quill.getContents());
            $("#requirementID")[0].value = requirement;
            $("#requirement_intro")[0].value = escapeHtml($('.ql-editor').html());
        });
        if ($("#requirementID")[0].value != '') {
            req_quill.setContents(JSON.parse($("#requirementID")[0].value))
        }

        // for benefits
        ben_quill.on('text-change', function() {
            benefits = JSON.stringify(ben_quill.getContents());
            $("#benefitID")[0].value = benefits;
            $("#benefit_intro")[0].value = escapeHtml($('.ql-editor').html());
        });
        console.log($("#benefitID")[0].value)
        if ($("#benefitID")[0].value != '') {
            ben_quill.setContents(JSON.parse($("#benefitID")[0].value))
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
    </script>
@endsection
