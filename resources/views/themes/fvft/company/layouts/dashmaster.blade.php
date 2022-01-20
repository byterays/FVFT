@extends('themes.fvft.layouts.master')
@section('style')
	@yield('css')
@endsection
@section('main')
        @include('themes.fvft.site.components.header')
        @include('themes.fvft.site.components.breadcrumb',[
            "page" =>[
                    "title" => "My Dashboard",
                    "img_url" => ""
                ]
            ])
        <section class="sptb">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-12 col-md-12">
                        @include('themes.fvft.company.components.sidebar')
					</div>
					<div class="col-xl-9 col-lg-12 col-md-12">
						<div class="card mb-0">
                            @yield('content')
						</div>
					</div>
				</div>
			</div>
		</section>
		@include('themes.fvft.site.components.footer')
@endsection
@section('script')
		@yield('js')
@endsection