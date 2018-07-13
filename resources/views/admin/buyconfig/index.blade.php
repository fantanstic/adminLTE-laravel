@extends('layout.app')

@section('title')
    购买项配置
@endsection

@section('style')
    @include('styles.datatables')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            购买项配置
            <small>Config</small>
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
                                <form action="{{ route('admin.v2.buyconfig.index') }}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>购买项</strong></span>
                                            <input type="text" class="form-control" placeholder="购买项" name="pid" value=""></div>

                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <a href="{{ route('admin.v2.buyconfig.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="buyconfig" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>类型</th>
                                <th>数量</th>
                                <th>金额($)</th>
                                <th>金币</th>
                                <th>购买项</th>
                                <th>花钱</th>
                                <th>是否参加活动</th>
                                <th>原来的价格</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($buy_config as $config)
                                <tr>
                                    <td>{{ $config->id }}</td>
                                    <td>
                                        @php
                                            switch ($config->type)
                                            {
                                                case 1 : echo 'follow';break;
                                                case 2 : echo 'like';break;
                                                case 3 : echo 'coins';break;
                                                case 4 : echo '活动/vip';break;
                                                case 5 : echo '暴击得金币';break;
                                                default: echo '活动';
                                            }
                                        @endphp
                                    </td>
                                    <td>{{ $config->num }}</td>
                                    <td>{{ $config->money }}</td>
                                    <td>{{ $config->coins }}</td>
                                    <td>{{ $config->pid }}</td>
                                    <td>{{ $config->buy? '是': '否' }}</td>
                                    <td>{{ $config->is_act? '是': '否' }}</td>
                                    <td>{{ $config->oldprice }}</td>
                                    <td><a class="fa fa-edit" href="{{ route('admin.v2.buyconfig.edit', $config->id) }}"></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(!(request()->has('pid')))
                        <div class="box-footer clearfix">
                            <div class="pull-right">
                                {{ $buy_config->links() }}
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
            $('#buyconfig').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : false,
                'order'       : [[ 0, "desc" ]],
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection