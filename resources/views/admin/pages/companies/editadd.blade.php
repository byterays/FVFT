@extends('admin.layouts.master')
@section('main')
{{-- @dd($company?$company); --}}
    <div class="page-header">
        <h4 class="page-title">Add Job</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Modules</a></li>
            <li class="breadcrumb-item" aria-current="page">Jobs</li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/admin/companies/save" method="post">
                @csrf
                            <div   class="card">
                                <div class="card-header">
                                    <h3 class="card-title">New Job</h3>
                
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Company Name</label>
                                                <input type="text" class="form-control" name="compeny_name" placeholder="Job Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Company Phone</label>
                                                <input type="text" class="form-control" name="compeny_phone" placeholder="Job Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Company Email</label>
                                                <input type="text" class="form-control" name="compeny_email" placeholder="Job Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Password</label>
                                                <input type="text" class="form-control" name="password" placeholder="Job Title">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label">Industry</label>
                                                <div class="form-group">
                                                    <select class="form-control select2-flag-search" data-placeholder="Select Company" name="company">
                                                        {{-- @foreach ($industries as $industry)
                                                            <option value="{{$industry->id}}">{{$industry->compeny_name}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>

                
                                            <div class="form-group">
                                                <label class="form-label">Company Ditails <span class="form-label-small">56/100</span></label>
                                                <textarea class="form-control" name="description" rows="7" placeholder="Description."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <select name="country" id="select-countries" class="form-control select2 ">
                                                    <option value="br" >Brazil</option>
                                                    <option value="cz">Czech Republic</option>
                                                    <option value="de" >Germany</option>
                                                    <option value="pl" selected>Poland</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">States</label>
                                                <select name="state" id="select-countries" class="form-control select2 ">
                                                    <option value="br" >Brazil</option>
                                                    <option value="cz">Czech Republic</option>
                                                    <option value="de" >Germany</option>
                                                    <option value="pl" selected>Poland</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Cities</label>
                                                <select name="city" id="select-countries" class="form-control select2 ">
                                                    <option value="br" >Brazil</option>
                                                    <option value="cz">Czech Republic</option>
                                                    <option value="de" >Germany</option>
                                                    <option value="pl" selected>Poland</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="custom-switch-checkbox">
                                                    <input type="checkbox" name="is_active" class="custom-switch-input" checked="">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Active</span>
                                                </label>
                                                <label class="custom-switch-checkbox">
                                                    <input type="checkbox" name="is_featured"  class="custom-switch-input" >
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Featured</span>
                                                </label>
                                            </div>
                            
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <label class="form-label">Contact Person</label>
                                            <div class="form-group p-4">
                                                <div class="form-group">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="compeny_name" placeholder="Job Title">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="compeny_email" placeholder="Job Title">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="compeny_phone" placeholder="Job Title">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Position</label>
                                                    <input type="text" class="form-control" name="compeny_phone" placeholder="Job Title">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Company Logo</label>
                                                <input type="file" class="dropify" name="feature_image" data-height="180">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Company Banner</label>
                                                <input type="file" class="dropify" name="feature_image" data-height="180">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Location</label>
                                                <input type="text" class="form-control" name="compeny_name" placeholder="Job Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Location</label>
                                                <input type="text" class="form-control" name="compeny_name" placeholder="Job Title">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <div class="d-flex">
                                        <a href="javascript:void(0)" class="btn btn-link">Cancel</a>
                                        <button type="submit" class="btn btn-success ml-auto">Save </button>
                                    </div>
                                </div>
                            </div>
            </form>
        </div>
    </div>
@endsection