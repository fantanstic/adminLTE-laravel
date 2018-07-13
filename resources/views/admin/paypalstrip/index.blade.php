@extends('layout.app')

@section('title')
    paypal & strip充值列表
@endsection
@section('style')
    @include('styles.datatables')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            paypal & strip充值列表
            <small>Pay content</small>
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
                                <form action="{{route('admin.'.$version.'.paypalstrip.index')}}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>昵称</strong></span>
                                            <input type="text" class="form-control" id="date_utc_end" placeholder="nickname" name="nickname" value="{{isset($_GET['nickname']) ? $_GET['nickname'] :''}}">
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>支付方式</strong></span>
                                            <select name="pay_type" class="form-control">
                                                <option value="">请选择</option>
                                                <option value="2">paypal</option>
                                                <option value="3">strip</option>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>开始</strong></span>
                                            <input type="date" class="form-control" id="date_utc_start" placeholder="开始时间" name="start" value="{{isset($_GET['start']) ? $_GET['start'] :''}}">
                                            <span class="input-group-addon"><strong>结束</strong></span>
                                            <input type="date" class="form-control" id="date_utc_end" placeholder="结束时间" name="end" value="{{isset($_GET['end']) ? $_GET['end'] :''}}">
                                        </div>
                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <a href="{{route('admin.'.$version.'.paypalstrip.index')}}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
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
                                <th title="">昵称</th>
                                <th title="">tuid</th>
                                <th title="">支付方式</th>
                                <th title="">金额</th>
                                <th title="">版本</th>
                                <th title="">支付时间</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($pay_content as $pay)
                                <tr>
                                    <td>{{ $pay->nickname }}</td>
                                    <td>{{ $pay->tuid }}</td>
                                    <td>{{ ($pay->pay_type ==2)? 'paypal' :'strip' }}</td>
                                    <td>{{ $pay->money }}</td>
                                    <td>{{ $pay->version }}</td>
                                    <td>{{ $pay->create_at }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(!(request()->has('start') || request()->has('end')))
                        <div class="box-footer clearfix">
                            <div class="pull-right">
                                {{
                                $pay_content->appends([
                                'nickname' =>isset($_GET['nickname'])?$_GET['nickname']:'',
                                'pay_type' =>isset($_GET['pay_type'])?$_GET['pay_type']:'',
                                'start' =>isset($_GET['start'])?$_GET['start']:'',
                                'end' =>isset($_GET['end'])?$_GET['end']:'',
                                ])
                                ->links()
                                }}
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
    </script>
@endsection