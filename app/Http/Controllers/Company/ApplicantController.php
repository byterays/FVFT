<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\JobApplication;
use App\Traits\Site\CompanyMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    use CompanyMethods;

    public function applicants()
    {
        $applicants = JobApplication::whereHas('job', function ($query) {
            return $query->whereHas('company', function ($query2) {
                return $query2->where('user_id', Auth::user()->id)->with(['employe', 'job']);
            });
        })->paginate(10);
        return $this->company_view('company.applicant.index', ['applicants' => $applicants]);
    }

    public function edit_application($id)
    {
        $application = JobApplication::where('id', $id)->with(['employe'])->firstOrFail();
        $GLOBALS['this_action'] = 'Edit Application';
        return $this->company_view('company.applicant.edit', ['application' => $application]);
    }

    public function updateApplication(Request $request, $id)
    {
        try {
            $application = JobApplication::find($id);
            $input = $request->except('_token');
            $input['status'] = $request->status;
            $input['interview_status'] = $request->interview_status;
            $input['interview_data'] = $request->interview_date;
            $input['interview_time'] = $request->interview_time;
            $application->update($input);
            return response()->json(['msg' => 'Application detail updated successfullu', 'redirectRoute' => route('company.applicant.index')]);
        } catch (\Exception $e) {
            return response()->json(['db_error' => $e->getMessage()]);
        }
    }

    public function applicant_detail($id)
    {
        $employ = Employe::where('id', $id)->with(['user'])->firstOrFail();
        return $this->company_view('company.applicant.detail', ['employ' => $employ]);
    }
}
