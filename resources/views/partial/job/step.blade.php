<?php 
use Illuminate\Support\Facades\Route;
$RouteName = Route::currentRouteName();
$_1st = $RouteName == 'company.newjob.get_job_detail';
$_2nd = $RouteName == 'company.newjob.get_applicant_form';
$_3rd = $RouteName == 'company.newjob.get_salary_and_facility_form';
$_4th = $RouteName == 'company.newjob.get_job_preview';
$_5th = $RouteName == 'company.newjob.get_approval_form';
// dd($RouteName);
// dd($_5th);
?>
<div class="card">
    <div class="card-body">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css"> --}}
        <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
            <div class="step  {{ $_1st || $_2nd || $_3rd || $_4th || $_5th ? 'completed' : '' }}">
                <div class="step-icon-wrap">
                    <div class="step-icon">1</div>
                </div>
                <h4 class="step-title">{{ strtoupper('Job Details') }}</h4>
            </div>
            <div class="step {{ $_2nd || $_3rd || $_4th || $_5th ? 'completed' : '' }}">
                <div class="step-icon-wrap">
                    <div class="step-icon">2</div>
                </div>
                <h4 class="step-title">{{ strtoupper('Applicant Qualification') }}</h4>
            </div>
            <div class="step {{ $_3rd || $_4th || $_5th ? 'completed' : '' }}">
                <div class="step-icon-wrap">
                    <div class="step-icon">3</div>
                </div>
                <h4 class="step-title">{{ strtoupper('Salary and Facility') }}</h4>
            </div>
            <div class="step {{ $_4th || $_5th ? 'completed' : '' }}">
                <div class="step-icon-wrap">
                    <div class="step-icon">4</div>
                </div>
                <h4 class="step-title">{{ strtoupper('Preview') }}</h4>
            </div>
            <div class="step {{ $_5th ? 'completed' : '' }}">
                <div class="step-icon-wrap">
                    <div class="step-icon">5</div>
                </div>
                <h4 class="step-title">{{ strtoupper('Final') }}</h4>
            </div>
        </div>
    </div>
</div>