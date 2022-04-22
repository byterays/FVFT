@extends('themes.fvft.company.layouts.dashmaster')
@section('title', 'Add New Job')
@section('jobs', 'active')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
@endsection
@section('data')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Add New Job') }}</h3>
        </div>
    </div>
    @include('partial.job.step')
    <div class="alert alert-secondary d-none" role="alert"><button type="button" class="close" data-dismiss="alert"
                                                                   aria-hidden="true">×</button><span id="db_error" class="db_error"></span></div>

    <div class="col-xl-12">
        <div class="row">
            <div class="card m-b-20">
                <div class="card-header">
                    <h3 class="card-title tempcolor">{{ strtoupper(__('Job Details')) }}</h3>
                </div>
                <div class="card-body">
                    <add-new-job :company="{{ $company }}"></add-new-job>
                </div>
            </div>
            {{--<div class="mx-auto">--}}
                {{--<button type="button" onclick="submitForm(event);"--}}
                        {{--class="btn btn-primary rounded-0">{{ __('Next') }} <i--}}
                        {{--class="fa fa-arrow-right"></i></button>&nbsp;&nbsp;&nbsp;<span>{{ __('Applicant Qualification') }}</span>--}}
            {{--</div>--}}
        </div>
    </div>


@endsection
@section('script')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/location.js') }}"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
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

            $('.dropify').dropify({
                error: {

                    'imageFormat': 'The image format is not allowed (png, jpg, jpeg only).'
                }
            });
        });

        function submitForm(e) {
            e.preventDefault();
            $('.require').css('display', 'none');
            let url = $("#jobForm").attr("action");
            var formData = new FormData($("#jobForm")[0]);
            // formData.append('saveType', saveType);
            $.ajax({
                url: url,
                type: 'post',
                data: formData,
                // data: new FormData($("#jobForm")[0]),
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    // return true;
                    if (data.db_error) {
                        $(".alert-warning").css('display', 'block');
                        $(".db_error").html(data.db_error);
                        toastr.warning(data.db_error);
                    } else if (data.errors) {
                        var error_html = "";
                        $.each(data.errors, function(key, value) {
                            error_html = '<div>' + value + '</div>';
                            $('.' + key).css('display', 'block').html(error_html);
                        });
                    } else if (!data.errors && !data.db_error) {
                        location.href = data.redirectRoute;
                        // toastr.success(data.msg);
                    }
                }
            });
        }


        let job_description = "";

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

        // var jd_quill = new Quill('#JobDescription', {
        //     theme: 'snow',
        //     modules: {
        //         toolbar: toolbarOptions
        //     }
        // });

        // for job_description
        // jd_quill.on('text-change', function() {
        //     job_description = JSON.stringify(jd_quill.getContents());
        //     $("#jobdescriptionID")[0].value = job_description;
        //     $("#job_description_intro")[0].value = escapeHtml($('.ql-editor').html());
        // });
        // if ($("#jobdescriptionID")[0].value != '') {
        //     jd_quill.setContents(JSON.parse($("#jobdescriptionID")[0].value))
        // }


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
