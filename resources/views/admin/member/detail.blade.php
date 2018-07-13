@extends('layout.app')

@section('title')
    今日登录用户做任务详情
@endsection

@section('style')
    @include('styles.datatables')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            今日登录用户做任务详情
            <small>Users' task info</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tasks" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>日期</th>
                                <th>tuid</th>
                                <th>用户名</th>
                                <th>个人发布任务数</th>
                                <th>个人完成任务数</th>
                                <th>个人做任务数</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $date => $item)
                                <tr>
                                    <td>{{ date('Y-m-d') }}</td>
                                    <td>{{ $item->tuid }}</td>
                                    <td>{{ $item->nickname }}</td>
                                    <td>{{ isset($item->publish_tasks)?$item->publish_tasks:0 }}</td>
                                    <td>{{ isset($item->complete_tasks)?$item->complete_tasks:0 }}</td>
                                    <td>{{ isset($item->did_tasks)?$item->did_tasks:0 }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right">
                            {{ $users->links() }}
                        </div>
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
            $('#tasks').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : true,
                'order'       : [[0, 'desc']],
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection