<!--Categories-->
<section class="sptb">
    <div class="container">
        <div class="section-title center-block text-center">
            <h1>Job Categories</h1>
            <p>Find jobs by categories.</p>
        </div>
        <div class="item-all-cat center-block text-center education-categories">
            <div class="row">
                @if(isset($home_job_categories) AND !blank($home_job_categories))
                    @foreach($home_job_categories as $category)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="item-all-card text-dark text-center">
                                <a href="javascript:void();"></a>
                                <div class="iteam-all-icon">
                                    <img src="{{asset('themes/fvft/assets/images/products/categories/cashier.png')}}" class="imag-service" alt="Cashier">
                                </div>
                                <div class="item-all-text mt-3" style="height: 15px;">
                                    <h5 class="mb-0 text-body">{{ $category->functional_area }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="mt-4">
                <a href="{{ route('site.jobs') }}" class="btn btn-primary btn-outline-primary">View More</a>
            </div>
        </div>
    </div>
</section>
<!--Categories-->
