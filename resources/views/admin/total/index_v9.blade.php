@extends('layout.app')

@section('title')
    信息总览
@endsection

@section('style')
    @include('styles.datatables')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            信息总览
            <small>Total info</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">信息总览</h3>
                        <span>
                            <small class="label pull-right" style="background-color: #3b8bba;">日活</small>
                            <small class="label pull-right" style="background-color: #ff5505;">新增用户</small>
                        </span>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="lineChart" style="height:250px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="total" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>日期</th>
                                    <th>日活</th>
                                    <th>新增用户(UTC)</th>
                                    <th>发布任务数</th>
                                    <th>做的任务数</th>
                                    <th>视频金币数</th>
                                    <th>付费用户(UTC)</th>
                                    <th>新增付费用户</th>
                                    <th>新增付费用户付费($)</th>
                                    <th>付费率</th>
                                    <th>当天总收入($)</th>
                                    <th>ARPU(当日总收入/日活)</th>
                                    <th>充值次数</th>
                                    <th>ARPPU(当日总收入/付费用户数)</th>
                                    <th>登录次数</th>
                                    <th>平均登录次数</th>
                                    <th>payPal总收入</th>
                                    <th>信用卡stripe总收入</th>
                                    <th>vip</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tableData as $data)
                                    <tr>
                                        <td>{{ $data['date'] }}</td>
                                        <td>{{ $data['dayActive'] }}</td>
                                        <td>{{ $data['newUser'] }}</td>
                                        <td>{{ $data['publishTaskCount'] }}</td>
                                        <td>{{ $data['completeTaskCount'] }}</td>
                                        <td>{{ $data['videoCoinCount'] }}</td>
                                        <td>{{ $data['paidUser'] }}</td>
                                        <td>{{ $data['newPaidUser'] }}</td>
                                        <td>{{ $data['newPaidCount'] }}</td>
                                        <td>{{ $data['payRate'] }}</td>
                                        <td>{{ $data['dailyGains'] }}</td>
                                        <td>{{ $data['arpu'] }}</td>
                                        <td>{{ $data['payCount'] }}</td>
                                        <td>{{ $data['arppu'] }}</td>
                                        <td>{{ $data['loginCount'] }}</td>
                                        <td>{{ $data['loginCountAvg'] }}</td>
                                        <td>{{ $data['payPal'] }}</td>
                                        <td>{{ $data['strip'] }}</td>
                                        <td>{{ $data['vip_try'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
   @include('scripts.datatables')
   <!-- ChartJS -->
   <script src="{{ asset('AdminLTE/bower_components/chart.js/Chart.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script>
        $(function () {
            $('#total').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'order'    : [[ 0, "desc" ]],
                'info'        : true,
                'autoWidth'   : false
            })
            // Get context with jQuery - using jQuery's .get() method.
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var lineChart       = new Chart(lineChartCanvas);
            var lineChartOptions = {
                //Boolean - If we should show the scale at all
                showScale               : true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines      : false,
                //String - Colour of the grid lines
                scaleGridLineColor      : 'rgba(0,0,0,.05)',
                //Number - Width of the grid lines
                scaleGridLineWidth      : 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines  : true,
                //Boolean - Whether the line is curved between points
                bezierCurve             : true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension      : 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot                : false,
                //Number - Radius of each point dot in pixels
                pointDotRadius          : 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth     : 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius : 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke           : true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth      : 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill             : true,
                //String - A legend template
                legendTemplate          : '',
                maintainAspectRatio     : true,
                //Boolean - whether to make the chart responsive to window resizing
                responsive              : true
            }
            var date = [];
            var newUsers = [];
            var dayActive = [];
            @foreach(array_slice($tableData, 0, 15) as $key => $data)
                date.push("{{ $data['date'] }}")
                newUsers.push("{{ $data['newUser'] }}")
                dayActive.push("{{ $data['dayActive'] }}")
            @endforeach
            var areaChartData = {
                labels  : date,
                datasets: [
                    {
                        label               : '新增用户',
                        fillColor           : '#ff5505',
                        strokeColor         : '#ff5505',
                        pointColor          : '#ff5505',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : newUsers
                    },
                    {
                        label               : '日 活',
                        fillColor           : 'rgba(60,141,188,0.9)',
                        strokeColor         : 'rgba(60,141,188,0.8)',
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : dayActive
                    }
                ]
            }
            lineChartOptions.datasetFill = false
            lineChart.Line(areaChartData, lineChartOptions)
        })
    </script>
@endsection
        
        