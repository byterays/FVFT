@extends('admin.layouts.master')
@section('main')
    <style>
        .gray-round {
            background-color: rgb(166 181 217);
        }

    </style>
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/admin">Dashboard</a></li>
        </ol>
    </div>
    <div class="row">
        @foreach ($first_datas as $f_data)
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <a href="{{ $f_data['link'] }}">
                    <div class="card">
                        <div class="card-body p-4 text-center feature">
                            <div class="fa-stack fa-lg fa-1x icons shadow-default bg-primary-transparent">
                                <i class="{{ $f_data['icon'] }} text-primary"></i>
                            </div>
                            <p class="card-text mt-3 mb-3">{{ __($f_data['title']) }}</p>
                            <p class="h2 text-center text-primary">{{ $f_data['totalcount'] }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        @foreach ($second_datas as $s_data)
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <a href="{{ $s_data['link'] }}">
                    <div class="card bg-blue">
                        <div class="card-body p-4 text-center feature">
                            <div class="fa-stack fa-lg fa-1x icons shadow-default gray-round">
                                <i class="{{ $s_data['icon'] }}"></i>
                            </div>
                            <p class="card-text mt-3 mb-3">{{ __($s_data['title']) }}</p>
                            <p class="h2 text-center">{{ $s_data['totalcount'] }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
