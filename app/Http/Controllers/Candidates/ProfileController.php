<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use App\Models\Employe;
use App\Models\ExperienceLevel;
use App\Models\Job;
use App\Models\JobShift;
use App\Models\Language;
use App\Models\Skill;
use App\Models\State;
use App\Models\Training;
use App\Traits\Site\CandidateMethods;
use App\Traits\Site\ThemeMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ThemeMethods;
    use CandidateMethods;

    public function __construct()
    {
        $this->middleware('auth');
        $this->experiencelevels = ExperienceLevel::get();
        $this->educationlevels = EducationLevel::get();
        $this->job_shifts = JobShift::get();
        // $this->job_categories = \DB::table('job_categories')->get();
        // $this->countries = \DB::table('countries')->get();
        $this->trainings = Training::get();
        $this->skills = Skill::get();
        $this->states = State::get();
        $this->languages = Language::get();
        $this->jobs = Job::get();
    }

    public function profile()
    {
        $employ = Employe::where('user_id', Auth::user()->id)->with(['user:id,email','country:id,name','state:id,name','city:id,name','education_level:id,title','employeeSkills.skill:id,title','employeeLanguage.language:id,lang','experience.country:id,name','experience.job_category:id,functional_area','experience.job:id,title'])->first();
        return $this->client_view('candidates.profile.index',[
            'employ' => $employ,
        ]);
    }
}
