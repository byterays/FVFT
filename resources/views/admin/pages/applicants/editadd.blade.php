@extends('admin.layouts.master')
@section('main')
{{-- @dd($candidate?$candidate); --}}
    <div class="page-header">
        <h4 class="page-title">{{$action}} Applicants</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Modules</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="/admin/applicants/">Applicants</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/admin/applicants/save" method="post"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="application_id" value="{{$application->id}}">
                            <div   class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{$action}} Applicants</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="profile-log-switch">
                                                        <div class="fade show active ">
                                                            <div class="table-responsive border ">
                                                                <table class="table row table-borderless w-100 m-0 ">
                                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                                        <tr>
                                                                            <td><strong>Full Name :</strong> {{ $candidate->full_name }} {{ $candidate->middle_name }} {{ $candidate->last_name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Location :</strong> {{ \DB::table('countries')->find($candidate->country_id)->name }}</td>
                                                                        </tr>

                                                                    </tbody>
                                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                                        <tr>
                                                                            <td><strong>Email :</strong> {{ $candidate_user->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><strong>Phone :</strong> {{ $candidate->mobile_phone }}</td> 
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="form-group">
                                                                   
                                                                    <div class="custom-switches-stacked">
                                                                        <div class="form-label">Status</div>
                                                                        <label class="custom-switch">
                                                                            <input type="radio" name="status" value="pending" class="custom-switch-input"  {{isset($application->status)?$application->status=="pending"?"checked":'':'checked'}}>
                                                                            <span class="custom-switch-indicator"></span>
                                                                            <span class="custom-switch-description">Pending</span>
                                                                        </label>
                                                                        <label class="custom-switch">
                                                                            <input type="radio" name="status" value="onprocess" class="custom-switch-input"  {{isset($application->status)?$application->status=="onprocess"?"checked":'':'checked'}}>
                                                                            <span class="custom-switch-indicator"></span>
                                                                            <span class="custom-switch-description">ON Process</span>
                                                                        </label>
                                                                        <label class="custom-switch">
                                                                            <input type="radio" name="status" value="accepted" class="custom-switch-input"  {{isset($application->status)?$application->status=="accepted"?"checked":'':'checked'}}>
                                                                            <span class="custom-switch-indicator"></span>
                                                                            <span class="custom-switch-description">Accepted</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="card-body">
										<div class="bg-light p-6 text-center">
											<img class="" alt="Product" src="{{ env('APP_URL').$job->feature_image_url}}" width="300px">
										</div>
										
										<div class="border mt-4 mb-4">
											<h4 class="m-b-0 m-t-20">Description</h4>
											<p>{{ $job->description}}</p>
										</div>
										<h4 class="mb-4">Info</h4>
										<div class="pro_detail border p-4">
											<h5 class="m-l-0 m-t-10">General</h5>
											<ul class="list-unstyled mb-0">
												<li class="row">
													<div class="col-sm-3 text-muted mb-2">Job Catagory</div>
													<div class="col-sm-3 mb-2">{{ DB::table('job_categories')->find($job->job_categories_id)->functional_area }}</div>
												</li>
												<li class=" row">
													<div class="col-sm-3 text-muted mb-2">Job Sifts</div>
													<div class="col-sm-3 mb-2">{{ @DB::table('job_shifts')->find($job->job_shift_id)->job_shift }}</div>
												</li>
												<li class="p-b-20 row">
													<div class="col-sm-3 text-muted mb-2">Salary Range</div>
													<div class="col-sm-3 mb-2"> Rs.{{ $job->salary_from }} - {{ $job->salary_to}}</div>
												</li>
												
											</ul>
										</div>
									</div>
            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <div class="d-flex">
                                        <a href="/admin/candidates/" class="btn btn-link">Back</a>
                                        <button type="submit" class="btn btn-success ml-auto">Save </button>
                                    </div>
                                </div>
                            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script src="{{env('APP_URL')}}js/location.js"></script>
<script>
    const _token=$('meta[name="csrf-token"]')[0].content;
    const state_id={{isset($candidate->state_id)?$candidate->state_id:"3871" }};
    const city_id={{isset($candidate->city_id)?$candidate->city_id:"null" }};
    const appurl="{{env('APP_URL')}}";
</script>
@endsection