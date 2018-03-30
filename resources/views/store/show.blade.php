{{-- Part of dashboard project. --}}
@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $store->name }}
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('store.index') }}">Stores</a></li>
                <li class="active">{{ $store->name }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">月營業額</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

            <div class="row">
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">月營業額</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="lineChart" style="height:250px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">累積營業額</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <canvas id="total-turnover" style="height:250px"></canvas>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop

@section('script')
    <script>
        const areaChartData = {
            labels: {!! json_encode($monthly_revenues->label) !!},
            datasets: [
                {
                    label: '營業額',
                    fill: false,
                    lineTension: 0,
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointBorderColor: 'rgba(60,141,188,1)',
                    pointBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(60,141,188,1)',
                    data: {!! json_encode($monthly_revenues->data) !!},
                    datalabels: {
                        align: 'top',
                        anchor: 'top',
                    }
                }
            ]
        };

        const options = {
            type: 'line',
            data: areaChartData,
            options: {
                title: {
                    display: true,
                    padding: 20,
                    responsive: true,
                    text: '月營業額'
                },
                legend: {
                    display: false
                },
                tooltips: {
                    "enabled": false
                },
                scales: {
                    xAxes: [{
                        position: "bottom",
                        scaleLabel: {
                            display: true,
                            labelString: "月份",
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10
                        }
                    }],
                    yAxes: [{
                        position: "left",
                        scaleLabel: {
                            display: true,
                            labelString: "營業額",
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10
                        }
                    }],
                },
            }
        };

        new Chart($('#lineChart'), options);

        new Chart($('#total-turnover'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($total_turnovers->label) !!},
                datasets: [{
                    data: {!! json_encode($total_turnovers->data) !!},
                    backgroundColor: 'rgba(60,141,188,0.8)',
                    datalabels: {
                        align: 'top',
                        anchor: 'top',
                    }
                }]
            },
            options: {
                title: {
                    display: true,
                    padding: 20,
                    responsive: true,
                    text: '累積營業額'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    "enabled": false
                },
                scales: {
                    xAxes: [{
                        position: "bottom",
                        scaleLabel: {
                            display: true,
                            labelString: "月份",
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10
                        },
                        barThickness : 50
                    }],
                    yAxes: [{
                        position: "left",
                        scaleLabel: {
                            display: true,
                            labelString: "營業額",
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10
                        }
                    }],
                },
            }
        });
    </script>
@stop