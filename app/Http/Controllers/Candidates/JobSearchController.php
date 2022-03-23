<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Models\EmployJobPreference;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\SavedJob;
use App\Traits\Site\CandidateMethods;
use App\Traits\Site\ThemeMethods;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    use ThemeMethods, CandidateMethods;
    private $page = "candidates.job_search.";

    public function __construct()
    {
        $this->Countries = Country::whereHas('jobs')->select('id', 'name', 'iso2', 'iso3')->withCount('jobs')->get();
        $this->jobCategories = JobCategory::whereHas('jobs')->select('id', 'functional_area')->withCount('jobs')->take(18)->inRandomOrder()->get();
        $this->companies = Company::whereHas('jobs')->select('id', 'company_name', 'company_logo')->withCount('jobs')->get();
    }

    public function index(Request $request)
    {
        $query = Job::query();
        // $jobs = $query->where('publish_status', 1); //Todo uncomment later
        $action = $this->actions($request->type);
        $this->__query_jobs($query, $request);
        $jobs = $query->paginate(10);
        return $this->client_view($this->page . 'index', [
            'jobs' => $jobs,
            "pagination" => $jobs->appends(array(
                'type' => $request->type,
                'country_id' => $request->country_id,
                'category_id' => $request->category_id,
                'company_id' => $request->company_id,
                'search' => $request->search,
            )),
            'action' => $action,
            'employ' => $this->employe(),
            'Countries' => $this->Countries,
            'jobCategories' => $this->jobCategories,
            'companies' => $this->companies,
        ]);
    }

    private function __query_jobs($query, $request)
    {
        $category_id = [];
        $job_title = [];
        $country_id = [];

        // $jobs = Job::whereIn('job_categories_id', (array)['1', '128'])->orWhereIn('country_id', (array)['1', '154'])->get();
        // dd($jobs);

       $query->when($request->type == 'all', function ($q) {
            $q;
        })->when($request->type == 'featured_jobs', function ($q) {
            $q->where('is_featured', 1);
        })->when($request->type == 'new_jobs', function ($q) {
            $q->where('publish_status', 1)->whereDate('created_at', '>=', Carbon::now()->subDays(30));
        })->when($request->type == 'saved_jobs', function ($q) {
            $q->whereIn('id', function ($q1) {
                $q1->select('job_id')->from((new SavedJob)->getTable())->where('employ_id', $this->employe()->id);
            });
        })->when($request->type == 'jobs_by_country', function ($q) use ($request) {
            $q->where('country_id', $request->country_id);
        })->when($request->type == 'jobs_by_category', function ($q) use ($request) {
            $q->where('job_categories_id', $request->category_id);
        })->when($request->type == 'jobs_by_company', function ($q) use ($request) {
            $q->where('company_id', $request->company_id);
        })->when($request->type == 'prefered_jobs', function ($q) use ($category_id, $job_title, $country_id) {
            $preference = EmployJobPreference::where('employ_id', $this->employe()->id);
            array_push($category_id, $preference->whereNotNull('job_category_id')->pluck('job_category_id')->toArray());
            array_push($job_title, EmployJobPreference::where('employ_id', $this->employe()->id)->whereNotNull('job_title')->pluck('job_title')->toArray());
            array_push($country_id, EmployJobPreference::where('employ_id', $this->employe()->id)->whereNotNull('country_id')->pluck('country_id')->toArray());
            // dd($q->whereIn('country_id', $country_id)->get());
            // dd($category_id, $country_id, $job_title);
            $q->whereIn('job_categories_id', $category_id)->orWhereIn('country_id', $country_id);
            // ->orWhereIn('job_title', 'LIKE', '%'.(array)$job_title.'%');
        })->when($request->has('search'), function ($q) use ($request) {
            $q->where('title', 'LIKE', '%' . $request->search . '%');
        });

    }

    private function actions($type)
    {
        switch ($type) {
            case 'all':
                return 'All Jobs';
                break;
            case 'prefered_jobs':
                return 'Preferred Jobs';
                break;
            case 'featured_jobs':
                return 'Featured Jobs';
                break;
            case 'new_jobs':
                return 'New Jobs';
                break;
            case 'jobs_by_country':
                return 'Jobs By Country';
                break;
            case 'jobs_by_category':
                return 'Jobs By Category';
                break;
            case 'jobs_by_company':
                return 'Jobs By Company';
                break;
            case 'saved_jobs':
                return 'Saved Jobs';
                break;
            default:
                return 'All Jobs';
        }
    }
}
