@extends('themes.fvft.candidates.layouts.dashmaster')
@section('content')
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg" style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
        <div class="header-text mb-0">
            <div class="text-center text-white">
                <h1 class="">My Jobs</h1>
                <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
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
                        <h3 class="card-title">My Jobs</h3>
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
                                                <th class="w-100">All Jobs</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_jobs as $item)                                                
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
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">{{ $item->title }}</h4></a>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> {{  \DB::table('job_categories')->where('id',$item->job_categories_id)->first()->functional_area}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Ambrosia</td>
                                                
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                </td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $all_jobs->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab" id="tab2">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="w-100">Jobs OnProcess</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($onprocess_jobs as $item)                                                
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
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">{{ $item->title }}</h4></a>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> {{  \DB::table('job_categories')->where('id',$item->job_categories_id)->first()->functional_area}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Ambrosia</td>
                                                
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                </td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View" href="/jobs/{{$item->id}}"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
    
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $onprocess_jobs->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab" id="tab3">
                                    <table class="table table-bordered table-hover  text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="w-100">Accepted Jobs</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($accepted_jobs as $item)                                                
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
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">{{ $item->title }}</h4></a>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> {{  \DB::table('job_categories')->where('id',$item->job_categories_id)->first()->functional_area}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Ambrosia</td>
                                                
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                </td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $accepted_jobs->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                                <div class="tab-pane table-responsive border-top userprof-tab " id="tab4">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="w-100">Pending Jobs</th>
                                                <th>Location</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pending_jobs as $item)                                                
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
                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">{{ $item->title }}</h4></a>
                                                                <a href="#"><i class="fa fa-tag w-4"></i> {{  \DB::table('job_categories')->where('id',$item->job_categories_id)->first()->functional_area}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><i class="fa fa-map-marker mr-1 text-muted"></i>Ambrosia</td>
                                                
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                </td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $pending_jobs->links('vendor.pagination.bootstrap-4') }}
                                    </div>
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