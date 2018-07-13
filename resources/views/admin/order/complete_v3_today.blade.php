@extends('layout.app')

@section('title')
    今日已完成任务列表
@endsection

@section('style')
    @include('styles.datatables')
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            今日已完成任务列表
            <small>Completed tasks list</small>
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
                                <form action="{{ route('admin.v3.order.completetoday') }}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" id="datepicker" placeholder="选择日期筛选" name="date" value="">
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>类型</strong></span>
                                            <select name="type" id="type" class="form-control">
                                                <option value="0" @if(request()->input('type') == '' ) {{ "selected" }} @endif>All</option>
                                                <option value="1" @if(request()->input('type') == 1 ) {{ "selected" }} @endif>Follow</option>
                                                <option value="2" @if(request()->input('type') == 2 ) {{ "selected" }} @endif>Like</option>
                                            </select>
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
                                            <a href="{{ route('admin.v3.order.completetoday') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="task" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>类型</th>
                                <th>用户tuid</th>
                                <th>用户名</th>
                                <th>Path</th>
                                <th>发布时间</th>
                                <th>需求</th>
                                <th>完成</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($taskList as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->type }}</td>
                                    <td>{{ $task->tuid }}</td>
                                    <td>{{ $task->nickname }}</td>
                                    <td><img src="{{ $task->path }}" alt="" style="max-width: 80px;max-height: 80px;" class="img img-thumbnail" /></td>
                                    <td>{{ date('Y-m-d H:i:s', $task->addtime) }}</td>
                                    <td>{{ $task->rnum }}</td>
                                    <td>{{ $task->cnum }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(!(request()->has('tuid') || request()->has('username')))
                        <div class="box-footer clearfix">
                            Showing <b>15</b> of <b>{{ $count }}</b> entries
                            <div class="pull-right">
                                {{ $taskList->appends([
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
            $('#task').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : false,
                'order'       : [[ 0, "desc" ]],
                'info'        : false,
                'autoWidth'   : true
            })
        })
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        });
    </script>
@endsection