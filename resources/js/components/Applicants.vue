<template>
    <div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="card">
                        <div class="item-card">
                            <div class="item-card-desc">
                                <a href="#" @click.prevent="setStatusFilter('')"></a>
                                <div class="item-card-img">
                                    <img src="/images/defaultimage.jpg" alt="img" class="br-tr-7 br-tl-7">
                                </div>
                                <div class="item-card-text">
                                    <h4 class="mb-0"> All <br> Applications<span>{{ status_count['total'] }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="card">
                        <div class="item-card">
                            <div class="item-card-desc">
                                <a href="#" @click.prevent="setStatusFilter('pending')"></a>
                                <div class="item-card-img">
                                    <img src="/images/defaultimage.jpg" alt="img" class="br-tr-7 br-tl-7">
                                </div>
                                <div class="item-card-text">
                                    <h4 class="mb-0">Unscreened Applications<span>{{ status_count['pending'] }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="card mb-xl-0">
                        <div class="item-card">
                            <div class="item-card-desc">
                                <a href="#" @click.prevent="setStatusFilter('shortlisted')"></a>
                                <div class="item-card-img">
                                    <img src="/images/defaultimage.jpg" alt="img" class="br-tr-7 br-tl-7">
                                </div>
                                <div class="item-card-text">
                                    <h4 class="mb-0">Shortlisted Applications<span>{{ status_count['shortlisted'] }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="card mb-xl-0">
                        <div class="item-card ">
                            <div class="item-card-desc">
                                <a href="#" @click.prevent="setStatusFilter('interviewed')"></a>
                                <div class="item-card-img">
                                    <img src="/images/defaultimage.jpg" alt="img" class="br-tr-7 br-tl-7">
                                </div>
                                <div class="item-card-text">
                                    <h4 class="mb-0">Interviewed Applications<span>{{ status_count['interviewed'] }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="card mb-xl-0">
                        <div class="item-card">
                            <div class="item-card-desc">
                                <a href="#" @click.prevent="setStatusFilter('accepted')"></a>
                                <div class="item-card-img">
                                    <img src="/images/defaultimage.jpg" alt="img" class="br-tr-7 br-tl-7">
                                </div>
                                <div class="item-card-text">
                                    <h4 class="mb-0">Selected Applications<span>{{ status_count['accepted'] }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="card mb-0">
                        <div class="item-card">
                            <div class="item-card-desc">
                                <a href="#" @click.prevent="setStatusFilter('rejected')"></a>
                                <div class="item-card-img">
                                    <img src="/images/defaultimage.jpg" alt="img" class="br-tr-7 br-tl-7">
                                </div>
                                <div class="item-card-text">
                                    <h4 class="mb-0">Rejected Applications<span>{{ status_count['rejected'] }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-12 d-flex justify-content-center">
                    <form action="" method="GET">
                        <div class="input-group input-icons">
                            <i class="fa fa-search-icon"></i>
                            <input type="text" class="form-control" v-model="filter.query"
                                   placeholder="Search Applicants" aria-label="Search Applicants"
                                   @keypress="setFilter" @keydown="setFilter"
                                   aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary rounded-0 ml-2" @click.prevent="showAdvancedFilter">Advanced Search</button>
                            </div>
                        </div>
                        <input type="hidden" name="limit" value="" class="form-control">
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 d-flex mb-4">

                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle rounded-0 mr-2" type="button" :disabled="!selected.length" data-toggle="dropdown" aria-expanded="false">
                                Set Application Status
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="javascript:void(0);" @click="bulkStatusUpdate('pending')">Unscreened</a>
                                <a class="dropdown-item" href="javascript:void(0);" @click="bulkStatusUpdate('shortlisted')">Shortlisted</a>
                                <a class="dropdown-item" href="javascript:void(0);" @click="bulkStatusUpdate('INTERVIEWED')">Interviewed</a>
                                <a class="dropdown-item" href="javascript:void(0);" @click="bulkStatusUpdate('SELECTEDFORINTERVIEW')">Selected</a>
                                <a class="dropdown-item" href="javascript:void(0);" @click="bulkStatusUpdate('REJECTED')">Rejected</a>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle rounded-0" type="button" :disabled="!selected.length" data-toggle="dropdown" aria-expanded="false">
                                Bulk Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Schedule Interview</a>
                                <a class="dropdown-item" href="#">Send Email</a>
                                <a class="dropdown-item" href="#">Send Message</a>
                                <a class="dropdown-item" href="#">Delete</a>
                                <a class="dropdown-item" href="javascript:void(0)" @click="bulkCvDownload()">Download CV</a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle rounded-0 mr-2 btn-sm" type="button" id="" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-filter mr-2"></i>All Job Category
                            </button>
                            <div class="dropdown-menu scrollable-menu" role="menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" @click.prevent="setCategoryFilter('')">All Categories</a>
                                <a v-for="(category, i) in job_categories" :key="i" class="dropdown-item" href="#" @click.prevent="setCategoryFilter(category.id)">{{ category.functional_area }}</a>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle rounded-0 mr-2 btn-sm" type="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-filter mr-2"></i>All Countries
                            </button>
                            <div class="dropdown-menu scrollable-menu" role="menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" @click.prevent="setCountryFilter('')">All Countries</a>
                                <a v-for="(country, i) in countries" :key="i" class="dropdown-item" href="#" @click.prevent="setCountryFilter(country.id)">{{ country.name }}</a>
                            </div>
                        </div>

                            <!--<div class="form-checkntjobs@gmail.com">-->
                                <!--<input type="checkbox" class="form-check-input" id="checkAll">-->
                                <!--<label for="" class="my-auto">Select All Applicants On This Page</label>-->
                            <!--</div>-->

                            <!--<div class="form-check">-->
                                <!--<input type="checkbox" class="form-check-input">-->
                                <!--<label for="" class="my-auto">Select All 2 Applicants On This Job</label>-->
                            <!--</div>-->
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered border-top mb-0">
                            <thead>
                            <tr>
                                <th >
                                    <!--<input type="checkbox" class="form-check rowCheck" name="applicationID[]" value="" data-id="">-->
                                    <label class="form-checkbox">
                                        <input type="checkbox" v-model="selectAll" @click="select">
                                        <i class="form-icon"></i>
                                    </label>
                                </th>
                                <th >S.N</th>
                                <th >Candidate</th>
                                <th >Contact</th>
                                <th >Job</th>
                                <th >Category</th>
                                <th >Applied On</th>
                                <th >Country</th>
                                <th >Profile Score</th>
                                <th >Experience</th>
                                <th >Education</th>
                                <th >Training</th>
                                <th >Language</th>
                                <th >Skill</th>
                                <th >Preferred Country</th>
                                <th >Preferred Job</th>
                                <th >Status</th>
                                <th >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(applicant, index) in applicants" :key="index" :data-id="applicant.id">
                                <td>
                                    <input type="checkbox" :value="applicant.id" v-model="selected">
                                    <!--<input type="checkbox" class="form-check rowCheck" name="applicationID[]" value="" data-id="">-->
                                </td>
                                <td>{{ index+1 }}</td>
                                <td style="width: 600px;">
                                    <span v-if="applicant.employe">
                                        {{ applicant.employe.full_name }}<br>
                                        Gender/Age: {{ applicant.employe.gender }}, 23<br>
                                        Email:{{ applicant.employe.user.email }}
                                       </span>
                                </td>
                                <td>
                                     <span v-if="applicant.employe">
                                    Phone1:{{ applicant.employe.mobile_phone }}<br>
                                    Phone2:{{ applicant.employe.mobile_phone2 }}
                                     </span>
                                </td>
                                <td>
                                    <span v-if="applicant.job">{{ applicant.job.title }}</span>
                                </td>
                                <td><span v-if="applicant.job">{{ applicant.job.job_category.functional_area }}</span></td>

                                <td>
                                    {{ applicant.created_at }}
                                </td>
                                <td>
                                    <span v-if="applicant.employe">{{ applicant.employe.country.name }}</span>
                                </td>
                                <td>
                                    <span v-if="applicant.employe">{{ applicant.employe.profile_score }} %</span>
                                </td>
                                <td>
                                    <span v-if="applicant.employe && applicant.employe.experience">
                                        <span v-for="(experience, i) in applicant.employe.experience" :key="i">
                                            <span v-if="i==0">
                                                {{ experience.job_category.functional_area }}, {{ experience.working_year + getYearForm(experience.working_year) }}, {{ experience.working_month + getMonthForm(experience.working_month) }}
                                            </span>
                                        </span>
                                    </span>
                                </td>
                                <td>
                                    <span v-if="applicant.employe.education_level">
                                        {{ applicant.employe.education_level.title }}
                                    </span>
                                </td>
                                <td>
                                    <span v-if="applicant.employe && applicant.employe.employee_trainings">
                                        <span v-for="(item, i) in applicant.employe.employee_trainings" :key="i">
                                            <span v-if="i==0">
                                                {{ item.training.title }}
                                            </span>
                                        </span>
                                    </span>
                                </td>
                                <td>
                                    <span v-if="applicant.employe && applicant.employe.employee_language">
                                        <span v-for="(item, i) in applicant.employe.employee_language" :key="i">
                                            <span v-if="i==0">
                                                {{ item.language.lang }}
                                            </span>
                                        </span>
                                    </span>
                                </td>
                                <td>
                                    <span v-if="applicant.employe && applicant.employe.employee_skills">
                                        <span v-for="(item, i) in applicant.employe.employee_skills" :key="i">
                                            <span v-if="i==0">
                                                {{ item.skill.title }}
                                            </span>
                                        </span>
                                    </span>
                                </td>
                                <td>
                                    <span v-if="applicant.employe && applicant.employe.country_preference">
                                        <span v-for="(countryPreference, i) in applicant.employe.country_preference" :key="i">
                                            <span v-if="i==0">
                                                {{ countryPreference.name }}
                                            </span>
                                        </span>
                                    </span>
                                </td>
                                <td>
                                    <span v-if="applicant.employe && applicant.employe.job_category_preference">
                                        <span v-for="(categoryPreference, i) in applicant.employe.job_category_preference" :key="i">
                                            <span v-if="i==0">
                                                {{ categoryPreference.functional_area }}
                                            </span>
                                        </span>
                                    </span>
                                </td>

                                <td class="applicantStatus">
                                    {{ capitalizeFirstLetter(applicant.status) }}
                                </td>
                                <td>
                                    <a href=""
                                       class="text-primary my-auto"><i class="fa fa-edit"></i></a>
                                    <a href=""
                                       class="text-primary my-auto"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-inline">
                        <label for="">Applicant Per Page</label>
                        <select name="limit" class="form-control rounded-0 bg-gray text-white">
                            <option value="All">All
                            </option>
                            <option value="10" >
                                10</option>
                            <option value="50">50
                            </option>
                            <option value="100" >100
                            </option>
                            <option value="250">250
                            </option>
                            <option value="500" >500
                            </option>
                            <option value="1000" >1000
                            </option>
                        </select>
                    </div>
                </div>
            </div>

        </div>


        <!--Advanced Filter-->
        <div class="modal fade" id="advancedFilter" tabindex="-1" role="dialog" aria-labelledby="advancedFilter" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document" style="width: 100%;">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title " id="newSkillModalLabel">Advanced Applicants Search</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0">
                        <form action="#" method="#" id="FilterForm">
                            <div class="card mb-1">
                                <div class="card-body bg-secondary">
                                    <div class="filter-section">
                                        <div class="row mb-1">
                                            <div class="col-md-6 d-flex">
                                                <select name="predefined_filter" class="form-control" @change="setAdvancedFilterValue">
                                                    <option value="">Select Filter</option>
                                                    <option v-for="applicant_filter in applicant_filters">{{ applicant_filter.filter_name }}</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 d-flex"></div>
                                        </div>
                                        <form action="" @submit.prevent="saveFilter">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="filter_name" class="form-control" id="filterName" placeholder="Filter Name" required>
                                                    <span class="" style="color: #1650e2">Save this setting for future use.</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <button v-if="filter_saving" type="button" class="btn btn-warning rounded-0"><i class="fa fa-spinner fa-spin"></i></button>
                                                    <button v-else type="submit" class="btn btn-warning rounded-0">Save Filter</button>
                                                    <a href="javascript:void(0);" class="btn btn-outline-warning rounded-0" id="ResetFilter">Reset Filter</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="search-section mx-auto">
                                        <div class="row mt-1">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Category</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="job_title" class="form-control select2-show-search"
                                                                    data-placeholder="All Job Title" id="jobTitle">
                                                                <option value="">All Job Categories</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Gender</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="gender" class="form-control select2-show-search"
                                                                    data-placeholder="Select Gender" id="gender">
                                                                <option value="">Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Applied Date (From)</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="from_date" class="form-control from_date" placeholder="25-01-2022" id="from_date">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Applied Date (To)</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="to_date" class="form-control to_date" placeholder="25-02-2022" id="to_date">

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Experience</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="d-flex">
                                                                <select name="experience" class="form-control select2-show-search w-60"
                                                                        data-placeholder="Select Experience" id="Experience">
                                                                    <option value="">Select Experience</option>
                                                                </select>
                                                                <label for="" class="w-40 my-auto">Years Min</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Education</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="education_level" class="form-control select2-show-search"
                                                                    data-placeholder="Select Education Level" id="EducationLevel">
                                                                <option value="">Select Education Level</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Skills</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="skills[]" class="form-control select2-show-search" id="Skills"
                                                                    multiple>
                                                                <option value="">Select Skills</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Application Status</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="application_status" class="form-control select2-show-search"
                                                                    data-placeholder="Select Application Status" id="ApplicationStatus">
                                                                <option value="">Select Application Status</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Profile Score</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="hidden" name="profile_score" id="profileScore">
                                                            <div id="profileScoreSlider">
                                                                <span id="rangeValue" tabindex="0" style="left:0">0%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Age Range</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="d-flex">
                                                                        <select name="min_age" class="form-control select2-show-search"
                                                                                data-placeholder="Min" id="MinAge">
                                                                            <option value="">Min</option>
                                                                        </select>
                                                                        <label for="" class="my-auto ml-1">years to</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="d-flex">
                                                                        <select name="max_age" class="form-control select2-show-search"
                                                                                data-placeholder="Max" id="MaxAge">
                                                                            <option value="">Max</option>
                                                                        </select>
                                                                        <label for="" class="my-auto ml-1">years</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Training</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="trainings[]" class="form-control select2-show-search" multiple
                                                                    id="Trainings">
                                                                <option value="">Select Trainings</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Language</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="languages[]" class="form-control select2-show-search" multiple
                                                                    id="Languages">
                                                                <option value="">Select Languages</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Preferred Job</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="preferred_jobs[]" class="form-control select2-show-search" multiple
                                                                    id="PreferredJobs">
                                                                <option value="">Select Preferred Job</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 my-auto">
                                                            <label for="" class="form-label">Preferred Country</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select name="preferred_countries[]" class="form-control select2-show-search"
                                                                    multiple id="PreferredCountries">
                                                                <option value="">Select Preferred Country</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center mx-auto">
                                                <button v-if="filter_submitting" class="btn btn-primary rounded-0"><i class="fa fa-spinner fa-spin"></i></button>
                                                <button v-else type="button" class="btn btn-primary rounded-0" @click.prevent="advanceFilter"><i class="fa fa-search"></i> Search Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CompanyService from "../services/CompanyService";
    import {Errors} from "../error";

    export default {
        name: "Applicants",
        data(){
            return{
                errors: new Errors(),
                filter_saving: false,
                filter_submitting: false,
                applicants_pg:{},
                applicants:'',

                // data sets
                status_count:'',
                job_categories:[],
                countries:[],
                applicant_filters:[],

                // filter
                filter:{
                    query: '',
                    application_status:'',
                    category:'',
                    country:'',
                },

                // selection
                selected: [],
                selectAll: false
            }
        },
        mounted() {
            this.getDataSets();
            this.getApplicants();
        },
        methods: {
            select() {
                this.selected = [];
                if (!this.selectAll) {
                    for (let i in this.applicants) {
                        this.selected.push(this.applicants[i].id);
                    }
                }
            },

            async getDataSets(){
                const response = await CompanyService.getDataSets();
                if (response.data.success === true){
                    this.job_categories = response.data.data.job_categories;
                    this.countries = response.data.data.countries;
                    this.status_count = response.data.data.status_count;
                    this.applicant_filters = response.data.data.applicant_filters;
                }
            },
            setStatusFilter(status){
                this.filter.application_status = status;
                this.getApplicants();
            },
            setCategoryFilter(status){
                this.filter.category = status;
                this.getApplicants();
            },
            setCountryFilter(status){
                this.filter.country = status;
                this.getApplicants();
            },
            saveFilter(){
                this.filter_saving = true;
            },
            advanceFilter(){
                this.filter_submitting = true;
            },
            setFilter: _.debounce(function () { 
                this.getApplicants()
            }, 800),

            async getApplicants(page=0) {
                let response = await CompanyService.getApplicants(page, JSON.stringify(this.filter));
                if (response.data.success === true){
                    this.applicants_pg = response.data.data.applicants;
                    this.applicants = response.data.data.applicants.data;
                }
            },

            showAdvancedFilter(){
                $("#advancedFilter").modal('show');
            },
            setAdvancedFilterValue(){

            },
            async bulkStatusUpdate(status){
                await Swal.fire({
                    text: 'Are you sure you want to perform bulk operation?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if(result.isConfirmed){
                        this.showBusySign();
                        let data = new FormData();
                        data.append('ids', this.selected);
                        data.append('applicantStatus', status);
                        CompanyService.updateBulkStatus(data)
                        .then((response) => {
                            if(response.data.success == false){
                                if(response.data.db_error){
                                    toastr.error(response.data.db_error);
                                } else if(response.data.error){
                                    toastr.error(response.data.error);
                                }
                            }
                            if(response.data.success == true){
                                var statuses = JSON.parse(response.data.statuses);
                                $.each(statuses, function(k,v){
                                    $.each(v, function(key, value){
                                        var tableRow = $('tr[data-id="'+key+'"]');
                                        $(tableRow).find(".applicantStatus").text(value);
                                    });
                                });
                                toastr.success(response.data.msg);
                                $("input:checkbox").prop('checked', false);
                            }
                            this.hideBusySign();
                        });
                    }
                });
                
            },

            async bulkCvDownload(){
                await Swal.fire({
                          text: 'Are you sure you want to perform bulk download?',
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonText: "Yes Download!",
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                    }).then((result) => {
                        if(result.isConfirmed){
                            console.log(this.selected);
                            this.showBusySign();
                            // const config = {
                            //     responseType: 'blob',
                            // };
                            let ids = new FormData();
                            ids.append('ids', this.selected);
                            
                            CompanyService.downloadBulkCv(ids)
                            .then((response) => {
                                 if(response.data.success==false){
                                     if(response.data.error){
                                         toastr.error(response.data.error.ids[0]);      
                                     }
                                 }
                                 if(!response.data.success==false){
                                    var blob = new Blob([response.data],{
                                     type: 'application/pdf'
                                    });
                                    var link = document.createElement('a');
                                    link.href = window.URL.createObjectURL(blob);
                                    link.download = "Applicants.pdf";
                                    link.click();
                                    toastr.success('Applicants CV Downloaded');
                                    $("input:checkbox").prop('checked', false);
                                 }
                                 
                                 this.hideBusySign();
                            });
                        }
                    });
            }
        }
    }
</script>

<style scoped>
    .item-card .item-card-desc .item-card-text {
        position: absolute;
        top: 25%;
        left: 0;
        right: 0;
        bottom: 0;
        text-align: center;
        color: #fff;
        z-index: 2;
        align-items: center;
        vertical-align: middle;
    }

    .item-card-text h4 {
        font-size: 14px;
        font-weight: 600;
        text-transform: none;
    }

    .table-bordered, .text-wrap table {
        border: 1px solid #e8ebf3 !important;
    }

    .item-card-text span {
        font-size: 25px;
        display: block;
        margin: 0.5rem;
        font-weight: 400;
    }
    .scrollable-menu{
        height: auto;
        max-height: 200px;
        overflow-y: auto;
    }
</style>
