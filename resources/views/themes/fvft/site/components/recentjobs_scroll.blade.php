	<!--Latest Jobs-->
    <section class="sptb">
        <div class="container">
            <div class="section-title center-block text-center">
                <h1>{{ __('New') }} {{ __('Jobs') }}</h1>
                {{-- <p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p> --}}
            </div>
            <div class="owl-carousel owl-carousel-icons2">
                @foreach ($latest_jobs as $item)
                <div class="item">
                    <div class="card mb-0">
                        <div class="card-body">
                        <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning"><i class="fa fa-bolt"></i></span></div>
                            <img src="{{asset("/")}}{{$item->feature_image_url}}" alt="img" class=" avatar avatar-xxl brround mx-auto">
                            <div class="item-card2">
                                <div class="item-card2-desc">
                                    <div class="text-center">
                                        <div class="item-card2-text mt-3">
                                            <a href="/job/{{$item->id}}" class="text-dark"><h4 class="font-weight-bold">{{$item->title}}</h4></a>
                                        </div>
                                        <p class="">{{@DB::table('job_categories')->find($item->job_categories_id)->functional_area}}</p>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li class=""><a href="#" class="icons"><i class="si si-location-pin text-muted mr-1"></i>  {{@DB::table('countries')->find($item->country_id)->name}}</a></li>
                                            <li><a href="#" class="icons"><i class="si si-event text-muted mr-1"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="si si-user text-muted mr-1"></i>{{@DB::table('companies')->find($item->company_id)->company_name}}</a></li>
                                            <li class="mb-2"><a href="#" class="icons"><i class="si si-briefcase text-muted mr-1"></i> {{ \Carbon\Carbon::parse($item->expiry_date)->diffForHumans() }} </a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center">
                                        <a href="/job/{{$item->id}}" class="btn   btn-white btn-sm mt-2">{{$item->num_of_positions}} Positions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer  p-0">
                            <div class=" w-100">
                                <a class="float-left w-50 text-center p-2 border-right text-muted" href="#"><i class="fa fa-clock-o mr-1"></i> Part Time</a>
                                <a class=" float-left w-50 text-center p-2  text-muted" href="#"><i class="fa fa-usd mr-1"></i> 32 - 40</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>