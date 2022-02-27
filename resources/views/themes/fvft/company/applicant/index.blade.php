@extends('themes.fvft.company.layouts.dashmaster')
@section('content')
    <div class="card-header">
        <h3 class="card-title">Applicant List</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover mb-0 text-nowrap">
            <thead>
                <tr>
                    <th></th>
                    
                    <th>Employe Name</th>
                    <th>Job Title</th>
                    <th>Applied At</th>
                    <th>Publish Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{-- {{ $items->links('vendor.pagination.bootstrap-4') }} --}}
        </div>
    </div>
@endsection
