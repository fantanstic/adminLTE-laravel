@extends('layout.app')

@section('title')
    订单详情
@endsection
@section('style')
    @include('styles.datatables')
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            订单详情
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-header">
                        <div class="pull-right">
                            <div class="form-inline pull-right">
                                <form action="{{ route('admin.web.ins.orderDetail') }}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>订单ID</strong></span>
                                            <input type="text" class="form-control" placeholder="订单ID" name="orderId" value="{{$data['orderId']}}">
                                        </div>

                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <a href="{{ route('admin.web.ins.orderList') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <br><br><br><h3 class="box-title">总计： </h3>
                    </div>
                    <div class="box-body">
                        <table id="tasks" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>订单ID</th>
                                <th>扣款金额</th>
                                <th>扣款时间</th>
                                <th>下次扣款时间</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders['list'] as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->web_order_id}}</td>
                                        <td>{{$order->money}}</td>
                                        <td>{{$order->last_payment_date}}</td>
                                        <td>{{$order->next_billing_date}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer clearfix">
                        Showing <b>{{$data['psize']}}</b> of <b>{{ $orders['num']['count']  }}</b> entries
                        <div class="pull-right">
                            {!! $orders['page'] !!}
                        </div>
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
        })
    </script>
@endsection