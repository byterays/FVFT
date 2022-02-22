@extends('admin.layouts.master')
@section('main')
    @php
    $images = '[';
    $countriesDOM = '[';
    @endphp
    {{-- @dd(Route::current()) --}}
    @if (request()->get('dstatus') == 'sucess')
        <div id="statusmsg" class="alert alert-success fade show" role="alert"
            style="display:fixed;position: absolute;z-index: 11;top: 60px !important;right:20px;"><button type="button"
                class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> Job Deleted.
        </div>
    @elseif(request()->get('dstatus') == 'failed')
        <div id="statusmsg" class="alert alert-danger fade show" role="alert"
            style="display:fixed;position: absolute;z-index: 11;top: 60px !important;right:20px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i
                class="fa fa-frown-o mr-2" aria-hidden="true"></i>Failed ! To Delete.
        </div>
    @endif
    <div class="page-header">
        <h4 class="page-title">Jobs</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Modules</a></li>
            <li class="breadcrumb-item active" aria-current="page">Jobs</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="card-title" style="width: 100%;">Jobs List</h3>
                    <form action="{{ route('admin.jobs-list') }}" method="GET">
                    <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="Search By Title">
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($job_categories as $job_category)
                            <option value="{{ $job_category->id }}"
                                {{ request('category_id') == $job_category->id ? 'selected' : '' }}>
                                {{ $job_category->functional_area }}
                            </option>
                        @endforeach
                    </select>
                    <select name="employer_id" class="form-control">
                        <option value="">Select Employer</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ request('employer_id') == $company->id ? 'selected': '' }}>
                                {{ $company->company_name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="country_id" class="form-control">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ request('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Search</button>  
                </form>
                    <div class="d-flex flex-row-reverse mb-2">
                        <a href="/admin/jobs-new" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead>
                                <tr>

                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>

                                        <td><img src="/{{ $job->feature_image_url }}" alt="" srcset="" width="50px"></td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ DB::table('companies')->find($job->company_id)->company_name }}</td>
                                        <td>
                                            <i
                                                class="fa fa-{{ $job->is_featured ? 'check-' : '' }}circle-o {{ $job->is_featured ? 'text-success' : 'text-warning' }}"></i>
                                        </td>
                                        <td>
                                            <span
                                                class="label label-{{ $job->is_active ? 'success' : 'warning' }}">{{ $job->is_active ? 'Active' : 'Inactive' }}</span>
                                        </td>
                                        <td>

                                            @include('admin.pages.jobs.components.edit_model',[
                                            "action"=>"Edit",
                                            "job"=>$job,
                                            "companies"=>$companies,
                                            "experiencelevels"=>$experiencelevels,
                                            "job_shifts"=>$job_shifts,
                                            "job_categories"=>$job_categories,
                                            "educationlevels"=>$educationlevels
                                            ])
                                            <div data-toggle="tooltip" data-original-title="Edit"
                                                style="display: inline-block;"
                                                onclick="patchOptions(countries,'#select-countries-{{ $job->id }}',{{ $job->country_id }});">
                                                <a class="btn btn-success btn-sm text-white mb-1" data-toggle="modal"
                                                    data-target="#EditJob{{ $job->id }}"><i
                                                        class="fa fa-pencil"></i></a>
                                            </div>
                                            <a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip"
                                                data-original-title="Delete"
                                                href="http://127.0.0.1:8000/admin/jobs-delete?id={{ $job->id }}&from={{ $jobs->currentPage() }}"><i
                                                    class="fa fa-trash-o"></i></a><br>
                                        </td>
                                    </tr>
                                    <?php
                                    $images = $images . "{'id':" . $job->id . ",'url':'" . env('APP_URL') . $job->feature_image_url . "'},";
                                    $countriesDOM = $countriesDOM . "{'id':'#select-countries-" . $job->id . "','active_id':" . $job->country_id . '},';
                                    ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $jobs->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
            <img src="" alt="">
        </div>
    </div>
@endsection
@section('script')
    <script>
        const images = {
            !!$images = $images.
            "]"!!
        };
        const countriesDOM = {
            !!$countriesDOM = $countriesDOM.
            "]"!!
        }
        $(document).ready(function() {
            loadCountries();
            images.forEach(image => {
                loadImage('feature_image' + image.id, image.url);
            });
            // loadCountries((countries)=>{
            //     // console.log(countriesDOM);
            // });
            // countriesDOM.forEach(cdom=>{
            //     patchOptions(countries,cdom.id,cdom.active_id)
            // });
            $("#statusmsg").delay(4000).slideUp(200, function() {
                $(this).alert('close');
            });
        });
        const _token = $('meta[name="csrf-token"]')[0].content;
        let countries = [];
        let states = [];
        let cities = [];

        const loadCountries = () => {
            fetch('http://127.0.0.1:8000/ajax/countries', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: _token
                })
            }).then(res => res.json()).then(json => {
                countries = json;
                // callback(countries);
            })
        }
        const loadStates = (country_id) => {
            fetch('http://127.0.0.1:8000/ajax/states', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: _token
                })
            }).then(res => res.json()).then(json => {
                states = json;
                callback(states);

            })
        }
        const loadCities = (state_id, callback) => {
            fetch('http://127.0.0.1:8000/ajax/cities', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: _token
                })
            }).then(res => res.json()).then(json => {
                cities = json;
                callback(cities);
            })
        }
        // const patchAllOptions=(country_id,state_id,city_id)=>{
        //     patchOptions()
        // }
    </script>
@endsection
