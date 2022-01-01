<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Job board html template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="bootstrap job board template, bootstrap job template, hr consultancy website template, job board bootstrap template, job board html template, job listing html template, job portal html template, job portal templates html5, job posting website template, job recruitment website template, job template bootstrap, job template html, simple html and css templates, simple html css templates, directory listing html template, classified website template, responsive css template, html5 responsive template, job posting template, simple bootstrap template, bootstrap 4 templates, job application template, html5 template, premium, recruitment, template, html, job alert, directory"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="icon" href="{{asset('uploads/imgs/')}}/fvft_favicon.png" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/imgs/')}}/fvft_favicon.png"/>

		<!-- Title -->
		<title>FreeVisaFreeTicket - 
			@yield('title')
		</title>


		<!-- Bootstrap Css -->
		<link href="{{asset('themes/fvft/')}}/assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="{{asset('themes/fvft/')}}/assets/css/style.css" rel="stylesheet" />

		<!-- Font-awesome  Css -->
		<link href="{{asset('themes/fvft/')}}/assets/css/icons.css" rel="stylesheet"/>


		<!--Select2 Plugin -->
		<link href="{{asset('themes/fvft/')}}/assets/plugins/select2/select2.min.css" rel="stylesheet" />

		<!-- Cookie css -->
		<link href="{{asset('themes/fvft/')}}/assets/plugins/cookie/cookie.css" rel="stylesheet">

		<!-- Owl Theme css-->
		<link href="{{asset('themes/fvft/')}}/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="{{asset('themes/fvft/')}}/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- COLOR-SKINS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('themes/fvft/')}}/assets/color-skins/color-skins/color10.css" />
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('themes/fvft/')}}/assets/css/main.css" />


		@yield('style')
	</head>
	<body class="main-body">
		@yield('main')
		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-arrow-up"></i></a>

		<!-- JQuery js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap js -->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

		<!--JQuery Sparkline Js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/vendors/jquery.sparkline.min.js"></script>

		<!-- Circle Progress Js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/vendors/circle-progress.min.js"></script>

		<!-- Star Rating Js-->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Counters -->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/counters/counterup.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/counters/waypoints.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/counters/numeric-counter.js"></script>

		<!--Owl Carousel js -->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/owl-carousel/owl.carousel.js"></script>

		<!--Horizontal Menu-->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/horizontal/horizontal-menu/horizontal.js"></script>

		<!--JQuery TouchSwipe js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/jquery.touchSwipe.min.js"></script>

		<!--Select2 js -->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/select2/select2.full.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/js/select2.js"></script>

		<!-- sticky Js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/sticky.js"></script>

		<!-- Ion.RangeSlider -->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/jquery-uislider/jquery-ui.js"></script>

		<!--Showmore Js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/jquery.showmore.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/js/showmore.js"></script>

		<!-- Cookie js -->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/cookie/jquery.ihavecookies.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/cookie/cookie.js"></script>

        <!-- Custom scroll bar Js-->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Swipe Js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/swipe.js"></script>

		<!-- Scripts Js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/scripts2.js"></script>

		<!-- Custom Js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/custom.js"></script>
		@yield('script')
	</body>
</html>