{{-- <div class="panel panel-primary">
    <div class="tab-menu-heading">
        <div class="tabs-menu1">
            <ul class="nav panel-tabs">
                <li class=""><a href="{{ route('candidate.job_search.index', ['type' => 'all']) }}" class="{{ !(request()->type == 'all') ?: 'active' }}"
                    >All Jobs</a></li>
                <li><a href="{{ route('candidate.job_search.index', ['type' => 'prefered_jobs']) }}" class="{{ !(request()->type == 'prefered_jobs') ?: 'active' }}">Preferred Jobs</a></li>
                <li><a href="{{ route('candidate.job_search.index', ['type' => 'featured_jobs']) }}" class="{{ !(request()->type == 'featured_jobs') ?: 'active' }}">Featured Jobs</a></li>
                <li><a href="{{ route('candidate.job_search.index', ['type' => 'new_jobs']) }}" class="{{ !(request()->type == 'new_jobs') ?: 'active' }}">New Jobs</a></li>
                <li><a href="{{ route('candidate.job_search.index', ['type' => 'jobs_by_country']) }}" class="{{ !(request()->type == 'jobs_by_country') ?: 'active' }}">Jobs By Country</a></li>
                <li><a href="{{ route('candidate.job_search.index', ['type' => 'jobs_by_category']) }}" class="{{ !(request()->type == 'jobs_by_category') ?: 'active' }}">Jobs By Category</a></li>
                <li><a href="{{ route('candidate.job_search.index', ['type' => 'jobs_by_company']) }}" class="{{ !(request()->type == 'jobs_by_company') ?: 'active' }}">Jobs By Company</a></li>
                <li><a href="{{ route('candidate.job_search.index', ['type' => 'saved_jobs']) }}" class="{{ !(request()->type == 'saved_jobs') ?: 'active' }}">Saved Jobs</a></li>
            </ul>
        </div>
    </div>
</div> --}}
<style>
    a, a:hover {
        color: #2a2929;
    }
</style>

<div class="row">
    <div class="card mb-2">
        <div class="panel panel-primary">
            <div class="tab-menu-heading">
                <div class="tabs-menu1">
                    <ul class="nav panel-tabs">
                        <li class=""><a
                                href="{{ route('candidate.job_search.index', ['type' => 'all']) }}"
                                class="{{ !(request()->type == 'all') ?: 'active' }}">All Jobs</a></li>
                        <li><a href="{{ route('candidate.job_search.index', ['type' => 'prefered_jobs']) }}"
                                class="{{ !(request()->type == 'prefered_jobs') ?: 'active' }}">Preferred Jobs</a></li>
                        <li><a href="{{ route('candidate.job_search.index', ['type' => 'featured_jobs']) }}"
                                class="{{ !(request()->type == 'featured_jobs') ?: 'active' }}">Featured Jobs</a></li>
                        <li><a href="{{ route('candidate.job_search.index', ['type' => 'new_jobs']) }}"
                                class="{{ !(request()->type == 'new_jobs') ?: 'active' }}">New Jobs</a></li>
                        <li><a href="{{ route('candidate.job_search.index', ['type' => 'jobs_by_country']) }}"
                                class="{{ !(request()->type == 'jobs_by_country') ?: 'active' }}">Jobs By Country</a>
                        </li>
                        <li><a href="{{ route('candidate.job_search.index', ['type' => 'jobs_by_category']) }}"
                                class="{{ !(request()->type == 'jobs_by_category') ?: 'active' }}">Jobs By
                                Category</a></li>
                        <li><a href="{{ route('candidate.job_search.index', ['type' => 'jobs_by_company']) }}"
                                class="{{ !(request()->type == 'jobs_by_company') ?: 'active' }}">Jobs By Company</a>
                        </li>
                        <li><a href="{{ route('candidate.job_search.index', ['type' => 'saved_jobs']) }}"
                                class="{{ !(request()->type == 'saved_jobs') ?: 'active' }}">Saved Jobs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <h3 class="card-title">{{ $action }}</h3>
                </div>
                <div class="col-md-6 my-auto">
                    <form action="{{ route('candidate.job_search.index', ['type' => request()->type]) }}"
                        method="GET">
                        <div class="input-group input-icons mb-3">
                            <i class="fa fa-search icon"></i>
                            <input type="hidden" name="type" value="{{ request()->type }}">
                            @if (request()->has('country_id'))
                                <input type="hidden" name="country_id" value="{{ request()->country_id }}">
                            @elseif(request()->has('company_id'))
                                <input type="hidden" name="company_id" value="{{ request()->company_id }}">
                            @elseif(request()->has('category_id'))
                                <input type="hidden" name="category_id" value="{{ request()->category_id }}">
                            @endif
                            <input type="text" name="search" value="{{ request()->search }}" class="form-control"
                                placeholder="Search Your Job" aria-label="Search your Job"
                                aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if (request()->type == 'jobs_by_country')
    @include('partial.candidates.job_search.jobs_by_country')
@elseif(request()->type == 'jobs_by_category')
    @include('partial.candidates.job_search.jobs_by_category')
@elseif(request()->type == 'jobs_by_company')
    @include('partial.candidates.job_search.jobs_by_company')
@endif
