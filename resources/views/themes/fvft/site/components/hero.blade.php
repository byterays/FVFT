<!--Sliders Section-->
<section>
    <div class="banner-1 cover-image sptb-3 pb-14 sptb-tab bg-background2"
         data-image-src="{{ asset('/uploads/site/banner.png') }}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white mb-7">
                    <h1 class="mb-1">Find The Best Job For Your Future</h1>
                    <p>It is a long established fact that a reader will be distracted by the readable.</p>
                </div>
                <form action="{{ route('site.jobs') }}">
                    <div class="row">
                        <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
                            <div class="search-background bg-transparent">
                                <div class="form row no-gutters ">
                                    <div class="form-group  col-xl-4 col-lg-3 col-md-12 mb-0 bg-white ">
                                        <input type="text" class="form-control input-lg br-tr-md-0 br-br-md-0"
                                               id="jobSearch" placeholder="Search Jobs" name="search">
                                    </div>
                                    <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg mb-0 bg-white">
                                        {{-- <input type="text" class="form-control input-lg br-md-0" id="text5" placeholder="Select Location"> --}}
                                        <select class="form-control select2-show-search  border-bottom-0"
                                                data-placeholder="Select Country" id="select-country" name="country">
                                            <option>All Countries</option>
                                            @foreach ($countries as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                        <select class="form-control select2-show-search  border-bottom-0"
                                                data-placeholder="Select Category" name="job_catagory">
                                            <optgroup label="Categories">
                                                <option>All Categories</option>
                                                @foreach ($job_categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->functional_area }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                        <button type="submit" href="#" class="btn btn-lg btn-block btn-secondary br-tl-md-0 br-bl-md-0"><i
                                                class="fa fa-search mr-1"></i>Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /header-text -->
        <div class="header-slider-img">
            <div class="container">
                <div id="small-categories" class="owl-carousel owl-carousel-icons7">
                    @foreach ($job_categories as $category)
                        <div class="item">
                            <div class="card mb-0">
                                <div class="card-body p-3">
                                    <div class="cat-item d-flex">
                                        <a href="{{ route('site.jobs', ['job_category' => $category->id]) }}"></a>
                                        {{--<div class="cat-img bg-transparent p-3">--}}
                                            {{--@if(!blank($category->image_url))--}}
                                                {{--<img src="{{ asset($category->image_url) }}" alt="img" class="avatar avatar-xxl brround mx-auto">--}}
                                            {{--@else--}}
                                                {{--<img src="{{ asset("/uploads/site/logo-min.png") }}" alt="img" class="avatar avatar-xxl brround mx-auto">--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        <div class="cat-desc text-left">
                                            <h5 class="mb-3 mt-0">{{ $category->functional_area }}</h5>
                                            <div class="badge badge-outline badge-primary">
                                                <small class="p-2">{{ $category->jobsCount() }} jobs</small>
                                            </div>
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
</section>
<!--Sliders Section-->
