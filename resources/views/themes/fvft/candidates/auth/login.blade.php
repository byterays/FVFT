{{-- @dd(Route::currentRouteName()) --}}
@extends('themes.fvft.layouts.master')
@section('title') Login or Register @endsection
{{-- @dd($countries) --}}
@section('main')
    @include('themes.fvft.site.components.header')
    <style>
        .invalid-feedback{
            display: block !important;
        }
    </style>
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg"
            style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="">{{ __('Login') }}</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="#">{{ __('Candidate') }}</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('Login') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sptb">
        <div class="container customerpage">
            <div class="row">
                <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12 register-right">
                            <ul class="nav nav-tabs nav-justified mb-5 p-2 border" id="myTab" role="tablist">
                                <li cla ss="nav-item">
                                    <a class="nav-link m-1 active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link m-1" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">{{ __('Register') }}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="single-page  w-100  p-0">
                                        <div class="wrapper wrapper2">
                                            <div class="p-4 mb-5">
                                                <h4 class="text-left font-weight-semibold fs-16">{{ __('Login With') }}</h4>
                                                <div class="btn-list d-sm-flex">
                                                    <a href="https://www.google.com/gmail/"
                                                        class="btn btn-primary mb-sm-0"><i
                                                            class="fa fa-google fa-1x mr-2"></i> {{ __('Google') }}</a>
                                                    <a href="https://twitter.com/" class="btn btn-secondary mb-sm-0"><i
                                                            class="fa fa-twitter fa-1x mr-2"></i> {{ __('Twitter') }}</a>
                                                    <a href="https://www.facebook.com/" class="btn btn-info mb-0"><i
                                                            class="fa fa-facebook fa-1x mr-2"></i> {{ __('Facebook') }}</a>
                                                </div>
                                            </div>
                                            <hr class="divider">
                                            <form id="login" class="card-body" tabindex="500" method="POST"
                                                action="{{ route('login') }}">
                                                @csrf
                                                <h3 class="pb-2">{{ __('Login') }}</h3>
                                                <div class="mail">
                                                    
                                                    <input type="email" name="email">
                                                    <label>{{ __('Email') }}</label>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="passwd">
                                                    <input type="password" name="password">
                                                    <label>{{ __('Password') }}</label>

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="submit">
                                                    <button class="btn btn-primary btn-block" type="submit">{{ __('Login') }}</button>
                                                </div>
                                                <p class="mb-2"><a href="forgot.html">{{ __('Forgot Password') }}</a></p>
                                                <p class="text-dark mb-0">{{ __('Don\'t have account?') }}<a data-toggle="tab"
                                                        href="#profile" role="tab" aria-controls="profile"
                                                        aria-selected="false" class="text-primary ml-1">{{ __('Sign Up') }}</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="single-page w-100  p-0">
                                        <div class="wrapper wrapper2">
                                            <div class="p-4 mb-5">
                                                <h4 class="text-left font-weight-semibold fs-16">Register With</h4>
                                                <div class="btn-list d-sm-flex">
                                                    <a href="https://www.google.com/gmail/"
                                                        class="btn btn-primary mb-sm-0"><i
                                                            class="fa fa-google fa-1x mr-2"></i> Google</a>
                                                    <a href="https://twitter.com/" class="btn btn-secondary mb-sm-0"><i
                                                            class="fa fa-twitter fa-1x mr-2"></i> Twitter</a>
                                                    <a href="https://www.facebook.com/" class="btn btn-info mb-0"><i
                                                            class="fa fa-facebook fa-1x mr-2"></i> Facebook</a>
                                                </div>
                                            </div>
                                            <hr class="divider">
                                            
                                            <form id="Register" class="card-body" tabindex="500" method="POST"
                                                action="/candidate/register">
                                                @csrf

                                                <div class="form-group">
                                                    <input type="text" name="first_name">
													@error('first_name')
													<span class="text-danger">{{ $messsage }}</span>
													@enderror
                                                    <label>First Name</label>
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" name="middle_name">
													@error('middle_name')
													<span class="text-danger">{{ $message }}</span>
													@enderror
                                                    <label>Middle Name</label>
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" name="last_name">
													@error('last_name')
													<span class="text-danger">{{ $message }}</span>
													@enderror
                                                    <label>Last Name</label>
                                                </div>
                                                <div class="mail">
                                                    <input type="email" name="email">
													@error('email')
													<span class="text-danger">{{ $message }}</span>
													@enderror
                                                    <label>Email</label>
                                                </div>
                                                <div class="passwd">
                                                    <input type="password" name="password">
													@error('password')
													<span class="text-danger">{{ $message }}</span>
													@enderror
                                                    <label>Password</label>
                                                </div>
                                                <div class="passwd">
                                                    <input type="password" name="password_confirmation" required
                                                        autocomplete="new-password">
                                                    <label>Conform Password</label>
                                                </div>

                                                <div class="submit">
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block">Register</button>
                                                </div>
                                                <p class="text-dark mb-0">Already have an account?<a data-toggle="tab"
                                                        href="#home" role="tab" aria-controls="home"
                                                        class="text-primary ml-1">Sign In</a></p>
                                            </form>
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

    @include('themes.fvft.site.components.footer')
@endsection
