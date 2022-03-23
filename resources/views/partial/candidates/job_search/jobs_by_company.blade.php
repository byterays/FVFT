<div class="row">
    @foreach ($companies as $company)
        <div class="col-md-6">
            <a
                href="{{ route('candidate.job_search.index', ['type' => request()->type, 'company_id' => $company->id]) }}">
                <div class="row {{ $loop->iteration % 2 == 0 ? 'ml-auto' : '' }}">

                    <div class="card card-aside">
                        <div class="card-body" style="padding: 1rem 1rem;">
                            <div class="card-item d-flex">
                                <img src="{{ asset('/') }}{{ $company->company_logo ?? 'uploads/defaultimage.jpg' }}"
                                    alt="img" class="w-8 h-8">
                                <div class="ml-5 my-auto">
                                    <h6 class="font-weight-bold">
                                        {{ $company->company_name }}&nbsp;({{ $company->jobs_count }})</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@if (request()->has('company_id'))
    @php
        $data = App\Models\Company::where('id', request()->company_id)
            ->select('company_name', 'company_logo')
            ->first();
    @endphp
    <div class="row">
        <div class="card mb-0">
            <div class="card-header">
                <div class="d-flex mx-auto">
                    <img src="{{ asset('/') }}{{ $data->company_logo ?? 'uploads/defaultimage.jpg' }}" alt=""
                        class="w-8 h-8">
                    <h5 class="card-title my-auto ml-5">Jobs From {{ $data->company_name }}</h5>
                </div>
            </div>
        </div>
    </div>
@endif
