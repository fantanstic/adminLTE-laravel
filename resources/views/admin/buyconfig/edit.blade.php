@extends('layout.app')

@section('title')
    修改配置项
@endsection

@section('content')
    <section class="content-header">
        <h1>
            修改配置
            <small>Edit config</small>
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="box box-info">
                    <form class="form-horizontal" action="{{ route('admin.v2.buyconfig.update', $config->id) }}" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ID</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" readonly name="id" class="form-control" value="{{ $config->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">金币数</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" readonly class="form-control" value="{{ $config->num }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">用户看到的充值金额</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control" name="money" value="{{ $config->money }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">需要消耗的金币数</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control" name="coins" value="{{ $config->coins }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">核对订单字符串</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control" name="pid" value="{{ $config->pid }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">是否需要充钱</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <select class="form-control" name="buy">
                                            <option @if($config->buy){{ "selected" }}@endif>需要</option>
                                            <option @unless($config->buy){{ "selected" }}@endunless>不需要</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">折扣</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control" name="rate" value="{{ $config->rate }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">原价</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control" name="oldprice" value="{{ $config->oldprice }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">是否参加活动</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <select class="form-control" name="is_act">
                                            <option @if($config->is_act){{ "selected" }}@endif>参加</option>
                                            <option @unless($config->is_act){{ "selected" }}@endunless>不参加</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">重 置</button>
                            <button type="submit" class="btn btn-info pull-right">保 存</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection