<!--Top Companies-->
<section class="sptb bg-white">
    <div class="container">
        <div class="section-title center-block text-center">
            <h1>{{ __('Top') }} {{ __('Companies') }}</h1>
            {{-- <p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p> --}}
        </div>
        <div id="company-carousel" class="owl-carousel owl-carousel-icons4">
            @foreach ($companies as $item)
                <div class="item">
                    <div class="card mb-0">
                        <div class="card-body">
                            <img src="{{ asset('/') }}{{ $item->company_logo ?? 'images/defaultimage.jpg' }}" alt="company1">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-4 ">
            <div class="col-md-12 text-center">
                <a href="{{ route('site.companies') }}"
                    class="btn btn-primary btn-outline-primary ">{{ __('View All Companies') }}</a>
            </div>
        </div>
    </div>
</section>
<!--/Top Companies-->
