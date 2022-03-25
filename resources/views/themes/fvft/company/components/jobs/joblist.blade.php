<table class="table table-bordered table-hover mb-0 text-nowrap">
    <thead>
        <tr>
            <th>SN</th>
            <th>Job Title</th> 
            <th>Draft Date</th>
            <th>Publish Date</th>
            <th>Expiry Date</th>
            <th>Applications</th>
            <th>Status</th>
            {{-- <th>Publish Status</th>
            <th>Active Status</th>
            <th>Expiration</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobs as $job)
            <tr>
                <td>
                    {{ $sn++ }}
                </td>
                <td>
                    <div class="media mt-0 mb-0">
                        <div class="media-body">
                            <div class="card-item-desc p-0">
                                <a href="#" class="text-dark">
                                    <h4 class="font-weight-semibold">{{ $job->title }}
                                         {{-- <span class="badge badge-success">{{ $job->countApplicant() }}</span> --}}
                                        </h4>
                                </a>
                                <a href="#"><i class="fa fa-tag w-4"></i>
                                    {{ \DB::table('job_categories')->where('id', $job->job_categories_id)->first()->functional_area }}</a>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    {{ $job->draft_date != null ? date('Y-m-d', strtotime($job->draft_date)) : '-' }}
                </td>
                <td>
                    {{ $job->publish_date != null ? date('Y-m-d', strtotime($job->publish_date)) : '-' }}
                </td>
                <td>
                    {{ $job->expiry_date != null ? date('Y-m-d', strtotime($job->expiry_date)) : '-' }}
                </td>
                <td>
                    <?php echo $job->countApplicant() > 0 ? '<a href="'.route('company.applicant.index', ['job_title' => $job->title]).'" class="font-weight-bold text-primary">'.$job->countApplicant().'&nbsp;<i class="fa fa-eye"></i></a>' : '-' ?>
                </td>
                {{-- @php
                    $country_name = \DB::table('countries')
                        ->where('id', $job->country_id)
                        ->first()->name;
                @endphp
                <td><i class="fa fa-map-marker mr-1 text-muted"></i>{{ $country_name ? $country_name : '' }}</td> --}}

                {{-- <td>
                    {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                    {{ date('Y-m-d', strtotime($job->created_at)) }}
                </td> --}}
                <td>
                    @php
                        $job_status = ['Draft' => 'primary', 'Pending' => 'warning', 'Active' => 'success', 'Approved' => 'success', 'Not Approved' => 'warning', 'Published' => 'success', 'Unpublished' => 'warning', 'Expired' => 'danger', 'Rejected' => 'danger'];
                    @endphp
                    <span class="label label-{{ $job_status[$job->status] }}">
                        {{ $job->status }}
                    </span>
                </td>
                {{-- <td>{{ $job->publish_status == 1 ? 'Published' : 'Not Published' }}</td>
            <td>{{ $job->is_active == 1 ? 'Active' : 'Pending' }}</td>
            <td>{{ $job->is_active == 1 ? 'Expired' : 'Available' }}</td> --}}
                <td>
                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"
                        href="/job/{{ $job->id }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View"
                        href="{{ route('company.editjob', $job->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="Clone Job"
                        onclick="cloneJob({{ $job->id }})"><i class="fa fa-clone"></i></a>
                    {{-- <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a> --}}
                    {{-- <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete" href="/remove-application/{{$job->id}}"><i class="fa fa-trash-o"></i></a> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center mt-5 mb-5">
    {{ $jobs->links('vendor.pagination.bootstrap-4') }}
</div>
