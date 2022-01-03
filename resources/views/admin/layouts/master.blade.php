<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Job board Admin template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="bootstrap job board template, bootstrap job template"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="icon" href="{{asset('/uploads/site/fvft_favicon.png')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/imgs/')}}/fvft_favicon.png"/>
		<!-- Title -->
	    <title>FVFT-Admin</title>

		<link rel="stylesheet" href="{{asset('themes/fvft/')}}/assets/fonts/fonts/font-awesome.min.css">


		<!-- Bootstrap Css -->
		<link href="{{asset('themes/fvft/')}}/assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="{{asset('themes/fvft/')}}/assets/css/style.css" rel="stylesheet" />
		<link href="{{asset('themes/fvft/')}}/assets/css/admin-custom.css" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="{{asset('themes/fvft/')}}/assets/css/sidemenu.css" rel="stylesheet" />

		<!-- p-scroll bar css-->
		<link href="{{asset('themes/fvft/')}}/assets/plugins/pscrollbar/pscrollbar.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="{{asset('themes/fvft/')}}/assets/css/icons.css" rel="stylesheet"/>
		<link href="{{asset('themes/fvft/')}}/assets/plugins/iconfonts/icons.css" rel="stylesheet" />


		<!-- Color-Skins -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('themes/fvft/')}}/assets/color-skins/color-skins/color10.css" />
        @yield('style')
	</head>
	<body class="app sidebar-mini">

		<!--Loader-->
		<div id="global-loader">
			<img src="{{asset('themes/fvft/')}}/assets/images/loader.svg" class="loader-img" alt="">
		</div>
		<div class="page">
			<div class="page-main">
				@include('admin.components.header')
				<!-- Sidebar menu-->
				@include('admin.components.sidebar')

				<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 663px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 518px;"></div></div></aside>
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
		<a href="#top" id="back-to-top" ><i class="fa fa-rocket"></i></a>


		<!-- Dashboard Core -->
		<script src="{{asset('themes/fvft/')}}/assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/js/vendors/selectize.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/js/vendors/circle-progress.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Counters -->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/counters/counterup.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/counters/waypoints.min.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/counters/numeric-counter.js"></script>

		<!-- Fullside-menu Js-->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/toggle-sidebar/sidemenu.js"></script>

		<!-- CHARTJS CHART -->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/chart/Chart.bundle.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/chart/utils.js"></script>

		<!-- p-scroll bar Js-->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/pscrollbar/pscrollbar.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/pscrollbar/pscroll.js"></script>

		<!-- ECharts Plugin -->
		<script src="{{asset('themes/fvft/')}}/assets/plugins/echarts/echarts.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/plugins/echarts/echarts.js"></script>
		<script src="{{asset('themes/fvft/')}}/assets/js/index1.js"></script>
		{{-- Datatable.js --}}
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<!-- Custom Js-->
		<script src="{{asset('themes/fvft/')}}/assets/js/admin-custom.js"></script>

		
        @yield('script')

	</body>
</html>