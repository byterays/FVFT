<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="{{env("APP_URL").$page["img_url"]}}" style="background: url(&quot;{{env("APP_URL").$page["img_url"]}}&quot;) center center;">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="">{{$page["title"]}}</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">{{$page["title"]}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>