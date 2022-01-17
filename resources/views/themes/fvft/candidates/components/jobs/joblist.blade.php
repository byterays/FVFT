<table class="table table-bordered table-hover mb-0 text-nowrap">
    <thead>
        <tr>
            <th></th>
            <th class="w-100">{{$action}}</th>
            <th>Location</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)                                            
        <tr>
            <td>
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                    <span class="custom-control-label"></span>
                </label>
            </td>
            <td>
                <div class="media mt-0 mb-0">
                    <div class="media-body">
                        <div class="card-item-desc p-0">
                            <a href="#" class="text-dark"><h4 class="font-weight-semibold">{{ $item->title }}</h4></a>
                            <a href="#"><i class="fa fa-tag w-4"></i> {{  \DB::table('job_categories')->where('id',$item->job_categories_id)->first()->functional_area}}</a>
                        </div>
                    </div>
                </div>
            </td>
            <td><i class="fa fa-map-marker mr-1 text-muted"></i>Ambrosia</td>
            
            <td>
                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
            </td>
            <td>{{ $item->status }}</td>
            <td>
                <a class="btn btn-primary btn-sm text-white" data-toggle="tooltip" data-original-title="View" href="/job/{{ $item->job_id}}"><i class="fa fa-eye"></i></a>
                {{-- <a class="btn btn-success btn-sm text-white" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a> --}}
                <a class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete" href="/remove-application/{{$item->job_id}}"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center mt-3">
    {{ $items->links('vendor.pagination.bootstrap-4') }}
</div>