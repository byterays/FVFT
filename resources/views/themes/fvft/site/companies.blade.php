@extends('themes.fvft.layouts.master')
@section('main')
        @include('themes.fvft.site.components.header')
        <section class="sptb">
			<div class="container" data-select2-id="select2-data-26-4lsz">
				<div class="row" data-select2-id="select2-data-25-ya1n">
					<div class="col-xl-12 col-lg-12 col-md-12" data-select2-id="select2-data-24-0sf6">
						<!--Job lists-->
						<div class=" mb-lg-0" data-select2-id="select2-data-23-9f05">
							<div class="" data-select2-id="select2-data-22-dd0m">
								<div class="item2-gl" data-select2-id="select2-data-21-xo98">
									<div class=" mb-0">
										<div class="">
											<div class="p-5 bg-white item2-gl-nav d-flex">
												<h6 class="mb-0 mt-3">Showing @if($companies->count()>1)<b>1 to {{ $companies->count() }}
                                                @else {{$companies->count()}} @endif</b> of {{$companies->total()}} Entries</h6>
												<ul class="nav item2-gl-menu mt-1 ml-auto">
													<li class=""><a href="#tab-11" class="show active" data-toggle="tab" title="List style"><i class="fa fa-list"></i></a></li>
													{{-- <li><a href="#tab-12" data-toggle="tab" class="" title="Grid"><i class="fa fa-th"></i></a></li> --}}
												</ul>
												{{-- <div class="d-flex" data-select2-id="select2-data-20-x57y">
													<label class="mr-2 mt-2 mb-sm-1">Sort By:</label>
													<select name="item" class="form-control select2-no-search w-70 select2-hidden-accessible" data-select2-id="select2-data-16-civz" tabindex="-1" aria-hidden="true">
														<option value="1" data-select2-id="select2-data-18-i9q6">Relavant</option>
														<option value="2" data-select2-id="select2-data-30-tcmv">Newest First</option>
														<option value="3" data-select2-id="select2-data-31-9fn3">Highest Paid</option>
														<option value="4" data-select2-id="select2-data-32-0nj2">Lowest Paid</option>
														<option value="5" data-select2-id="select2-data-33-8sf2">High Ratings</option>
														<option value="6" data-select2-id="select2-data-34-9tqx">Popular</option>
													</select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="select2-data-17-nrbq" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-item-h2-container"><span class="select2-selection__rendered" id="select2-item-h2-container" role="textbox" aria-readonly="true" title="Relavant">Relavant</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
												</div> --}}
											</div>
										</div>
									</div>
									<div class="tab-content company-list">
										<div class="tab-pane active" id="tab-11">
											<div class="row">
                                                @foreach ($companies as $item)
												<div class="col-lg-6">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="{{asset("/")}}{{$item->company_logo}}" alt="img" class="w-9 h-9">
																</div>
															</div>
															<div class="item-card9 mt-3 mt-md-5">
																<a href="/company-view/{{$item->id}}" class="text-dark"><h4 class="font-weight-semibold mt-1">{{$item->company_name}}</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	 {{-- (245 Reviews) --}}
																</div>
															</div>
															{{-- <div class="ml-auto">
																<a class="btn btn-light mt-3 mt-md-6 mr-4 font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 12 vacancies</a>
															</div> --}}
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap ">
																	<tbody class="p-0">
																		{{-- <tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr> --}}
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> {{@DB::table('cities')->find($item->city_id)->name.","}}{{@DB::table('countries')->find($item->country_id)->name}}</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-light" href="/company-view/{{$item->id}}" data-toggle="modal" data-target="#Applynow">Learn More</a>
																</div>
															</div>
														</div>
													</div>
												</div>
                                                @endforeach
											</div>
										</div>
										{{-- <div class="tab-pane" id="tab-12">
											<div class="row">
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="../assets/images/products/logo/img1.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">G Technicals Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (245 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap">
																	<tbody class="p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 12 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="../assets/images/products/logo/img2.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Pro.Meet Pvt Ltd</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (58 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap">
																	<tbody class="p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Java designer, php developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 6 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="../assets/images/products/logo/img3.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Infratech Pvt Ltd</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (82 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap">
																	<tbody class="p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Angular developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 78 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="../assets/images/products/logo/img4.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Bahringer and Wyman</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="5">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (324 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap">
																	<tbody class="p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Ui Designers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 64 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="../assets/images/products/logo/img5.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Hardware Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (317 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap">
																	<tbody class="p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, php developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 32 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-3">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="../assets/images/products/logo/img6.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Flowtech Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="3">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (24 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap">
																	<tbody class="p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 2 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-4">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="../assets/images/products/logo/logo5.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Hardware Private Solutions</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (75 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap">
																	<tbody class="p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Ui designer, Ux Designers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 25 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-4">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="../assets/images/products/logo/logo2.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Wisoky-Dickens</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (75 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap">
																	<tbody class="p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 36 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6 col-md-12 col-xl-4">
													<div class="card overflow-hidden br-0 overflow-hidden">
														<div class="d-sm-flex card-body p-4">
															<div class="p-0 m-0 mr-3">
																<div class="">
																	<a href="jobs.html"></a>
																	<img src="../assets/images/products/logo/logo3.jpg" alt="img" class="w-8 h-8">
																</div>
															</div>
															<div class="item-card9 mt-2">
																<a href="company-details.html" class="text-dark"><h4 class="font-weight-semibold mt-1">Job pvt ltd</h4></a>
																<div class="rating-stars d-inline-flex">
																	<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" value="4">
																	<div class="rating-stars-container mr-2">
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm is--active">
																			<i class="fa fa-star"></i>
																		</div>
																		<div class="rating-star sm">
																			<i class="fa fa-star"></i>
																		</div>
																	</div> (15 Reviews)
																</div>
															</div>
														</div>
														<div class="card overflow-hidden border-0 box-shadow-0 br-0 mb-0">
															<div class="card-body table-responsive border-top">
																<table class="table table-borderless w-100 m-0 text-nowrap">
																	<tbody class="p-0">
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Positions</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span>Web designer, Web developers</span></td>
																		</tr>
																		<tr>
																			<td class="px-0 py-1"><span class="font-weight-semibold">Address</span></td>
																			<td class="p-1"><span>:</span></td>
																			<td class="p-1"><span> 2767  Concord Street, Charlotte, NC</span></td>
																		</tr>
																	</tbody>
																</table>
																<div class="mt-3">
																	<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#Applynow">Apply Now</a>
																	<a class="btn btn-light font-weight-semibold text-dark" href="company-details.html"><i class="fa fa-briefcase"></i> 26 vacancies</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div> --}}
									</div>
								</div>
								<div class="center-block text-center">
                                    {{ $companies->links('vendor.pagination.bootstrap-4') }}
								</div>
							</div>
						</div>
						<!--/Job lists-->
					</div>
				</div>
			</div>
		</section>
		@include('themes.fvft.site.components.footer')
@endsection
