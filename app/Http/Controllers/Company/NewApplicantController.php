<?php

namespace App\Http\Controllers\Company;

use PDF;
use App\Models\Skill;
use App\Models\Country;
use App\Models\Employe;
use App\Models\Language;
use App\Models\Training;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Enum\ApplicantStatus;
use App\Models\JobPreference;
use App\Models\EducationLevel;
use App\Models\JobApplication;
use App\Models\ApplicantFilter;
use Illuminate\Support\Facades\DB;
use App\Traits\Site\CompanyMethods;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewApplicantController extends Controller
{
    use CompanyMethods;

    private $page = "company.newapplicant.";

    public function __construct()
    {
        $GLOBALS['page-name'] = "Applicant";
    }

    public function index(Request $request)
    {
        $applicants = JobApplication::when($request->status != null, function ($q) use ($request) {
            $q->where('status', $request->status);
        })->whereHas('job', function ($query) {
            return $query->whereHas('company', function ($query2) {
                return $query2->where('user_id', Auth::user()->id)->with(['employe', 'job']);
            });
        });
        $totalApplicant = $applicants->count();
        if ($request->limit != 'All') {
            $applicants = $applicants->paginate($request->limit ?? 3);
        } else {
            $applicants = $applicants->paginate($applicants->count());
        }
        $sn = ($applicants->perPage() * ($applicants->currentPage() - 1)) + 1;
        return $this->company_view($this->page . 'index', [
            "application_datas" => $this->__datas()['application_datas'],
            "applicants" => $applicants,
            "sn" => $sn,
            "totalApplicant" => $totalApplicant,
            "pagination" => $applicants->appends([
                'limit' => $request->limit,
                'status' => $request->status,
                'q' => $request->q,
            ]),
        ]);

    }

    public function advancedSearch(Request $request)
    {
        $jobPreferredCategories = JobPreference::where('job_preference_type', get_class(new JobCategory()))->pluck('job_preference_id')->toArray();
        $jobPreferredCountries = JobPreference::where('job_preference_type', get_class(new Country()))->pluck('job_preference_id')->toArray();
        return $this->company_view($this->page."advancedSearch", [
            "education_levels" => EducationLevel::select("id", "title")->get(),
            "skills" => Skill::select("id", "title")->get(),
            "trainings" => Training::select("id", "title")->get(),
            "languages" => Language::select("id", "lang")->get(),
            "preferredCategories" => JobCategory::whereIn("id", $jobPreferredCategories)->select("id", "functional_area")->get(),
            "preferredCountries" => Country::whereIn("id", $jobPreferredCountries)->select("id", "name")->get(),
            "applicantFilters" => ApplicantFilter::get(),
        ]);
    }

    public function bulkUpdateApplicationStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "ids" => ["required"],
            "applicantStatus" => ["required"],
        ]);
        if ($validator->fails()) {
            return response()->json(['db_error' => $validator->errors(), 'success' => false]);
        }
        try {
            DB::beginTransaction();
            $ids = $request->ids;
            $explodedIds = explode(",", $ids);
            foreach ($explodedIds as $explodedId) {
                $application = JobApplication::where('id', $explodedId);
                if ($application->exists()) {
                    $application = $application->first();
                    $application->update(['status' => $request->applicantStatus, 'interview_date' => null, 'interview_status' => 'notstarted', 'interview_time' =>null]);
                    $statuses[] = [
                        $application->id => ucfirst($application->status),
                    ];
                }
            }
            DB::commit();
            return response()->json(['msg' => "Application Status Updated", 'success' => true, 'statuses' => json_encode($statuses)]);
        } catch (\Exception$e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage(), 'success' => false]);
        }
    }

    public function bulkCvDownload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "ids" => ["required"],
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'success' => false]);
        }
        try {
            $ids = $request->ids;
            $exploded_ids = explode(",", $ids);
            foreach ($exploded_ids as $explodedId) {
                $application = JobApplication::where("id", $explodedId);
                if ($application->exists()) {
                    $application = $application->first();
                    $employe = Employe::where('id', $application->employ_id);
                    if ($employe->exists()) {
                        $employeId = $employe->value('id');
                        $employeIds[] = $employeId;
                    }
                }
            }
            $employeIds = array_unique($employeIds);
            $employes = Employe::whereIn("id", (array) $employeIds)->with([
                'user:id,email',
                'country:id,name',
                'state:id,name',
                'city:id,name',
                'education_level:id,title',
                'employeeSkills.skill:id,title',
                'employeeLanguage.language:id,lang',
                'experience.country:id,name',
                'experience.job_category:id,functional_area',
                'experience.industry:id,title',
            ])->get();
            // PDF Generation
            $pdf = PDF::loadView('themes.fvft.candidates.bulkcv', compact('employes'));
            if (!file_exists('uploads/cv/')) {
                mkdir('uploads/cv/', 0777, true);
            }
            $path = public_path('uploads/cv/');
            $fileName = 'Applicants.pdf';
            $pdf->save($path . $fileName);
            $pdf = public_path('uploads/cv/' . $fileName);
            return response()->download($pdf);
        } catch (\Exception$e) {
            return response()->json(['error' => $e->getMessage(), 'success' => false]);
        }
    }

    public function bulkApplicationDelete(Request $request)
    {
        try {
            DB::beginTransaction();
            $ids = $request->ids;
            $explodedIds = explode(",", $ids);
            JobApplication::destroy($explodedIds);
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Bulk Application Deleted']);
        } catch (\Exception$e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function bulkScheduleInterview(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'interview_date' => ['required'],
            'interview_time' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'success' => false]);
        }
        try{
            DB::beginTransaction();
            $ids = $request->ids;
            $explodedIds = explode(",", $ids);
            JobApplication::whereIn('id', $explodedIds)->update([
                'interview_date' => $request->interview_date,
                'interview_time' => $request->interview_time,
                'interview_status' => 'started',
                'status' => ApplicantStatus::SELECTEDFORINTERVIEW,
            ]);
            foreach($explodedIds as $eIds){
                $statuses[] = [
                    $eIds => ApplicantStatus::SELECTEDFORINTERVIEW,
                ];
            }
            
            DB::commit();
            return response()->json(['success' => true, 'msg' => 'Interview Status updated for selected applicants', 'statuses' => json_encode($statuses)]);
        } catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>false, 'error' => $e->getMessage()]);
        }
    }

    private function __route($type)
    {
        return route('company.jobs', ['type' => $type]);
    }

    private function __datas()
    {
        return [
            'application_datas' => [
                [
                    'title' => 'All Applications',
                    'link' => route('company.applicant.index'),
                    'totalcount' => ($this->company()) ? $this->company()->job_applications->count() : '',
                    'image' => 'mail.svg',
                    'bg-color' => 'bg-blue',
                ],
                [
                    'title' => 'Unscreened Applications',
                    'link' => route('company.applicant.index'),
                    'totalcount' => ($this->company()) ? $this->company()->job_applications->where('status', ApplicantStatus::PENDING)->count() : '',
                    'image' => 'megaphone.svg',
                    'bg-color' => 'bg-gray',
                ],
                [
                    'title' => 'Shortlisted Applications',
                    'link' => route('company.applicant.index'),
                    'totalcount' => ($this->company()) ? $this->company()->job_applications->where('status', ApplicantStatus::SHORTLISTED)->count() : '',
                    'image' => 'blogging.svg',
                    'bg-color' => 'bg-pink',
                ],
                [
                    'title' => 'Interviewed Applications',
                    'link' => route('company.applicant.index'),
                    'totalcount' => ($this->company()) ? $this->company()->job_applications->where('status', ApplicantStatus::SELECTEDFORINTERVIEW)->count() : '',
                    'image' => 'picture.svg',
                    'bg-color' => 'bg-orange',
                ],
                [
                    'title' => 'Selected Applications',
                    'link' => route('company.applicant.index'),
                    'totalcount' => ($this->company()) ? $this->company()->job_applications->where('status', ApplicantStatus::ACCEPTED)->count() : '',
                    'image' => 'picture.svg',
                    'bg-color' => 'bg-green',
                ],
                [
                    'title' => 'Rejected Applications',
                    'link' => route('company.applicant.index'),
                    'totalcount' => ($this->company()) ? $this->company()->job_applications->where('status', ApplicantStatus::REJECTED)->count() : '',
                    'image' => 'box-closed.svg',
                    'bg-color' => 'bg-red',
                ],
            ],
        ];
    }
}
