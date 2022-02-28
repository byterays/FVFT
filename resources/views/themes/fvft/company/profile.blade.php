@extends('themes.fvft.company.layouts.dashmaster')
@section('css')
    <link href="{{ asset('/') }}themes/fvft/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
    <style>
        .form-control {
            color: #272626 !important;
        }

    </style>
    <style>
        .ql-editor {
            height: 100%;
        }

        .req {
            color: red;
        }

        .tempcolor {
            color: #1650e2;
            font-weight: bold;
        }

    </style>
@endsection
@section('title') Profile @endsection
@section('edit_profile') active @endsection
@section('content')
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg" style="background: url(&quot;../assets/images/banners/banner2.jpg&quot;) center center;">
            <div class="header-text mb-0">
                <div class="text-center text-white">
                    <h1 class="">Profile</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="{{ route('company.dash') }}">Company</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-12 col-md-12">
                    @include('themes.fvft.company.components.sidebar')
                </div>
                <div class="col-xl-9 col-lg-12 col-md-12">
                    <form action="{{ route('company.save_profile') }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $company->id ?? '' }}" name="company_id">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Update Profile</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Company Name</label>
                                            <input type="text" class="form-control text-dark" name="company_name" placeholder="Company Name" value="{{$company->company_name ?? ''}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Company Phone</label>
                                            <input type="text" class="form-control text-dark" name="company_phone" placeholder="Company Phone" value="{{ $company->company_phone ?? '' }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Company Email</label>
                                            <input type="text" class="form-control text-dark" name="company_email" placeholder="Company Email" value="{{ $company->company_email ?? '' }}" readonly>
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label class="form-label">Password</label>--}}
                                            {{--<input type="password" class="form-control text-dark" name="compeny_password" placeholder="Password" value="" required>--}}
                                        {{--</div>--}}

                                        <div class="form-group">
                                            <label class="form-label">Company Details <span class="form-label-small">56/100</span></label>
                                            <textarea class="form-control text-dark" name="company_details" rows="7" placeholder="Company Details" required>{!! $company->company_details ?? '' !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <select name="country_id" id="select-country" class="form-control select2  text-dark" value="{{ $company->country_id ?? '' }}" onchange="patchStates(this)">
                                                @foreach ($countries as $item)
                                                    <option value="{{$item->id}}" {{ (isset($company->country_id) AND ($item->id == $company->country_id) ) ? "selected" : ""}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">States</label>
                                            <select name="state_id" id="select-state" class="form-control select2 text-dark" value="{{ $company->state_id ?? '' }}" onchange="patchCities(this)">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Cities</label>
                                            <select name="city_id" id="select-city" class="form-control select2 text-dark" value="{{ $company->city_id ?? '' }}">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-switch-checkbox">
                                                <input type="checkbox" name="is_active" class="custom-switch-input"  {{ (isset($company->is_active) AND $company->is_active ) ? "checked" : ''}}>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Active</span>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <label class="form-label">Contact Person</label>
                                        <input type="text" name="contact_person_id" style="display:none;" value="{{ $contact_person->id ?? '' }}">
                                        <div class="form-group p-4">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control text-dark" name="contact_person_name" placeholder="Name" value="{{ $contact_person->name ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control text-dark" name="contact_person_email" placeholder="Email" value="{{ $contact_person->email ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control text-dark" name="contact_person_phone" placeholder="Phone" value="{{ $contact_person->phone ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Position</label>
                                                <input type="text" class="form-control text-dark" name="contact_person_position" placeholder="Position" value="{{ $contact_person->position ?? '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Company Logo</label>
                                            <input type="file" class="dropify" name="company_logo" data-height="180" data-default-file="{{ isset($company->company_logo) ? asset($company->company_logo) : ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Company Banner</label>
                                            <input type="file" class="dropify" name="company_cover" data-height="180" data-default-file="{{isset($company->company_cover) ? asset($company->company_cover) : ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Street Address</label>
                                            <input type="text" class="form-control text-dark" name="company_address" placeholder="Street Address" value="{{ $company->company_address ?? '' }}">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <div class="d-flex">
                                    <a href="/admin/companies/" class="btn btn-link">Cancel</a>
                                    <button type="submit" class="btn btn-success ml-auto">Save </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset("/")}}themes/fvft/assets/plugins/fileuploads/js/dropify.js"></script>
    <script src="/themes/fvft/assets/plugins/fileuploads/js/dropfy-custom.js"></script>
    <script src="{{env('APP_URL')}}js/location.js"></script>
    <script>
        const _token=$('meta[name="csrf-token"]')[0].content;
        const state_id={{isset($company->state_id)?$company->state_id:"null" }};
        const city_id={{isset($company->city_id)?$company->city_id:"null" }};
        const appurl="{{env('APP_URL')}}";
    </script>
@endsection
