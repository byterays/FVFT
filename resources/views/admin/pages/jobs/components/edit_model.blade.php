<div id="EditJob{{$job->id}}" class="modal fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header pd-x-20">
                <h6 class="modal-title">{{$action}} Job </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/admin/jobs-save" method="post">
            <div class="modal-body pd-20">
                    @csrf
                    <input type="number" class="form-control" name="id" value="{{$job->id}}" style="display: none;">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Job Title" value="{{$job->title}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Company</label>
                                <div class="form-group">
                                    <select class="form-control select2-flag-search" data-placeholder="Select Company" name="company_id">
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}" {{$job->company_id==$company->id?'selected':''}}>{{$company->compeny_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Description <span class="form-label-small">56/100</span></label>
                                <textarea class="form-control" name="description" rows="7" placeholder="Description.">{{$job->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Benefits <span class="form-label-small">56/100</span></label>
                                <textarea class="form-control" name="Bbenefits" rows="5" placeholder="Benefits.">{{$job->benefits}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Number of Positions</label>
                                <input type="number" class="form-control" name="number-of-position" placeholder="Number of Positions" value="{{$job->num_of_positions}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Salary From</label>
                                <div class="d-flex align-items-center">
                                    <span class="p-1">Rs.</span>
                                    <input type="number" class="form-control" name="salary-from" placeholder="Salary From" value="{{$job->salary_from}}">
                                    <span class="p-1">/-</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Salary To</label>
                                <div class="d-flex align-items-center">
                                    <span class="p-1">Rs.</span>
                                    <input type="number" class="form-control" name="salary-to" placeholder="Salary To" value="{{$job->salary_to}}">
                                    <span class="p-1">/-</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="custom-switch-checkbox">
                                    <input type="checkbox" name="hide_salary"  class="custom-switch-input" @if(isset($job->hide_salary))checked=""@endif>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Hide Salary</span>
                                </label>
                                </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Featured Image</label>
                                <input type="file" id="feature_image{{$job->id}}" class="dropify" name="feature_image" value="{{$job->feature_image_url}}" data-height="180">
                                
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
                                    <input type="checkbox" name="is_active" class="custom-switch-input" @if(isset($job->is_active))checked=""@endif>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Active</span>
                                </label>
                                <label class="custom-switch-checkbox">
                                    <input type="checkbox" name="is_featured"  class="custom-switch-input" @if(isset($job->is_featured))checked=""@endif>
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Featured</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Job Category</label>
                                <div class="form-group">
                                    <select class="form-control select2-flag-search" name="category" data-placeholder="Select Category">
                                        @foreach ($job_categories as $category)
                                            <option value="{{$category->id}}" {{$job->job_categories_id==$category->id?'selected':''}}>{{$category->functional_area}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Job Sift</label>
                                <div class="form-group">
                                    <select class="form-control select2-flag-search" name="job_shift" data-placeholder="Select Contry">
                                        @foreach ($job_shifts as $shift)
                                        <option value="{{$shift->id}}" {{$job->job_shift_id==$shift->id?'selected':''}}>{{$shift->job_shift}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Education Level</label>
                                <div class="form-group">
                                    <select class="form-control select2-flag-search" name="educationlevel" data-placeholder="Select Contry">
                                        @foreach ($educationlevels as $educationlevel)
                                            <option value="{{$educationlevel->id}}" {{$job->education_level_id==$educationlevel->id?'selected':''}}>{{$educationlevel->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Experience</label>
                                <div class="form-group">
                                    <select class="form-control select2-flag-search" name="experiencelevel" data-placeholder="Select Contry">
                                        @foreach ($experiencelevels as $experience)
                                            <option value="{{$experience->id}}" {{$job->job_experience_id==$experience->id?'selected':''}}>{{$experience->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save </button>
            </div>
        </form>
        </div>
    </div><!-- modal-dialog -->
</div>