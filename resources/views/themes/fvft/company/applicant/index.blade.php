@extends('themes.fvft.company.layouts.dashmaster')
@section('content')
    <div class="card-header">
        <h3 class="card-title">Applicant List</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover mb-0 text-nowrap">
            <thead>
                <tr>
                    <th>Employe Name</th>
                    <th>Job Title</th>
                    <th>Applied At</th>
                    <th>Status</th>
                    <th>Interview Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($applicants as $key => $applicant)
                <tr>
                    <td>{{ $applicant->employe->full_name }}</td>
                    <td>{{ $applicant->job->title }}</td>
                    <td>{{ date('Y-m-d', strtotime($applicant->created_at)) }}</td>
                    <td>{{ $applicant->status }}</td>
                    <td>{{ $applicant->interview_status }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View" href="{{ route('company.applicant.detail', $applicant->employ_id) }}"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $applicants->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
