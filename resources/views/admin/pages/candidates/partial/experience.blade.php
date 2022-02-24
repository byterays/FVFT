<div class="form-group">
    <div class="form-label">Experience</div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Country</label>
                <select name="country_id[]" class="form-control select2" id="">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Job Category</label>
                <select name="job_category_id[]" class="form-control select2" id="">
                    <option value="">Select Job Category</option>
                    @foreach ($job_categories as $job_category)
                        <option value="{{ $job_category->id }}">
                            {{ $job_category->functional_area }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Job Title</label>
                <select name="job_title[]" class="form-control select2" id="">
                    <option value="">Select Job Title</option>
                    @foreach ($jobs as $job)
                        <option value="{{ $job->id }}">{{ $job->title }}</option>
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
                            $dyear = old('year');
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
                            $dmonth = old('month');
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