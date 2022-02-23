<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Job board Admin template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="bootstrap job board template, bootstrap job template" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/uploads/site/fvft_favicon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/imgs/') }}/fvft_favicon.png" />
    <!-- Title -->
    <title>FVFT-Admin</title>
    <link rel="stylesheet" href="{{ asset('themes/fvft/') }}/assets/fonts/fonts/font-awesome.min.css">
    <!-- Bootstrap Css -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <!-- Sidemenu Css -->
    <link href="{{ asset('themes/fvft/') }}/assets/css/sidemenu.css" rel="stylesheet" />
    <!-- Dashboard Css -->
    <link href="{{ asset('themes/fvft/') }}/assets/css/style.css" rel="stylesheet" />
    <link href="{{ asset('themes/fvft/') }}/assets/css/admin-custom.css" rel="stylesheet" />
    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />
    <!-- select2 Plugin -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/select2/select2.min.css" rel="stylesheet" />
    <!-- Time picker Plugin -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" />
    <!-- Date Picker Plugin -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/date-picker/spectrum.css" rel="stylesheet" />
    <!--Bootstrap-datepicker css-->
    <link rel="stylesheet"
        href="{{ asset('themes/fvft/') }}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css">
    <!--Bootstrap-datepicker css-->
    <link rel="stylesheet"
        href="{{ asset('themes/fvft/') }}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css">
    <!-- p-scroll bar css-->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/pscrollbar/pscrollbar.css" rel="stylesheet" />
    <!-- file Uploads -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet"
        type="text/css" />
    <!---Font icons-->
    <link href="{{ asset('themes/fvft/') }}/assets/css/icons.css" rel="stylesheet" />
    <!-- Color-Skins -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('themes/fvft/') }}/assets/color-skins/color-skins/color10.css" />
    <!-- Data table css -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/datatable/dataTables.bootstrap4.min.css"
        rel="stylesheet" />
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/') }}css/admin/style.css">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nepali.datepicker.min.css') }}">
    <style>
        .toast-top-container {
            position: absolute;
            top: 65px;
            width: 280px;
            right: 40px;
            height: auto;
        }

    </style>
    @yield('style')
</head>

<body class="app sidebar-mini">

    <!--Loader-->
    <div id="global-loader">
        <img src="{{ asset('themes/fvft/') }}/assets/images/loader.svg" class="loader-img" alt="">
    </div>
    <div class="page">
        <div class="page-main">
            @include('admin.components.header')
            <!-- Sidebar menu-->
            @include('admin.components.sidebar')

            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 663px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 518px;"></div>
            </div>
            </aside>
            <div class="app-content">
                <div class="side-app">
                    @yield('main')
                </div>
            </div>
        </div>

        <!--footer-->
        @include('admin.components.footer')
        <!-- End Footer-->
    </div>
    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-rocket"></i></a>


    <!-- Dashboard Css -->
    <script src="{{ asset('themes/fvft/') }}/assets/js/vendors/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/js/vendors/jquery.sparkline.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/js/vendors/selectize.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/js/vendors/jquery.tablesorter.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/js/vendors/circle-progress.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/rating/jquery.rating-stars.js"></script>
    <!-- Fullside-menu Js-->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/toggle-sidebar/sidemenu.js"></script>
    <!--Select2 js -->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/select2/select2.full.min.js"></script>
    <!-- Timepicker js -->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/time-picker/jquery.timepicker.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/time-picker/toggles.min.js"></script>
    <!-- Datepicker js -->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/date-picker/spectrum.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/date-picker/jquery-ui.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/input-mask/jquery.maskedinput.js"></script>
    <!-- Inline js -->
    <script src="{{ asset('themes/fvft/') }}/assets/js/select2.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/js/formelements.js"></script>
    <!-- file uploads js -->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/fileuploads/js/dropify.js"></script>
    <!--InputMask Js-->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
    <!-- p-scroll bar Js-->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/pscrollbar/pscrollbar.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/pscrollbar/pscroll.js"></script>
    <!--Bootstrap-datepicker js-->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <!--Counters -->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/counters/counterup.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/counters/waypoints.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/counters/numeric-counter.js"></script>
    <!-- Data tables -->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <!-- Custom Js-->
    <script src="{{ asset('themes/fvft/') }}/assets/js/admin-custom.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/nepali.datepicker.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function showImg(img, previewId) {
            readInputURL(img, previewId);
        }

        function readInputURL(input, idName) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#" + idName).attr('src', e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            var mainInput = document.getElementsByClassName("nepaliDatePicker");
            mainInput.nepaliDatePicker({
                language: "english",
                onChange: function() {
                    let nepalidate = $(".nepaliDatePicker").val();
                    let dateObj = NepaliFunctions.ParseDate(nepalidate);
                    let engDate = NepaliFunctions.BS2AD(dateObj.parsedDate);
                    let year = engDate.year;
                    let month = NepaliFunctions.Get2DigitNo(engDate.month);
                    let day = NepaliFunctions.Get2DigitNo(engDate.day);
                    let engValue = year + '-' + month + '-' + day;
                    $(".datetime").val(engValue);
                },
                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 200
            });
        });
    </script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-container",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
            }
        @endif
    </script>
    @yield('script')
</body>

</html>
