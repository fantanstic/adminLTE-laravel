@extends('layout.app')

@section('title')
    留存信息
@endsection

@section('style')
    @include('styles.datatables')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            留存信息
            <small>Remain info</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="remain" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>日期</th>
                                    <th>日活</th>
                                    <th>新增</th>
                                    <th>登录次数</th>
                                    <th>2日留存</th>
                                    <th>3日留存</th>
                                    <th>7日留存</th>
                                    <th>月留存</th>
                                    <th>2日留存率</th>
                                    <th>3日留存率</th>
                                    <th>7日留存率</th>
                                    <th>月留存率</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($remainInfo as $key => $value)
                                    <tr>
                                        <td>{{ $value->date }}</td>
                                        <td>{{ $value->login }}</td>
                                        <td>{{ $value->reg }}</td>
                                        <td>{{ $value->login_num }}</td>
                                        <td>{{ $value->login_2 }}</td>
                                        <td>{{ $value->login_3 }}</td>
                                        <td>{{ $value->login_7 }}</td>
                                        <td>{{ $value->login_30 }}</td>
                                        <td>{{ empty($value->reg)? '0%' : round($value->login_2 / $value->reg * 100, 2).'%' }}</td>
                                        <td>{{ empty($value->reg)? '0%' :round($value->login_3 / $value->reg * 100, 2).'%' }}</td>
                                        <td>{{ empty($value->reg)? '0%' :round($value->login_7 / $value->reg * 100, 2).'%' }}</td>
                                        <td>{{ empty($value->reg)? '0%' :round($value->login_30 / $value->reg * 100, 2).'%' }}</td>
                                        <td></td>
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
    <script>
        $(function () {
            $('#remain').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'order'       : [[ 0, "desc" ]],
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection