@php 
$user=Auth::user();
@endphp
@extends('themes.fvft.candidates.layouts.dashmaster')
@section('style')
<!-- file Uploads -->
<link href="/themes/fvft/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section>
    <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg" style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
        <div class="header-text mb-0">
            <div class="text-center text-white">
                <h1 class="">Settings</h1>
                <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Settings</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="sptb">
    <form action="/candidate/settings" method="post">
        @csrf
    <div class="container">
        <div class="row ">
            <div class="col-xl-3 col-lg-12 col-md-12">
                @include('themes.fvft.candidates.components.sidebar')
            </div>
            <div class="col-lg-8 col-md-12 col-md-12">
                
            <div class="card dropify-image-avatar">
                <div class="card-header ">
                    <h3 class="card-title">Account Settings</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Email</label>
                                <input type="text" class="form-control text-dark" placeholder="Email" name="email" value="{{isset($user->email)?$user->email:''}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label text-dark">Password</label>
                                <input type="password" class="form-control text-dark" placeholder="Password" name="password">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
                <div class="float-right mb-4 mb-lg-0">
                    <button class="btn btn-success w-150" type="submit">Save</button>
                </div>
            </div>
           
        </div>
    </div>
    </form>
</section>
@endsection
@section('script')
<!-- file Uploads -->
<!-- file uploads js -->
<script src="/themes/fvft/assets/plugins/fileuploads/js/dropify.js"></script>
<script src="/themes/fvft/assets/plugins/fileuploads/js/dropfy-custom.js"></script>

<!--Upload Js-->
<script src="/themes/fvft/assets/js/upload.js"></script>
@endsection