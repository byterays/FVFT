@extends('admin.layouts.master')
@section('main')
@php
$images="[";    
@endphp
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
                <div class="d-flex flex-row-reverse mb-2" >
                    <button type="button" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add New</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive border-top">
                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                        <thead>
                            <tr>
                                {{-- <th>#id</th> --}}
                                <th>Image</th>
                                <th>Title</th>
                                <th>Is Featured</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)                                
                            <tr>
                                {{-- <td>{{$job->id}}</td> --}}
                                <td><img src="/{{$job->feature_image_url}}" alt="" srcset="" width="50px"></td>
                                <td>{{$job->title}}</td>
                                <td>{{$job->is_featured?"Featured":"Not Featured"}}</td>
                                <td> @if ($job->is_active)
                                    <i class='fa fa-circle' style='color:green;font-size: 8px; padding:.5rem;'></i>
                                    <span>Active</span>
                                    @else
                                     <i class='fa fa-circle'style='color:rgb(247, 67, 36); font-size: 8px; padding:.5rem;'></i>Not Active
                                    @endif
                                </td>
                                <td>
                                    {{-- <button class="btn btn-danger" data-toggle="modal" data-target="#largeModal">View modal</button> --}}
                                    <div data-toggle="tooltip" data-original-title="View" style="display: inline-block;">
                                        <a class="btn btn-primary btn-sm text-white mb-1" data-toggle="modal" data-target="#largeModal{{$job->id}}" ><i class="fa fa-eye"></i></a>
                                    </div>
                                    @include('admin.pages.jobs.components.edit_model',[
                                        "action"=>"Edit",
                                        "job"=>$job,
                                        "companies"=>$companies,
                                        "experiencelevels"=>$experiencelevels,
                                        "job_shifts"=>$job_shifts,
                                        "job_categories"=>$job_categories,
                                        "educationlevels"=>$educationlevels
                                        ])
                                     <div data-toggle="tooltip" data-original-title="Edit" style="display: inline-block;">
                                        <a class="btn btn-success btn-sm text-white mb-1" data-toggle="modal"  data-target="#EditJob{{$job->id}}"><i class="fa fa-pencil"></i></a>
                                    </div>
                                    <a class="btn btn-danger btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a><br>
                                </td>
                            </tr>
                            <?php
                            $images=$images."{'id':".$job->id.",'url':'".env('APP_URL').$job->feature_image_url."'},";    
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
        const images={!! $images=$images."]" !!};
        $(document).ready(function() {
            images.forEach(image => {
                loadImage('feature_image'+image.id,image.url);
            });
        });
    </script>
@endsection