@extends('themes.fvft.company.layouts.dashmaster')
@section('content')
    <div class="card-header">
        <h3 class="card-title">Add New Job</h3>
    </div>
    <form action="">
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
                            <input type="text" name="company_name" class="form-control"
                                value="{{ $company->company_name }}" readonly>
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
                        <input type="number" class="form-control" name="number-of-position"
                            placeholder="Number of Positions">
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
                            <input type="checkbox" name="is_featured" class="custom-switch-input">
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

                        <select name="country_id" id="select-country" class="form-control select2" {{-- value="{{ isset($job->country_id) ? $job->country_id : '' }}" --}}
                            onchange="patchStates(this)">
                            @foreach ($countries as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == old('country_id') ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">States</label>

                        <select name="state_id" id="select-state" class="form-control select2" {{-- value="{{ isset($job->state_id) ? $job->state_id : '' }}" --}}
                            onchange="patchCities(this)">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Cities</label>

                        <select name="city_id" id="select-city" class="form-control select2">
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="custom-switch-checkbox">
                            <input type="checkbox" name="is_featured" class="custom-switch-input">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Featured</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Job Category</label>
                        <div class="form-group">
                            <select class="form-control select2-flag-search" name="category"
                                data-placeholder="Select Category">
                                <option value="">Select Job Category</option>
                                @foreach ($job_categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->functional_area }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Job Sift</label>
                        <div class="form-group">
                            <select class="form-control select2-flag-search" name="job_shift"
                                data-placeholder="Select Job Shift">
                                @foreach ($job_shifts as $shift)
                                    <option value="{{ $shift->id }}">{{ $shift->job_shift }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Education Level</label>
                        <div class="form-group">
                            <select class="form-control select2-flag-search" name="educationlevel"
                                data-placeholder="Select Education Level">
                                @foreach ($education_levels as $educationlevel)
                                    <option value="{{ $educationlevel->id }}">
                                        {{ $educationlevel->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Experience</label>
                        <div class="form-group">
                            <select class="form-control select2-flag-search" name="experiencelevel"
                                data-placeholder="Select Contry">
                                @foreach ($experience_levels as $experience)
                                    <option value="{{ $experience->id }}">{{ $experience->title }}
                                    </option>
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
    </form>
@endsection
@section('script')
    <script>
        const _token = $('meta[name="csrf-token"]')[0].content;
        const state_id = {{ isset($job->state_id) ? $job->state_id : 'null' }};
        const city_id = {{ isset($job->city_id) ? $job->city_id : 'null' }};
        const appurl = "{{ env('APP_URL') }}";


        
    </script>
@endsection
