@extends('layout.app')

@section('title')
    来源统计
@endsection
@section('style')
    @include('styles.datatables')
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            来源统计

        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-header">

                        <h3 class="box-title"></h3>

                        <div class="pull-right">
                            <div class="form-inline pull-right">
                                <form action="{{ route('admin.web.ins.from') }}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>日期</strong></span>
                                            <input id="datepicker" type="text" class="form-control" placeholder="日期" name="created_left" value="{{$data['created_left']}}">
                                        </div>

                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>日期</strong></span>
                                            <input id="datepicker2" type="text" class="form-control" placeholder="日期" name="created_right" value="{{$data['created_right']}}">
                                        </div>

                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <a href="{{ route('admin.web.ins.from') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tasks" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>来源</th>
                                <th>注册人数</th>
                                <th>下单人数</th>
                                <th>下单金额</th>
                                <th>人均消费</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($res as $v)
                                    <tr>
                                        <td>{{ $v['from']?:'自然' }}</td>
                                        <td>{{$v['user_count']}}</td>
                                        <td>{{$v['order_user_count']}}</td>
                                        <td>{{$v['money_count']}}</td>
                                        <td>{{$v['money_per_user']}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @include('scripts.datatables')
    <script src="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(function () {
            $('#tasks').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : false,
                'order'       : [[0, 'desc']],
                'info'        : false,
                'autoWidth'   : false
            })
            $('#datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            });
            $('#datepicker2').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            });
        })
    </script>
@endsection