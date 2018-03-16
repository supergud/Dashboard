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
                            <h3 class="box-title">月營業額</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="line-chart" style="height: 300px;"></div>
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
            labels: ['2017.09', '2017.10', '2017.11', '2017.12', '2018.01', '2018.02'],
            datasets: [
                {
                    label: '營業額',
                    fill: false,
                    lineTension: 0,
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointBorderColor: 'rgba(60,141,188,1)',
                    pointBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(60,141,188,1)',
                    data: [785, 330, 1400, 980, 1110, 295],
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
                scales: {
                    xAxes: [{
                        position: "bottom",
                        scaleLabel: {
                            display: true,
                            labelString: "月份",
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
                        ticks: {
                            padding: 10
                        }
                    }],
                },
            }
        };

        new Chart($('#lineChart'), options);

        // LINE CHART
        const line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                {y: '2017.09', item1: 785},
                {y: '2017.10', item1: 330},
                {y: '2017.11', item1: 1400},
                {y: '2017.12', item1: 980},
                {y: '2018.01', item1: 1110},
                {y: '2018.02', item1: 295},
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Item 1'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto',
            smooth: false,
            parseTime: false
        });

        const items = $("#line-chart").find("svg").find("rect");
        $.each(items, function (index, v) {
            const value = theJson[index].count;
            const newY = parseFloat($(this).attr('y') - 20);
            const halfWidth = parseFloat($(this).attr('width') / 2);
            const newX = parseFloat($(this).attr('x')) + halfWidth;
            const output = '<text style="text-anchor: middle; font: 12px sans-serif;" x="' + newX + '" y="' + newY + '" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.875)"><tspan dy="3.75">' + value + '</tspan></text>';
            $("#line-chart").find("svg").append(parseSVG(output));
        });
    </script>
@stop