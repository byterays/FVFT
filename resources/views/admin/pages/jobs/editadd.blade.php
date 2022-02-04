@extends('admin.layouts.master')
@section('main')
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
            <form action="/admin/jobs-save" method="post">
                @csrf
                            <div   class="card">
                                <div class="card-header">
                                    <h3 class="card-title">New Job</h3>
                
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="Job Title">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Company</label>
                                                <div class="form-group">
                                                    <select class="form-control select2-flag-search" data-placeholder="Select Company" name="company">
                                                        @foreach ($companies as $company)
                                                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="form-label">Description <span class="form-label-small">56/100</span></label>
                                                <textarea class="form-control" name="description" rows="7" placeholder="Description."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Benefits <span class="form-label-small">56/100</span></label>
                                                <textarea class="form-control" name="Bbenefits" rows="5" placeholder="Benefits."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Number of Positions</label>
                                                <input type="number" class="form-control" name="number-of-position" placeholder="Number of Positions">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Salary From</label>
                                                <input type="number" class="form-control" name="salary-from" placeholder="Salary From">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Salary To</label>
                                                <input type="number" class="form-control" name="salary-to" placeholder="Salary To">
                                            </div>
                                            <div class="form-group">
                                                <label class="custom-switch-checkbox">
                                                    <input type="checkbox" name="is_featured"  class="custom-switch-input" >
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Hide Salary</span>
                                                </label>
                                                </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Featured Image</label>
                                                <input type="file" class="dropify" name="feature_image" data-height="180">
                                                
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
                                            <div class="form-group">
                                                <label class="form-label">Job Category</label>
                                                <div class="form-group">
                                                    <select class="form-control select2-flag-search" name="category" data-placeholder="Select Category">
                                                        @foreach ($job_categories as $category)
                                                            <option value="{{$category->id}}">{{$category->functional_area}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Job Sift</label>
                                                <div class="form-group">
                                                    <select class="form-control select2-flag-search" name="job_shift" data-placeholder="Select Contry">
                                                        @foreach ($job_shifts as $shift)
                                                        <option value="{{$shift->id}}">{{$shift->job_shift}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label">Education Level</label>
                                                <div class="form-group">
                                                    <select class="form-control select2-flag-search" name="educationlevel" data-placeholder="Select Contry">
                                                        @foreach ($educationlevels as $educationlevel)
                                                            <option value="{{$educationlevel->id}}">{{$educationlevel->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Experience</label>
                                                <div class="form-group">
                                                    <select class="form-control select2-flag-search" name="experiencelevel" data-placeholder="Select Contry">
                                                        @foreach ($experiencelevels as $experience)
                                                            <option value="{{$experience->id}}">{{$experience->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
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