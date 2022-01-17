@extends('themes.fvft.layouts.master')
@section('style')
<!-- jquery ui RangeSlider -->
<link href="{{asset('themes/fvft/')}}/assets/plugins/jquery-uislider/jquery-ui.css" rel="stylesheet">
@endsection
@section('main')
        @include('themes.fvft.site.components.header')

		<!--Breadcrumb-->
		<div class="bg-white border-bottom">
			<div class="container">
				<div class="page-header">
					<h4 class="page-title">Jobs list </h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Jobs list</li>
					</ol>
				</div>
			</div>
		</div>
		<!--/Breadcrumb-->

		<!--Job listing-->
		<section class="sptb">
			<div class="container">
				<div class="row">
                    @include('themes.fvft.site.components.jobs.sidebar')
					<div class="col-xl-9 col-lg-8 col-md-12">
						<!--Job lists-->
						<div class=" mb-lg-0">
							<div class="">
								<div class="item2-gl">
									<div class=" mb-0">
										<div class="">
											<div class="p-5 bg-white item2-gl-nav d-flex">
												<h6 class="mb-0 mt-3">Showing @if($jobs->count()>1)<b>1 to {{ $jobs->count() }}
                                                    @else {{$jobs->count()}} @endif</b> of {{$jobs->total()}} Entries</h6>
												<ul class="nav item2-gl-menu mt-1 ml-auto">
													<li class=""><a href="#tab-11" class="active show" data-toggle="tab" title="List style"><i class="fa fa-list"></i></a></li>
													<li><a href="#tab-12" data-toggle="tab" class="" title="Grid"><i class="fa fa-th"></i></a></li>
												</ul>
												{{-- <div class="d-flex">
													<label class="mr-2 mt-2 mb-sm-1">Sort By:</label>
													<select name="item" class="form-control select2-no-search w-70">
														<option value="1">Relavant</option>
														<option value="2">Newest First</option>
														<option value="3">Highest Paid</option>
														<option value="4">Lowest Paid</option>
														<option value="5">High Ratings</option>
														<option value="6">Popular</option>
													</select>
												</div> --}}
											</div>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="tab-11">
                                            @foreach ($jobs as $item)
                                            @php
                                            $company=DB::table('companies')->find($item->company_id);
                                            @endphp
											<div class="card overflow-hidden  shadow-none">
                                                <div class="d-md-flex">
                                                    <div class="p-0 m-0 item-card9-img">
                                                        <div class="item-card9-imgs">
                                                            <a href="job/{{$item->slug}}"></a>
                                                            <img src="{{asset("/")}}{{$item->feature_image_url}}" alt="img" class="h-100">
                                                        </div>
                                                    </div>
                                                    <div class="card overflow-hidden  border-0 box-shadow-0 border-left br-0 mb-0">
                                                        <div class="card-body pt-0 pt-md-5">
                                                            <div class="item-card9">
                                                                <a href="/job/{{$item->id}}" class="text-dark"><h4 class="font-weight-semibold mt-1">{{ $item->title}}</h4></a>
                                                                <div class="mt-2 mb-2">
                                                                    <a href="/company/{{$company->id}}" class="mr-4"><span><i class="fa fa-building-o text-muted mr-1"></i> {{ $company->compeny_name}}</span></a>
                                                                    <a class="mr-4"><span><i class="fa fa-map-marker text-muted mr-1"></i>{{@DB::table('cities')->find($item->city_id)->name.","}} {{@DB::table('countries')->find($item->country_id)->name}} </span></a>
                                                                    <a class="mr-4"><span><i class="fa fa fa-usd text-muted mr-1"></i> {{ $item->salary_from}} - {{ $item->salary_to}}</span></a>
                                                                    <a  class="mr-4"><span><i class="fa fa-clock-o text-muted mr-1"></i> {{@DB::table('job_shifts')->find($item->job_shift_id)->job_shift}}</span></a>
                                                                    <a  class="mr-4"><span><i class="fa fa-briefcase text-muted mr-1"></i> {{ \Carbon\Carbon::parse($item->expiry_date)->diffForHumans() }} Exp</span></a>
                                                                </div>
                                                                <p class="mb-0 leading-tight">{{  Str::limit($item->description,50) }} </p>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer pt-3 pb-3">
                                                            <div class="item-card9-footer d-sm-flex">
                                                                <div class="d-flex align-items-center mb-3 mb-md-0 mt-auto posted">
                                                                    <div>
                                                                        <a href="/company/{{$company->id}}" class="text-muted fs-12 mb-1">Posted by </a><span class="ml-0 fs-13"> {{ $company->compeny_name}}</span>
                                                                        <small class="d-block text-default">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <div class="ml-auto">
                                                                    {{-- <a  class="mr-3"><i class="ion-checkmark-circled text-success mr-1"></i>Phone Verified</a> --}}
                                                                   
																	@auth
																	@php 
																		$application = \DB::table('job_applications')->where('job_id',$item->id)->where('employ_id', $employ->id)->first();
																		// dd($application);
																	@endphp
																		@if($application)
																			<a href="/remove-job/{{$item->id}}" class="btn btn-danger icons mt-1 mb-1" > Remove Application</a>
																		@else
																		<a class="btn btn-primary mt-3 mt-md-0" href="/apply-job/{{$item->id}}"   >Apply Now</a>
																		@endif
																	@else
																	<a class="btn btn-primary mt-3 mt-md-0" href="/apply-job/{{$item->id}}"   >Apply Now</a>
																	@endauth
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
											
										</div>
										<div class="tab-pane " id="tab-12">
											<div class="row">
                                                @foreach ($jobs as $item)
                                                @php
                                                $company=DB::table('companies')->find($item->company_id);
                                                @endphp
												<div class="col-lg-6 col-md-6 col-sm-12 col-xl-4">
													<div class="card overflow-hidden">
														<div class="item-card9-img border-bottom">
															<div class="item-card9-imgs">
																<a href="jobs.html"></a>
																<img src="{{asset('/')}}{{$item->feature_image_url}}" alt="img" class="h-100">
															</div>
														</div>
														<div class="card-body">
															<div class="item-card9">
																<a href="jobs.html" class="text-dark mt-2"><h4 class="font-weight-semibold mt-1 mb-2">{{ $item->title}}</h4></a>
																<ul class="icon-card mb-0 mt-1">
																	<li class=""><a href="#" class="icons"><i class="fa fa-building-o text-muted mr-1"></i> {{ $company->compeny_name}}</a></li>
																	<li><a href="#" class="icons"><i class="fa fa-map-marker text-muted mr-1"></i> {{@DB::table('cities')->find($item->city_id)->name.","}} {{@DB::table('countries')->find($item->country_id)->name}}</a></li>
																	<li class="mb-0"><a href="#" class="icons"><i class="fa fa-usd text-muted mr-1"></i>  {{ $item->salary_from}} - {{ $item->salary_to}}</a></li>
																	<li class="mb-0"><a href="#" class="icons"><i class="fa fa-clock-o text-muted mr-1"></i> {{@DB::table('job_shifts')->find($item->job_shift_id)->job_shift}}</a></li>
																</ul>
																<p class="mb-0 mt-2">{{  Str::limit($item->description,50) }} </p>
															</div>
														</div>
														<div class="card-body p-3 pl-5 pr-5">
															{{-- <a href="mr-4" class="icons"><i class="fa fa-user text-muted mr-1"></i> HR/Admin</a> --}}
															{{-- <a class="float-right"><i class="ion-checkmark-circled text-success mr-1"></i> Phone Verified</a> --}}
														</div>
														<div class="card-footer pt-3 pb-3">
															<div class="item-card9-footer d-flex">
																<div class="btn-block">
																	@auth
																	@php 
																		$application = \DB::table('job_applications')->where('job_id',$item->id)->where('employ_id', $employ->id)->first();
																		// dd($application);
																	@endphp
																		@if($application)
																			<a href="/remove-job/{{$item->id}}" class="btn btn-danger icons mt-1 mb-1" > Remove Application</a>
																		@else
																			<a href="/apply-job/{{$item->id}}" class="btn btn-block btn-primary"> Apply Now</a>
																		@endif
																	@else
																	<a href="/apply-job/{{$item->id}}" class="btn btn-block btn-primary"> Apply Now</a>
																	@endauth
																</div>
															</div>
														</div>
													</div>
												</div>
                                                @endforeach
											</div>
										</div>
									</div>
								</div>
								<div class="center-block text-center">
									{{ $jobs->links('vendor.pagination.bootstrap-4') }}
								</div>
							</div>
						</div>
						<!--/Job lists-->
					</div>
				</div>
			</div>
		</section>
		<!--/Job Listings-->
		@include('themes.fvft.site.components.footer')
@endsection
@section('script')
<script src="{{env('APP_URL')}}js/location.js"></script>
<script>
    const _token=$('meta[name="csrf-token"]')[0].content;
    const state_id={{isset($candidate->state_id)?$candidate->state_id:"3871" }};
    const city_id={{isset($candidate->city_id)?$candidate->city_id:"null" }};
    const appurl="{{env('APP_URL')}}";
</script>
@endsection