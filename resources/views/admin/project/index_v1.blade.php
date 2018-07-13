@extends('layout.app')

@section('title')
    消费项目
@endsection
@section('style')
    @include('styles.datatables')
@endsection
@section('content')
    <section class="content-header">
        <h1>
            消费项目
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
                                <form action="{{ route('admin.v1.project.index') }}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>消费时间</strong></span>
                                            <input type="text" class="form-control" id="date_utc_start" placeholder="消费时间" name="date_utc_start" value=""><span class="input-group-addon" style="border-left: 0; border-right: 0;">-</span>
                                            <input type="text" class="form-control" id="date_utc_end" placeholder="消费时间" name="date_utc_end" value="">
                                        </div>
                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <a href="{{ route('admin.v1.project.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
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
                                <th>日期</th>
                                <th>总价格</th>
                                <th>18followers</th>
                                <th>325followers</th>
                                <th>12500followers</th>
                                <th>70likes</th>
                                <th>2200likes</th>
                                <th>21000likes</th>
                                <th>140coins</th>
                                <th>1000coins</th>
                                <th>2250coins</th>
                                <th>8750coins</th>
                                <th>25000coins</th>
                                <th>87500coins</th>
                                <th>1000coins act</th>
                                <th>暴击</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pay_content as $pay)
                                <tr>
                                    <td>{{ date('Y-m-d', $pay->date) }}</td>
                                    <td>{{ $pay->countMoney }}</td>
                                    <td>{{ $pay->PA_F }}</td>
                                    <td>{{ $pay->PC_F }}</td>
                                    <td>{{ $pay->PF_F }}</td>
                                    <td>{{ $pay->PA_L }}</td>
                                    <td>{{ $pay->PC_L }}</td>
                                    <td>{{ $pay->PF_L }}</td>
                                    <td>{{ $pay->PA_C }}</td>
                                    <td>{{ $pay->PB_C }}</td>
                                    <td>{{ $pay->PC_C }}</td>
                                    <td>{{ $pay->PD_C }}</td>
                                    <td>{{ $pay->PE_C }}</td>
                                    <td>{{ $pay->PF_C }}</td>
                                    <td>{{ $pay->PA_1000 }}</td>
                                    <td>{{ $pay->crit }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(!(request()->has('date_utc_start') || request()->has('date_utc_end')))
                        <div class="box-footer clearfix">
                            <div class="pull-right">
                                {{ $pay_content->links() }}
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