<div class="row">
    <div class="col-md-12">
        <div class="card m-b-20">
            <div class="card-header">
                @if (Request::is('company/profile'))
                    <div class="col-md-6">
                        <h3>{{ strtoupper('Picture') }}</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ $viewRoute }}" class="btn btn-success mr-auto">View Profile</a>
                    </div>
                @else
                <h3 class="card-title">{{ strtoupper('Picture') }}</h3>
                @endif


            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group company_logo" id="company_logo">
                            <label for="">Display Picture</label>
                            <input type="file" name="company_logo"
                                data-default-file="{{ $company->company_logo != null && file_exists($company->company_logo) ? env('APP_URL') . $company->company_logo: '' }}"
                                class="dropify" data-allowed-file-extensions="png jpg jpeg" data-height="180">
                            <div class="require text-danger profile_picture"></div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group company_logo">
                            <label for="">Cover Picture</label>
                            <input type="file" name="company_cover" data-default-file="{{ env('APP_URL').$company->company_cover }}"
                                class="dropify" data-height="180" data-allowed-file-extensions="png jpg jpeg">
                            <div class="require text-danger full_picture"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">{{ strtoupper('Basic Information') }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label" for="company_name">Company Name&nbsp;<span
                                    class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $company->company_name }}"
                                id="company_name" name="company_name" placeholder="Enter Company Name">
                            <div class="require text-danger company_name"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="industry_category">Industry Category&nbsp;<span
                                    class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="industry_id" class="form-control select2">
                                <option value="">Select Industry Category</option>
                                @foreach ($industries as $industry)
                                    <option value="{{ $industry->id }}"
                                        {{ $industry->id == $company->industry_id ? 'selected' : '' }}>
                                        {{ $industry->title }}</option>
                                @endforeach
                            </select>
                            <div class="require text-danger industry_id"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="ownership">Ownership&nbsp;<span class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="ownership" class="form-control select2">
                                <option value="">Select Ownership</option>
                                <option value="Private" {{ $company->ownership == 'Private' ? 'selected' : '' }}>
                                    Private</option>
                                <option value="Public" {{ $company->ownership == 'Public' ? 'selected' : '' }}>
                                    Public</option>
                                <option value="Government"
                                    {{ $company->ownership == 'Government' ? 'selected' : '' }}>Government
                                </option>
                                <option value="Non Profit"
                                    {{ $company->ownership == 'Non Profit' ? 'selected' : '' }}>Non Profit
                                </option>
                            </select>
                            <div class="require text-danger ownership"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="no_of_employee">Number of Employee&nbsp;<span
                                    class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="no_of_employee" value="{{ $company->no_of_employee }}"
                                class="form-control" placeholder="eg, 1-50, 51-200">
                            <div class="require text-danger no_of_employee"></div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Operating Since&nbsp;<span
                                    class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control datetime" value="{{ $company->operating_since }}"
                                name="operating_since" readonly id="">
                            <div class="require text-danger operating_since"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_introduction">Company Introduction</label>
                    <input type="hidden" class="form-control" name="company_introduction" id="body_id"
                        value="{{ isset($company->company_details) ? $company->company_details : null }}">
                    <input type="hidden" class="form-control" name="html_content_intro" id="html_content_intro"
                        value="{{ isset($company->html_content_intro) ? $company->html_content_intro : null }}">
                    <div id="editor" style="min-height: 15rem;">
                    </div>

                </div>
                <div class="form-group">
                    <label for="company_services">Company Services</label>
                    <input type="hidden" class="form-control" name="company_services" id="company_service_id"
                        value="{{ isset($company->company_services) ? $company->company_services : null }}">
                    <input type="hidden" class="form-control" name="html_content_service" id="html_content_service"
                        value="{{ isset($company->html_content_service) ? $company->html_content_service : null }}">
                    <div id="companyServices" style="min-height: 20rem;">
                    </div>

                </div>
                <div class="form-group">
                    <label class="custom-switch-checkbox">
                        <input type="checkbox" name="is_active" class="custom-switch-input"
                            {{ $company->is_active ? 'checked' : '' }}>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Active</span>
                    </label>
                    <label class="custom-switch-checkbox">
                        <input type="checkbox" name="is_featured" class="custom-switch-input"
                            {{ $company->is_featured ? 'checked' : '' }}>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Featured</span>
                    </label>
                </div>

            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-xl-6">

        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">{{ strtoupper('Company Contact Information') }}</h3>

            </div>
            <div class="card-body mb-0">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="country" class="form-label">Country</label>
                        </div>
                        <div class="col-md-8">
                            <select name="country_id" id="select-country" class="form-control select2"
                                value="{{ isset($company->country_id) ? $company->country_id : '' }}"
                                onchange="patchStates(this)">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ $company->country_id == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State/Province</label>
                        </div>
                        <div class="col-md-8">
                            <select name="state_id" id="select-state" class="form-control select2"
                                value="{{ isset($company->state_id) ? $company->state_id : '' }}"
                                onchange="patchCities(this)">
                                <option value="">Select State/Province</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="state" class="form-label">City</label>
                        </div>
                        <div class="col-md-8">
                            <select name="city_id" id="select-city" class="form-control select2"
                                value="{{ isset($company->city_id) ? $company->city_id : '' }}">
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="address">Address</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="company_address" value="{{ $company->company_address }}"
                                class="form-control" placeholder="Enter Company Address">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="phn">Company Phone Number</label>
                        </div>
                        <div class="col-md-2">
                            <select name="dial_code" class="form-control select2">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->phonecode }}"
                                        {{ $company->dialcode1 == $country->phonecode ? 'selected' : '' }}>
                                        {{ $country->phonecode }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="mobile_phone1" class="form-control"
                                placeholder="Enter Phone Number1" value="{{ $company->mobile_phone1 }}">
                            <input type="text" name="mobile_phone2" class="form-control mt-3"
                                placeholder="Enter Phone Number2" value="{{ $company->mobile_phone2 }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="company_email">Company Email ID</label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="company_email"
                                placeholder="Enter Company Email ID" value="{{ $company->company_email }}">
                            <div class="require text-danger company_email"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Company Website</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="company_website" class="form-control"
                                placeholder="Enter Website" value="{{ $company->company_website }}">
                            <div class="require text-danger company_website"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Company Facebook Page</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="company_fb_page" class="form-control"
                                placeholder="Enter Company Facebook Page Link"
                                value="{{ $company->company_fb_page }}">
                            <div class="require text-danger company_fb_page"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">{{ strtoupper('Contact Person Details') }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Full Name&nbsp;<span class="req">*</span></label>
                        </div>
                        <div class="col-md-2">
                            <select name="person_designation" class="form-control select2">
                                <option value="Mr"
                                    {{ $company->company_contact_person->person_designation == 'Mr' ? 'selected' : '' }}>
                                    Mr.</option>
                                <option value="Miss"
                                    {{ $company->company_contact_person->person_designation == 'Miss' ? 'selected' : '' }}>
                                    Miss.</option>
                                <option value="Mrs"
                                    {{ $company->company_contact_person->person_designation == 'Mrs' ? 'selected' : '' }}>
                                    Mrs.</option>
                            </select>
                            <div class="require text-danger person_designation"></div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                value="{{ $company->company_contact_person->name }}" name="full_name"
                                placeholder="Enter Full Name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Designation&nbsp;<span class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="contact_person_designation"
                                value="{{ $company->company_contact_person->position }}" class="form-control"
                                placeholder="Enter Designation, eg, HR, Manager">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Mobile Number</label>
                        </div>
                        <div class="col-md-2">
                            <select name="dialcode" class="form-control select2">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->phonecode }}"
                                        {{ $country->phonecode == $company->company_contact_person->dialcode ? 'selected' : '' }}>
                                        {{ $country->phonecode }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="contact_person_mobile"
                                placeholder="Enter Mobile Number"
                                value="{{ $company->company_contact_person->phone }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Email</label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" class="form-control"
                                value="{{ $company->company_contact_person->email }}" name="contact_person_email"
                                placeholder="Enter Email">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto mb-2">
        <button type="button" class="btn btn-success text-center" onclick="submitForm(event);">Submit</button>
    </div>
</div>
