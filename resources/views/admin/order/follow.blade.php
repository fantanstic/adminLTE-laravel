@extends('layout.app')

@section('title')
    订单列表
@endsection
@section('style')
    @include('styles.datatables')
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Follow订单列表
            
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
                                <form action="{{ route('admin.web.ins.follow') }}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>订单ID</strong></span>
                                            <input type="text" class="form-control" placeholder="订单ID" name="id" value="{{$data['id']}}"></div>

                                        <div class="input-group input-group-sm">
                                            <select class="form-control" name="status" value="">
                                                <option value="">订单支付状态</option>
                                                <option @if($data['status'] == 1) selected @endif value="1">未支付</option>
                                                <option  @if($data['status'] == 2) selected @endif value="2">已支付</option>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>用户昵称</strong></span>
                                            <input type="text" class="form-control" placeholder="用户昵称" name="nickname" value="{!! $data['nickname'] !!}"></div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>用户邮箱</strong></span>
                                            <input type="text" class="form-control" placeholder="用户邮箱" name="email" value="{{$data['email']}}"></div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>日期</strong></span>
                                            <input id="datepicker" type="text" class="form-control" placeholder="日期" name="dateUtc_left" value="{{$data['dateUtc_left']}}"></div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>日期</strong></span>
                                            <input id="datepicker2" type="text" class="form-control" placeholder="日期" name="dateUtc_right" value="{{$data['dateUtc_right']}}"></div>

                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <a href="{{ route('admin.web.ins.follow') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <br><br><br><br><h3 class="box-title">总计：${{$totalMoney}}  下单数量: {{$totalNeedNum}}</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="tasks" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>Email</th>
                                <th>来源</th>
                                <th>订阅</th>
                                <th>下单金额</th>
                                <th>下单数量</th>
                                <th>支付状态</th>
                                <th>下单时间</th>
                                <th>扣款记录</th>
                                <th>发送邮件</th>
                                <th>添加任务</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders['list'] as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td><a href="{{route('admin.web.ins.orderList')}}?nickname={{$order->nickname}}">{{ $order->nickname }}</a></td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->from ?: '自然'}}</td>
                                        <td>{{ $order->planStatus ?: '否'}}</td>
                                        <td>{{ $order->money }}</td>
                                        <td>{{ $order->needNum }}</td>
                                        <td>{{ $order->status==2 ? '已支付' :'未支付'}}</td>
                                        <td>{{ $order->dateUtc }}</td>
                                        <td>@if($order->agreementId)<a href="{{route('admin.web.ins.orderDetail')}}?orderId={{ $order->id }}">查看</a>@endif</td>
                                        <th><a class="sendEmail" data-id="{{ $order->id }}" href="javascript:;">发送邮件</a></th>
                                        <td>@if($order->addDate == date('Y-m')) 本月已添加过 @else <a class="addOrderByAdmin" href="javascript:;" data-order-id="{{$order->id}}">添加</a> @endif</td>
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

        var allowAjax = true ;
        $(function () {

            //手动发送邮件
            $('a.sendEmail').click(function(){
                var orderId = $(this).attr('data-id')
                if(allowAjax){
                    allowAjax = false;
                    $.ajax({
                        url : '{{route('admin.web.ins.sendEmail')}}?order_id='+orderId,
                        dataType:'json',
                        success:function (data) {
                            allowAjax = true;
                            if (!data){
                                return alert('没有返回任何数据')
                            }
                            return alert(data.message)
                        },
                        error:function (data) {
                            allowAjax = true;
                            return alert('server error');
                        }
                    })
                }else{
                    return alert('请勿频繁点击');
                }
            })

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

            //手动添加任务
            $('#tasks').on('click','a.addOrderByAdmin',function(){
                var order_id = $(this).attr('data-order-id');
                var aObj = $(this);
                if(order_id){
                    $.ajax({
                        url:"{{route('admin.web.ins.addOrder')}}?order_id="+order_id,
                        dataType:'json',
                        success:function(res){
                            if( res === ''){
                                return alert('没有任何数据返回');
                            }
                            if(res.code == 1){
                                $(aObj).closest('td').html('已添加')
                            }
                            if(res.message){
                                return alert(res.message);
                            }
                        },
                        error:function (res) {
                            alert(res.responseText);
                        }
                    })
                }else{
                    alert('a标签没有参数order_id')
                }
            })
        })
    </script>
@endsection