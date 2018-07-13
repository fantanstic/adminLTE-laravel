@extends('layout.app')

@section('title')
    用户列表
@endsection
@section('style')
    @include('styles.datatables')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            用户列表
            <small>Users list</small>
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
                                <form action="{{ route('admin.'.$version.'.member.index') }}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>用户tuid</strong></span>
                                            <input type="text" class="form-control" placeholder="用户tuid" name="tuid" value=""></div>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>用户名</strong></span>
                                            <input type="text" class="form-control" placeholder="用户名" name="nickname" value=""></div>

                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <a href="{{ route('admin.'.$version.'.member.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="tasks" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户ID</th>
                                <th>用户名</th>
                                <th>图片</th>
                                <th>消费金额</th>
                                <th>金币数</th>
                                <th>购买的金币</th>
                                <th>发布任务数</th>
                                <th>任务完成数</th>
                                <th>做任务数</th>
                                <th>看视频的金币数</th>
                                <th>注册时间</th>
                                <th>登录时间</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->tuid }}</td>
                                        <td>{{ $user->nickname }}</td>
                                        <td><img src="{{ $user->photo_s }}" style="max-width:80px;max-height:80px" class="img img-thumbnail" alt="" /></td>
                                        <td>{{ $user->pay_money }}</td>
                                        <td>{{ $user->coin }}</td>
                                        <td>{{ $user->buy_coins }}</td>
                                        <td>{{ $user->publish_tasks }}</td>
                                        <td>{{ $user->complete_tasks }}</td>
                                        <td>{{ $user->did_tasks }}</td>
                                        <td>{{ $user->video_coins }}</td>
                                        <td>{{ $user->regtime }}</td>
                                        <td>{{ $user->htime }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(!(request()->has('nickname') || request()->has('tuid')))
                    <div class="box-footer clearfix">
                        Showing <b>10</b> of <b>{{ $count }}</b> entries
                        <div class="pull-right">
                            {{ $users->links() }}
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
            $('#tasks').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : false,
                'order'       : [[0, 'desc']],
                'info'        : false,
                'autoWidth'   : false
            })
        })
    </script>
@endsection