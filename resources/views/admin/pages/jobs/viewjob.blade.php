@extends('admin.layouts.master')
@section('main')
<div class="row">
    <div class="col-xl-6">
        <div class="row">
            <div class="card m-b-20">
                <div class="card-header">
                    <h3 class="card-title tempcolor">{{ strtoupper('Job Details') }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="title" class="form-label">Job Title</label>
                            </div>
                            <div class="col-md-8">
                               {{ $job->title }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="company" class="form-label">Company Name</label>
                            </div>
                            <div class="col-md-8">
                                {{ $job->company != null && isset($job->company) ? $job->company->company_name : '' }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="no_of_employee" class="form-label">No of Employee</label>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="male_employee" class="form-label">Male</label>
                                        <input type="text" class="form-control" value="{{ $job->no_of_male }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="female_employee" class="form-label">Female</label>
                                        <input type="text" class="form-control" value="{{ $job->no_of_female }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="any_employee" class="form-label">Any</label>
                                        <input type="text" class="form-control" value="{{ $job->any_gender }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="job_category" class="form-label">Job Category&nbsp;<span
                                        class="req"></span></label>
                            </div>
                            <div class="col-md-8">
                               @php
                               $category = DB::table('job_categories')->where('id',$job->job_categories_id);
                            //    dd($category->exists());
                               $category_name = $category != null && $category->exists() ? $category->first()->functional_area : '';
                               @endphp
                               {{ $category_name }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="working_hours" class="form-label">Working Hours Per Day</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group">
                                   {{ $job->working_hours }} {{ $job->working_hours != null ? 'hrs/day' : 'Not Available' }}
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="working_days" class="form-label">Working Days Per Week</label>
                            </div>
                            <div class="col-md-8">
                                {{ $job->working_days }}  {{ $job->working_days != null ? 'days/week' : 'Not Available' }}
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="deadline" class="form-label">Apply Before</label>
                            </div>
                            <div class="col-md-8">
                                {{ date('Y-m-d', strtotime($job->expiry_date)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label" for="status">Status</label>
                            </div>
                            <div class="col-md-8">
                                {{ $job->status }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Country</label>
                            </div>
                            <div class="col-md-8">
                                @php
                                 $country = DB::table('countries')->where('id', $job->country_id);
                                 $country_name = $country != null && $country->exists() ? $country->first()->name : ''; 
                                @endphp
                                {{ $country_name }}
                            </div>
                        </div>
    
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">States</label>
                            </div>
                            <div class="col-md-8">
                                @php
                                    $state = DB::table('states')->where('id', $job->state_id);
                                    $stateName = $state != null && $state->exists() ? $state->first()->name : '';
                                @endphp
                                {{ $stateName }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">Cities</label>
                            </div>
                            <div class="col-md-8">
                                @php
                                    $city = DB::table('cities')->where('id', $job->city_id);
                                    $cityName = $city != null && $city->exists() ? $city->first()->name : '';
                                @endphp
                                {{ $cityName }}
                            </div>
                        </div>
    
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="contract" class="form-label">Contract Period</label>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="contract_year" class="form-control select2">
                                            <option value="">Select Year</option>
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="contract_month" class="form-control select2">
                                            <option value="">Select Month</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                {{-- <textarea name="contract_description" class="form-control mt-3" cols="10"
                                    rows="5"></textarea> --}}
                                <div class="require text-danger contract_year"></div>
                                <div class="require text-danger contract_month"></div>
                                {{-- <div class="require text-danger contract_description"></div> --}}
                            </div>
    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="job_description" class="form-label">Job Description</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" class="form-control" name="job_description" id="jobdescriptionID">
                                <input type="hidden" class="form-control" name="job_description_intro"
                                    id="job_description_intro">
                                <div id="JobDescription" style="min-height: 15rem;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="custom-switch-checkbox">
                            <input type="checkbox" name="is_active" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Active</span>
                        </label>
                        <label class="custom-switch-checkbox">
                            <input type="checkbox" name="is_featured" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Featured</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="card m-b-20">
                <div class="card-header">
                    <h3 class="card-title tempcolor">{{ strtoupper('Salary Facility') }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="salary" class="form-label">Salary</label>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" name="country_salary" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label countrylabel">USD</label>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-8">
                                                <input type="text" name="nepali_salary" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label">NPR</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="require text-danger country_salary"></div>
                                    <div class="require text-danger nepali_salary"></div>
                                </div>
                                <div class="form-group mt-2">
                                    <label class="custom-switch-checkbox">
                                        <input type="checkbox" name="hide_salary" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Hide Salary</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="accomodation" class="form-label">Accomodation</label>
                            </div>
                            <div class="col-md-8">
                                <select name="accomodation" class="form-control select2">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <div class="require text-danger accomodation"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="food" class="form-label">Food</label>
                            </div>
                            <div class="col-md-8">
                                <select name="food" class="form-control select2">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <div class="require text-danger food"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="annual_vacation" class="form-label">Annual Vacation</label>
                            </div>
                            <div class="col-md-8">
                                <select name="annual_vacation" class="form-control select2">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <div class="require text-danger annual_vacation"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="over_time" class="form-label">Over Time</label>
                            </div>
                            <div class="col-md-8">
                                <select name="over_time" class="form-control select2">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                <div class="require text-danger over_time"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="requirements" class="form-label">Other Benefits</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" class="form-control" name="other_benefits" id="benefitID">
                                <input type="hidden" class="form-control" name="benefit_intro" id="benefit_intro">
                                <div id="benefitEditor" style="min-height: 15rem;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="row ml-2">
            <div class="card m-b-20">
                <div class="card-header">
                    <h3 class="card-title tempcolor">{{ strtoupper('Applicant Qualification') }}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="education_level" class="form-label">Minimum Qualification</label>
                            </div>
                            <div class="col-md-8">
                                <select name="education_level" class="form-contorl select2-flag-search">
                                    <option value="">Select Qualification</option>
                                    {{-- @foreach ($educationlevels as $educationlevel)
                                        <option value="{{ $educationlevel->id }}">{{ $educationlevel->title }}
                                        </option>
                                    @endforeach --}}
                                </select>
                                <div class="require text-danger education_level"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="year_of_experience" class="form-label">Year of Experience</label>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="min_experience" class="form-control select2">
                                            <option value="">Min</option>
                                            @for ($i = 0; $i <= 10; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="max_experience" class="form-control select2">
                                            <option value="">Max</option>
                                            @for ($i = 1; $i <= 15; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="require text-danger min_experience"></div>
                                <div class="require text-danger max_experience"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="age_requirement" class="form-label">Age Requirement</label>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="min_age" class="form-control select2">
                                            <option value="">Min</option>
                                            @for ($i = 18; $i <= 25; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="max_age" class="form-control select2">
                                            <option value="">Max</option>
                                            @for ($i = 18; $i <= 50; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="require text-danger min_age"></div>
                                <div class="require text-danger max_age"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="skils" class="form-label">Skills</label>
                            </div>
                            <div class="col-md-8">
                                <select name="skills[]" class="form-control select2" multiple="multiple">
                                    {{-- @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                                    @endforeach --}}
                                </select>
                                <div class="require text-danger skills"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="requirements" class="form-label">Other Requirements</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" class="form-control" name="other_requirements"
                                    id="requirementID">
                                <input type="hidden" class="form-control" name="requirement_intro"
                                    id="requirement_intro">
                                <div id="editor" style="min-height: 15rem;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ml-2">
            <div class="card m-b-20">
                <div class="card-header">
                    <h3 class="card-title tempcolor">{{ strtoupper('Picture') }}</h3>
                </div>
                <div class="card-body">
                    {{-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="form-label">Upload Picture(Max Number is 5)</label>
                            </div>
                            <div class="col-md-8">
                                <input type="file" class="form-control dropify" name="picture[]"
                                    data-allowed-file-extensions="png jpg jpeg" id="Picture" multiple>
                                <div class="require text-danger picture"></div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="form-label">Upload Featured Image</label>
                            </div>
                            <div class="col-md-8">
                                <input type="file" class="form-control dropify" name="feature_image"
                                    data-allowed-file-extensions="png jpg jpeg">
                                <div class="require text-danger feature_image"></div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>

           
        </div>
    </div>
</div>
@endsection