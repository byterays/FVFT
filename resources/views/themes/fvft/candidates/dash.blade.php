@extends('themes.fvft.candidates.layouts.dashmaster')
@section('content')
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg" style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
        <div class="header-text mb-0">
            <div class="text-center text-white">
                <h1 class="">My Jobs</h1>
                <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">My Dashboard </a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">My Jobs</li>
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
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">My Ads</h3>
                    </div>
                    <div class="card-body">
                        <div class="ads-tabs">
                            <div class="tabs-menus">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li class=""><a href="#tab1" class="" data-toggle="tab">All Jobs</a></li>
                                    <li><a href="#tab2" data-toggle="tab" class="active">On Process</a></li>
                                    <li><a href="#tab3" data-toggle="tab" class="">Accepted</a></li>
                                    <li><a href="#tab4" data-toggle="tab" class="">Pending</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane table-responsive border-top userprof-tab active" id="tab1">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="w-100">Latest Jobs</th>
                                                <th>Location</th>
                                                <th>Salary</th>
                                                <th>Ad Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">BPO Jobs</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Feb-21-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Ambrosia</td>
                                                <td class="font-weight-semibold fs-16">$54 - $60</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Computer Operator</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Oct-23-2018 , 9:18</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Aldovia</td>
                                                <td class="font-weight-semibold fs-16">$15 - $25</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Admin</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-15-2019 , 12:45</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Gondal</td>
                                                <td class="font-weight-semibold fs-16">$22 - $34</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Delivery Boys</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-25-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Maltovia</td>
                                                <td class="font-weight-semibold fs-16">$20 - $30</td>
                                                <td>
                                                    <a href="#" class="badge badge-success">Active</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Nurse</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Feb-21-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Livonia</td>
                                                <td class="font-weight-semibold fs-16">$25 - $40</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">IT/Hardware</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i> Dec-15-2018 , 12:45 pm</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i>  Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Kraplakistan</td>
                                                <td class="font-weight-semibold fs-16">$22 - $30</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Customer Support</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-22-2018 , 9:18</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Holy Alliance</td>
                                                <td class="font-weight-semibold fs-16">$14 - $20</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Sales</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-30-2018 , 11:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Graustark</td>
                                                <td class="font-weight-semibold fs-16">$89 - $90</td>
                                                <td>
                                                    <a href="#" class="badge badge-success">Active</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Teachers/Lecturers</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Dec-03-2018 , 16:45</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i>  Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Estoccia</td>
                                                <td class="font-weight-semibold fs-16">$35 - $50</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Life Insurance</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-15-2019 , 12:45</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Fook Island</td>
                                                <td class="font-weight-semibold fs-16">$22 - $30</td>
                                                <td>
                                                    <a href="#" class="badge badge-danger">Expired</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Web Designer</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-03-2018 , 12:50</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i>  Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Edonia</td>
                                                <td class="font-weight-semibold fs-16">$35 - $40</td>
                                                <td>
                                                    <a href="#" class="badge badge-success">Active</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Web Developer</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-20-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Eurasia</td>
                                                <td class="font-weight-semibold fs-16">$12 - $30</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Driver</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Sep-22-2018 , 9:18 </a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Drusselstein</td>
                                                <td class="font-weight-semibold fs-16">$23 - $40</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Cook/Chef</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Dec-21-2018 , 19:45</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Deltora</td>
                                                <td class="font-weight-semibold fs-16 ">$76 - $80</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Data Entry</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-12-2018 , 16:50</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i>  Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Carovia</td>
                                                <td class="font-weight-semibold fs-16">$35 - $40</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Marketing</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-25-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Bozatta</td>
                                                <td class="font-weight-semibold fs-16">$89 - $90</td>
                                                <td>
                                                    <a href="#" class="badge badge-info">Sold</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Nurse</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-03-2018 , 12:50</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i>  Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Baltish</td>
                                                <td class="font-weight-semibold fs-16">$35 - $50</td>
                                                <td>
                                                    <a href="#" class="badge badge-info">Sold</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">IT Software</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-15-2019 , 12:45 pm</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Bangistan</td>
                                                <td class="font-weight-semibold fs-16">$22 - $34</td>
                                                <td>
                                                    <a href="#" class="badge badge-info">Sold</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">HR Recruiter</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-15-2019 , 08:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Bandrinka</td>
                                                <td class="font-weight-semibold fs-16">$89 - $90</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Receptionist</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-14-2018 , 19:18</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Antegria</td>
                                                <td class="font-weight-semibold fs-16">$14- $50</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab" id="tab2">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="w-100">Latest Jobs</th>
                                                <th>Location</th>
                                                <th>Salary</th>
                                                <th>Ad Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">BPO Jobs</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Feb-21-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Ambrosia</td>
                                                <td class="font-weight-semibold fs-16">$54 - $60</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Computer Operator</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Oct-23-2018 , 9:18</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Aldovia</td>
                                                <td class="font-weight-semibold fs-16">$15 - $25</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">IT/Hardware</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i> Dec-15-2018 , 12:45 pm</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i>  Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Kraplakistan</td>
                                                <td class="font-weight-semibold fs-16">$22 - $30</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Teachers/Lecturers</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Dec-03-2018 , 16:45</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i>  Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Estoccia</td>
                                                <td class="font-weight-semibold fs-16">$35 - $50</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Web Developer</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-20-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Eurasia</td>
                                                <td class="font-weight-semibold fs-16">$12 - $30</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Driver</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Sep-22-2018 , 9:18 </a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Drusselstein</td>
                                                <td class="font-weight-semibold fs-16">$23 - $40</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Cook/Chef</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Dec-21-2018 , 19:45</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Deltora</td>
                                                <td class="font-weight-semibold fs-16 ">$76 - $80</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Marketing</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-25-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Bozatta</td>
                                                <td class="font-weight-semibold fs-16">$89 - $90</td>
                                                <td>
                                                    <a href="#" class="badge badge-warning">Published</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab" id="tab3">
                                    <table class="table table-bordered table-hover  text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="w-100">Latest Jobs</th>
                                                <th>Location</th>
                                                <th>Salary</th>
                                                <th>Ad Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Admin</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-15-2019 , 12:45</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Gondal</td>
                                                <td class="font-weight-semibold fs-16">$22 - $34</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Customer Support</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-22-2018 , 9:18</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Holy Alliance</td>
                                                <td class="font-weight-semibold fs-16">$14 - $20</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Data Entry</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-12-2018 , 16:50</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i>  Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Carovia</td>
                                                <td class="font-weight-semibold fs-16">$35 - $40</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">HR Recruiter</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-15-2019 , 08:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Bandrinka</td>
                                                <td class="font-weight-semibold fs-16">$89 - $90</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Receptionist</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-14-2018 , 19:18</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Antegria</td>
                                                <td class="font-weight-semibold fs-16">$14- $50</td>
                                                <td>
                                                    <a href="#" class="badge badge-primary">featured</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab " id="tab4">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="w-100">Latest Jobs</th>
                                                <th>Location</th>
                                                <th>Salary</th>
                                                <th>Ad Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Marketing</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-25-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Part Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Bozatta</td>
                                                <td class="font-weight-semibold fs-16">$89 - $90</td>
                                                <td>
                                                    <a href="#" class="badge badge-info">Sold</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">Nurse</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Feb-21-2018 , 16:54</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Livonia</td>
                                                <td class="font-weight-semibold fs-16">$25 - $40</td>
                                                <td>
                                                    <a href="#" class="badge badge-info">Sold</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <div class="media mt-0 mb-0">
                                                        <div class="media-body">
                                                            <div class="card-item-desc p-0">
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">IT Software</h4></a>
                                                                <a href="#"><i class="fa fa-clock-o w-4"></i>  Nov-15-2019 , 12:45 pm</a><br>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> Full Time</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i> Bangistan</td>
                                                <td class="font-weight-semibold fs-16">$22 - $34</td>
                                                <td>
                                                    <a href="#" class="badge badge-info">Sold</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                    <a class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection