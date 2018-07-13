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
                                <form action="{{ route('admin.v5.project.index') }}" method="get">
                                    <fieldset>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><strong>消费时间</strong></span>
                                            <input type="text" class="form-control" id="date_utc_start" placeholder="消费时间" name="date_utc_start" value=""><span class="input-group-addon" style="border-left: 0; border-right: 0;">-</span>
                                            <input type="text" class="form-control" id="date_utc_end" placeholder="消费时间" name="date_utc_end" value="">
                                        </div>
                                        <div class="btn-group btn-group-sm">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            <a href="{{ route('admin.v5.project.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
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
                                <th title="">CA_F</th>
                                <th title="">CC_F</th>
                                <th title="">CF_F</th>
                                <th title="">CA_L</th>
                                <th title="">CC_L</th>
                                <th title="">CF_L</th>
                                <th title="">CA_C</th>
                                <th title="">CB_C</th>
                                <th title="">CC_C</th>
                                <th title="">CD_C</th>
                                <th title="">CE_C</th>
                                <th title="">CF_C</th>
                                <th title="">CA_1000</th>
                                <th>crit</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pay_content as $pay)
                                <tr>
                                    <td>{{ $pay->date_utc }}</td>
                                    <td>{{ $pay->countMoney }}</td>
                                    <td>{{ wordwrap($pay->CA_F, 4, '...') }}</td>
                                    <td>{{ $pay->CC_F }}</td>
                                    <td>{{ $pay->CF_F }}</td>
                                    <td>{{ $pay->CA_L }}</td>
                                    <td>{{ $pay->CC_L }}</td>
                                    <td>{{ $pay->CF_L }}</td>
                                    <td>{{ $pay->CA_C }}</td>
                                    <td>{{ $pay->CB_C }}</td>
                                    <td>{{ $pay->CC_C }}</td>
                                    <td>{{ $pay->CD_C }}</td>
                                    <td>{{ $pay->CE_C }}</td>
                                    <td>{{ $pay->CF_C }}</td>
                                    <td>{{ $pay->CA_1000 }}</td>
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