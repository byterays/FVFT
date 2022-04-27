<div class="row">
    <div class="col-md-12">
        <div class="card m-b-20">
            <div class="card-header">
                @if(Request::is('candidate/profile'))
                    <div class="col-md-6">
                        <h3>{{ strtoupper('Picture') }}</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ $viewRoute }}" class="btn btn-primary mr-auto float-right">View Profile</a>
                    </div>
                @else
                    <h3 class="card-title">{{ strtoupper('Picture') }}</h3>
                @endif


            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="form-group profilePicture" id="profilePicture">
                            <label for="">Profile Picture</label>
                            <input type="file" name="profile_picture"
                                   data-default-file="{{ $employ->avatar != null && file_exists($employ->avatar) ? asset($employ->avatar)  : '' }}"
                                   class="dropify" data-allowed-file-extensions="png jpg jpeg"
                                   data-height="180">
                            <div class="require text-danger profile_picture"></div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group profilePicture">
                            <label for="">Upload full picture</label>
                            <input type="file" name="full_picture[]" id="fullPicture" class="dropify"
                                   data-height="180" data-allowed-file-extensions="png jpg jpeg" multiple>
                            <div class="require text-danger full_picture"></div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <label for="">Full Pictures</label><br>
                        @if(!blank($employ->full_picture))
                            @php
                                $full_pictures = json_decode($employ->full_picture, true);
                            @endphp
                            @foreach($full_pictures as $full_picture)
                                <img src="{{ asset($full_picture) }}" alt="" width="65" class="rounded mb-2 mr-1">
                            @endforeach
                        @else
                            <p>Upload your full pictures.</p>
                        @endif
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
                <h3 class="card-title">{{ strtoupper('Personal Information') }}</h3>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label" for="first_name">First Name&nbsp;<span
                                    class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $employ->first_name }}"
                                   id="first_name" name="first_name" placeholder="Enter First Name">
                            <div class="require text-danger first_name"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Middle Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $employ->middle_name }}"
                                   id="middle_name" name="middle_name" placeholder="Enter Middle Name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="last_name" class="form-label">Last Name&nbsp;<span
                                    class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $employ->last_name }}"
                                   id="last_name" name="last_name" placeholder="Enter Last Name">
                            <div class="require text-danger last_name"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender&nbsp;<span
                                    class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="gender" class="form-control select2">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ $employ->gender == 'Male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="Female" {{ $employ->gender == 'Female' ? 'selected' : '' }}>Female
                                </option>
                                <option value="Other" {{ $employ->gender == 'Other' ? 'selected' : '' }}>Other
                                </option>
                            </select>
                            <div class="require text-danger gender"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="marital_status" class="form-label">Marital Status&nbsp;<span
                                    class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="marital_status" class="form-control select2">
                                <option value="">Select Marital Status</option>
                                <option value="Unmarried"
                                    {{ $employ->marital_status == 'Unmarried' ? 'selected' : '' }}>Unmarried
                                </option>
                                <option value="Married"
                                    {{ $employ->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Divorced"
                                    {{ $employ->marital_status == 'Divorced' ? 'selected' : '' }}>Divorced
                                </option>
                                <option value="Widow" {{ $employ->marital_status == 'Widow' ? 'selected' : '' }}>
                                    Widow</option>
                            </select>
                            <div class="require text-danger marital_status"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Date of Birth(Nepali B.S)</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control nepaliDatePicker"
                                   value="{{ $employ->dob_in_bs }}" name="nepali_dob" readonly
                                   placeholder="Enter Birth Date" id="nepali-datepicker">
                            <div class="require text-danger nepali_dob"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Date of Birth(English A.D)&nbsp;<span
                                    class="req">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control datetime" value="{{ $employ->dob }}"
                                   name="english_dob" readonly placeholder="Enter Birth Date">
                            {{-- <div class="require text-danger english_dob"></div> --}}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Height</label>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $employ->height }}"
                                       name="height" placeholder="000">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary">CM</button>
                                </div>
                            </div>
                            <div class="require text-danger height"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Weight</label>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $employ->weight }}"
                                       name="weight" placeholder="000">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary">KG</button>
                                </div>
                            </div>
                            <div class="require text-danger weight"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">{{ strtoupper('Contact Information') }}</h3>

            </div>
            <div class="card-body mb-0">
                <div class="form-group">
                    <label for="">Mobile Number&nbsp;<span class="req">*</span></label>
                    <div class="d-inline-flex">
                        <input type="text" name="mobile_number1" value="{{ $employ->mobile_phone }}"
                               class="form-control" placeholder="Enter Mobile Number 1">
                        <input type="text" name="mobile_number2" value="{{ $employ->mobile_phone2 }}"
                               class="form-control ml-3" placeholder="Enter Mobile Number 2">
                    </div>
                    <div class="require text-danger mobile_number1"></div>
                    <div class="require text-danger mobile_number2"></div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Email ID</label>
                    <input type="email" class="form-control" name="email" value="{{ $employ->user->email }}"
                           placeholder="Enter Email ID" readonly>
                    <div class="require text-danger email"></div>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Address</label>
                    <div class="row">
                        <div class="col-6">
                            <select name="state_id" class="form-control select2-show-search" id="states"
                                    onchange="patchGetDistricts(this)" value="{{ $employ->state_id }}">
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}"
                                        {{ $state->id == $employ->state_id ? 'selected' : '' }}>
                                        {{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <select name="district_id" class="form-control select2-show-search" id="districts" value="{{ $employ->district_id }}">
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <div class="col-6 mt-3">
                            <input type="text" name="municipality" value="{{ $employ->municipality }}"
                                   class="form-control" placeholder="Municipality">
                        </div>
                        <div class="col-6 mt-3">
                            <input type="text" name="ward" class="form-control" value="{{ $employ->ward }}"
                                   placeholder="Ward">
                        </div>
                        <div class="col-12 mt-3">
                            <input type="text" name="city_street" value="{{ $employ->city_street }}"
                                   class="form-control" placeholder="City/Street/Tole/Town/Village">
                        </div>
                        <div class="col-12 mt-3">
                            <input type="text" name="address_line" value="{{ $employ->address }}"
                                   class="form-control" placeholder="Address Line">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-xl-6">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">{{ strtoupper('Passport Details') }}</h3>
            </div>
            <div class="card-body mb-0">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Passport Number</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="passport_number" value="{{ $employ->passport_number }}"
                                   class="form-control" placeholder="Enter Passport Number">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">Passport Expiry Date</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="passport_expiry_date"
                                   value="{{ $employ->passport_expiry_date }}" class="form-control datetimepicker"
                                   placeholder="Enter Passport Expiry Date, eg:2020-01-02">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">{{ strtoupper('Experience') }}</h3>
            </div>
            <div class="card-body">
                <div class="card p-2" style="width: 15rem">
                    <div class="custom-controls-stacked d-inline-flex">
                        <label class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" value="Yes" name="is_experience"
                                {{ $employ->is_experience == 1 ? 'checked' : '' }}>
                            <span class="custom-control-label">Yes</span>
                        </label>
                        <label class="custom-control custom-radio ml-5">
                            <input type="radio" class="custom-control-input" value="No" name="is_experience"
                                {{ ($employ->is_experience == 0) ? 'checked' : '' }}>
                            <span class="custom-control-label">No</span>
                        </label>
                    </div>

                </div>
                <div class="row d-none" id="experienceData">
                    @if(json_decode($employ->experiences, true) != null)
                        @foreach (json_decode($employ->experiences, true) as $key => $employ_experience)
                            <div class="form-group">
                                <div class="form-label">Experience</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Country</label>
                                            <select name="country_id[]" class="form-control select2-show-search">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ $country->id == $employ_experience['country_id'] ? 'selected' : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Job Category</label>
                                            <select name="job_category_id[]" class="form-control select2-show-search" id="">
                                                <option value="">Select Job Category</option>
                                                @foreach ($job_categories as $job_category)
                                                    <option value="{{ $job_category->id }}"
                                                        {{ $job_category->id == $employ_experience['job_category_id'] ? 'selected' : '' }}>
                                                        {{ $job_category->functional_area }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Job Title</label>
                                            <select name="job_title[]" class="form-control select2-show-search" id="">
                                                <option value="">Select Job Title</option>
                                                @foreach ($jobs as $job)
                                                    <option value="{{ $job->id }}"
                                                        {{ $job->id == $employ_experience['job_title_id'] ? 'selected' : '' }}>
                                                        {{ $job->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Working Duration</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="working_year[]" class="form-control select2" id="">
                                                        <option value="">Year</option>
                                                        <?php
                                                        $dyear = $employ_experience['working_year'];
                                                        $year = date('Y');
                                                        $min = $year - 250;
                                                        $max = $year;
                                                        for ($i = $max; $i >= $min; $i--) {
                                                            $selected = $dyear == $i ? 'selected' : '';
                                                            echo "<option value='$i' $selected>$i</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="working_month[]" class="form-control select2" id="">
                                                        <option value="">Month</option>
                                                        <?php
                                                        $dmonth = $employ_experience['working_month'];
                                                        ?>
                                                        <?php for( $m = 1; $m <= 12; ++$m ) {
                                                        $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                                        $selected_month = $dmonth == $month_label ? 'selected' : '';
                                                        ?>
                                                        <option value="<?php echo $month_label; ?>" <?php echo $selected_month; ?>>
                                                            <?php echo $month_label; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @include('admin.pages.candidates.partial.experience')
                    @endif

                    <div id="appendExperience">

                    </div>

                    <div class="form-group">
                        <span class="cur_sor" id="addExperience">Add Experience <i
                                class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">{{ strtoupper('Education/Training/Skill') }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Education Level&nbsp;<span class="req">*</span></label>
                    <select name="education_level_id" class="form-control select2-show-search">
                        <option value="">Select Level</option>
                        @foreach ($educationLevels as $educationLevel)
                            <option value="{{ $educationLevel->id }}"
                                {{ $educationLevel->id == $employ->education_level_id ? 'selected' : '' }}>
                                {{ $educationLevel->title }}</option>
                        @endforeach
                    </select>
                    <div class="require text-danger education_level_id"></div>
                </div>
                <div class="form-group">
                    <label for="">Training</label>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="training[]" class="form-control select2 training" multiple="multiple"
                                    id="training">
                                <option value="">Select Training</option>
                                @if(json_decode($employ->trainings) != null)
                                    @foreach ($trainings as $training)
                                        <option value="{{ $training->id }}"
                                            {{ in_array($training->id, json_decode($employ->trainings)) ? 'selected' : '' }}>
                                            {{ $training->title }}</option>
                                    @endforeach
                                @else
                                    @include('admin.pages.candidates.partial.training')
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <span class="cur_sor" data-toggle="modal" data-target="#newTrainingModal">Add
                                Training <span><i class="fa fa-plus"></i></span></span>
                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <label for="">Skill</label>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="skill[]" class="form-control select2" multiple="multiple" id="skill">
                                <option value="">Select Skill</option>
                                @if(json_decode($employ->skills) != null)
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}"
                                            {{ in_array($skill->id, json_decode($employ->skills)) ? 'selected' : '' }}>
                                            {{ $skill->title }}</option>
                                    @endforeach
                                @else
                                    @include('admin.pages.candidates.partial.skill')
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <span class="cur_sor" data-toggle="modal" data-target="#newSkillModal">Add Skill
                                <span><i class="fa fa-plus"></i></span></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label">Language</div>
                    @if(json_decode($employ->languages, true) != null)
                        @foreach (json_decode($employ->languages, true) as $key => $employ_language)
                            <div class="row {{ !$loop->first ? 'mt-2' : '' }}">
                                <div class="col-md-6">
                                    <select name="language[]" class="form-control select2">
                                        <option value="">Select Language</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}"
                                                {{ $language->id == $employ_language['language_id'] ? 'selected' : '' }}>
                                                {{ $language->lang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="language_level[]" class="form-control select2">
                                        <option value="">Select Level</option>
                                        <option value="Very Good"
                                            {{ $employ_language['language_level'] == 'Very Good' ? 'selected' : '' }}>
                                            Very Good</option>
                                        <option value="Good"
                                            {{ $employ_language['language_level'] == 'Good' ? 'selected' : '' }}>Good
                                        </option>
                                        <option value="Fair"
                                            {{ $employ_language['language_level'] == 'Fair' ? 'selected' : '' }}>Fair
                                        </option>
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @include('admin.pages.candidates.partial.language')
                    @endif
                    <div id="appendLanguageDiv">

                    </div>
                    <div class="form-group mt-5">
                        {{-- <div class="form-group"> --}}
                        <a href="javascript:void()" class="btn btn-link" id="addLanguage">Add Language <i class="fa fa-plus"></i></a>
                        {{-- </div> --}}
                        {{-- <select name="" class="form-control select2" id="languageSelect">
                            <option value="">Select Language</option>
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}" data-id="{{ $language->id }}"
                                    data-name="{{ $language->lang }}">{{ $language->lang }}</option>
                            @endforeach
                        </select> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 mx-auto mb-2">
        <div class="card m-b-20">
            <div class="card-body">
                <button type="button" class="btn btn-primary text-center" onclick="submitForm(event);">Update Profile</button>
            </div>
        </div>
    </div>
</div>

@include('admin.partial.modals.newTrainingModal')
@include('admin.partial.modals.newSkillModal')
<!-- end row -->
{{-- End Form Here --}}
