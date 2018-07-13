@extends('layout.app')

@section('title')
    充值日志
@endsection

@section('style')
    @include('styles.datatables')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

@endsection
@section('content')
    <section class="content-header">
        <h1>
            充值日志
            <small>Pay log</small>
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
                                <form action="{{ route('admin.v6.pay.index') }}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" id="datepicker" placeholder="选择日期筛选" name="date" value="">
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>tuid</strong></span>
                                            <input type="text" class="form-control" id="tuid" placeholder="tuid" name="tuid" value="">
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>username</strong></span>
                                            <input type="text" class="form-control" id="username" placeholder="username" name="username" value="">
                                        </div>
                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <a href="{{ route('admin.v6.pay.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="pay" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户tuid</th>
                                <th>账号</th>
                                <th>充值时间</th>
                                <th>充值金额</th>
                                <th>类型</th>
                                <th>数量</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payList as $pay)
                                <tr>
                                    <td>{{ $pay->id }}</td>
                                    <td>{{ $pay->tuid }}</td>
                                    <td>{{ $pay->username }}</td>
                                    <td>{{ date('Y-m-d', $pay->paytime) }}</td>
                                    <td>{{ $pay->money }}</td>
                                    <td>{{ $pay->content }}</td>
                                    <td>{{ isset($pay->content_count)?:0 }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(!(request()->has('tuid') || request()->has('username')))
                        <div class="box-footer clearfix">
                            <div class="pull-right">
                                {{ $payList->appends([
                                    'date' => request()->input('date'),
                                    'tuid' => request()->input('tuid'),
                                    'username' => request()->input('username')
                                ])->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    @include('scripts.datatables')
    <!-- bootstrap datepicker -->
    <script src="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        $(function () {
            $('#pay').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : false,
                'info'        : true,
                'autoWidth'   : true
            })
        })
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        });
    </script>
@endsection