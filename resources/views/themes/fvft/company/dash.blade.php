@extends('themes.fvft.company.layouts.dashmaster')
@section('dashboard')
    active
@endsection
@section('title')
    Dashboard
@endsection
@section('css')
    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('themes/fvft/') }}/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />
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
                                <div class="fa-stack fa-lg fa-1x icons shadow-default bg-primary-transparent">
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
    <div class="mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applicant Age Group</h3>

                    </div>
                    <div class="card-body">
                        <div id="chart-donut3" class="chartsh"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applicant Gender</h3>

                    </div>
                    <div class="card-body">
                        <div id="chart-donut4" class="chartsh"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- c3.js Charts Plugin -->
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/charts-c3/d3.v5.min.js"></script>
    <script src="{{ asset('themes/fvft/') }}/assets/plugins/charts-c3/c3-chart.js"></script>
    <script>
        const _token = $('meta[name="csrf-token"]')[0].content;
        const appurl = "{{ env('APP_URL') }}";
        // Chart Start
        $(document).ready(function() {
            /** Working Code don't delete'
            // var genderDatas = <?php echo json_encode($genderDatas); ?>;
            // var gender_array = new Array();
            // $.each(Object.entries(genderDatas['genders']), function(key, value) {
            //     gender_array.push(value);
            // });
            **/
            var genderDatas = '<?php echo json_encode($genderDatas); ?>';
            var gender_array = Object.entries(JSON.parse(genderDatas)['genders']);
            var chart = c3.generate({
                bindto: '#chart-donut4', // id of chart wrapper
                data: {
                    // columns: [
                    //     // each columns data
                    //     ['data1', 78],
                    //     ['data2', 95],
                    //     ['data3', 95],
                    //     ['data4', 95]
                    // ],
                    columns: gender_array,
                    type: 'donut', // default type of chart
                    // colors: {
                    //     male: '#4801FF ',
                    //     female: '#ec296b',
                    //     other: '#ec296b',
                    // },
                    colors: JSON.parse(genderDatas)['colors'],
                    names: JSON.parse(genderDatas)['names'],
                    // names: {
                    //     // name of each series
                    //     'male': 'Male',
                    //     'female': 'Female',
                    //     'other': 'Other',
                    // }
                },
                axis: {},
                legend: {
                    show: true, //show legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
                donut: {
                    label: {
                        format: function(value, ratio, id) {
                            return value;
                        }
                    }
                },
                tooltip: {
                    format: {
                        value: function(value, ratio, id) {
                            return value;
                        }
                    }
                }
            });
        });

        /** Working code don't delete'
        // var age_group = <?php echo json_encode($ageDatas); ?>;
        // var age_array = new Array();
        // $.each(Object.entries(age_group), function(key, value) {
        //     age_array.push(value);
        // });
        **/
        var age_group = '<?php echo json_encode($ageDatas); ?>';
        var age_array = Object.entries(JSON.parse(age_group)['ages']);
        var chart = c3.generate({
            bindto: '#chart-donut3', // id of chart wrapper
            data: {
                columns: age_array,
                type: 'donut', // default type of chart
                colors: JSON.parse(age_group)['colors'],
                names: JSON.parse(age_group)['names'],
            },
            axis: {},
            legend: {
                show: true, //show legend
            },
            padding: {
                bottom: 0,
                top: 0
            },
            donut: {
                label: {
                    format: function(value, ratio, id) {
                        return value;
                    }
                }
            },
            tooltip: {
                format: {
                    value: function(value, ratio, id) {
                        return value;
                    }
                }
            }
        });
        // Chart End
    </script>
@endsection
