@extends('themes.fvft.candidates.layouts.dashmaster')
@section('title') Account Setting @stop
@section('content')
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg"
            style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">Account Setting</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard </a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Setting</li>
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
                    <div class="row">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h3 class="font-weight-bold">{{ strtoupper('Settings') }}</h3>
                                <div id="basicwizard" class="border pt-0">
                                    @include('partial/candidates/setting_tabs')
                                </div>
                            </div>
                        </div>
                        @include(
                            'partial/candidates/accountsetting/pilltab'
                        )
                    </div>
                    <div class="row">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h3 class="card-title">{{ strtoupper('Change Password') }}</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('candidate.account_setting.post_change_password') }}" method="POST">
                                    @csrf
                                
                                <div class="form-group">
                                    <label for="old_password">Old Password&nbsp;<span
                                            class="req">*</span></label>
                                    <input type="password" name="old_password" class="form-control" autocomplete="off">
                                    <span class="require password text-danger"></span>
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password&nbsp;<span
                                            class="req">*</span></label>
                                    <input type="password" name="password" class="form-control" autocomplete="off">
                                    <span class="require password text-danger"></span>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm New Password&nbsp;<span
                                            class="req">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        autocomplete="off">
                                    <span class="require password text-danger"></span>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100">Confirm</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
  
@endsection
