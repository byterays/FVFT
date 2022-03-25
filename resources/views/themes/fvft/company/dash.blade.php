@extends('themes.fvft.company.layouts.dashmaster')
@section('dashboard')
    active
@endsection
@section('title')
    Dashboard
@endsection
@section('data')
    <div class="card mb-0">
        <div class="card-header">
            <div class="col-md-6">
                <div class="row">
                    <h3 class="card-title">Dashboard</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row mx-auto">
                    <h3 class="card-title">{{ $company->company_name }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="row row-cards">
            @foreach ($job_datas as $j_data)
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <a href="{{ $j_data['link'] }}">
                        <div class="card">
                            <div class="card-body p-4 text-center feature">
                                <div class="fa-stack fa-lg fa-1x icons shadow-default bg-primary-transparent">
                                    <i class="icon icon-people text-primary"></i>
                                </div>
                                <p class="card-text mt-3 mb-3">{{ $j_data['title'] }}</p>
                                <p class="h2 text-center text-primary">{{ $j_data['totalcount'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-5">
        <div class="row row-cards">
            @foreach ($profile_datas as $profile_data)
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <a href="{{ $profile_data['link'] }}">
                        <div class="card bg-blue profileRow">
                            <div class="card-body p-4 text-center feature">
                                <div class="fa-stack fa-lg fa-1x icons shadow-default bg-primary-transparent">
                                    <i class="{{ $profile_data['icon'] }}"></i>
                                </div>
                                <p class="card-text mt-3 mb-3">{{ $profile_data['title'] }}</p>
                                <p class="h2 text-center">{{ $profile_data['totalcount'] }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-5">
        <div class="row row-cards">
            @foreach ($application_datas as $a_data)
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <a href="{{ $a_data['link'] }}">
                        <div class="card">
                            <div class="card-body p-4 text-center feature">
                                <div
                                    class="fa-stack fa-lg fa-1x icons shadow-default bg-primary-transparent">
                                    <i class="icon icon-people text-primary"></i>
                                </div>
                                <p class="card-text mt-3 mb-3">{{ $a_data['title'] }}</p>
                                <p class="h2 text-center text-primary">{{ $a_data['totalcount'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
