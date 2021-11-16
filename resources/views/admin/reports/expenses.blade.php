@extends('admin.layout.admin')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">تقرير المصاريف</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <span class="breadcrumb-item active">تقرير المصاريف</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">
                            تقرير المصروفات
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{url('dashboard/reports/expenses')}}" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="ladda-label">نوع المصروف </label>
                                    <select name="exp"
                                            class="form-control select-search">
                                        <option value="" {{app('request')->input('exp') == null ?'selected':' '}}>اختار نوع المصروف</option>
                                        @foreach($split_expenses as $split)
                                            <option value="{{$split->s_id}}" {{app('request')->input('exp') == $split->s_id ?'selected':' '}}>{{$split->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>التاريخ من </label>
                                    <input type="text" name="data_from" id="date_from" class="form-control"
                                           value="{{app('request')->input('data_from')}}">
                                </div>
                                <div class="col-md-4">
                                    <label>التاريخ الي</label>
                                    <input type="text" name="date_at" id="date_at" class="form-control"
                                           value="{{app('request')->input('date_at')}}">
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-labeled btn-labeled-left btn-lg"><b><i
                                                class="icon-search4"></i></b> التقرير
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                            <thead>
                            <tr>
                                <th>نوع الصرف</th>
                                <th>التفاصيل</th>
                                <th>السعر</th>
                                <th>التاريخ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($expenses))
                                @foreach($expenses as $exp)
                                    <tr>

                                        <td>{{ $exp->getSlit->name }}</td>
                                        <td>{{ $exp->desc }}</td>
                                        <td>{{ $exp->prices }}</td>
                                        <td>
                                            {{ $exp->created_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>الاجمالي</th>
                                <th></th>
                                <th>{{ $total ?? '' }}</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('template/back/assets/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
    <script>
        $('.select-search').select2();

        $(document).ready(function () {
            var oneDay = 24*60*60*1000;
            var rangeDemoFormat = '%Y-%m-%d';
            var rangeDemoConv = new AnyTime.Converter({format:rangeDemoFormat});

            $('#date_from').AnyTime_picker({
                format: rangeDemoFormat
            });

            $('#date_from').on('change', function(e) {
                try {
                    var fromDay = rangeDemoConv.parse($('#date_from').val()).getTime();

                    var dayLater = new Date(fromDay+oneDay);
                    dayLater.setHours(0,0,0,0);

                    var ninetyDaysLater = new Date(fromDay+(720*oneDay));
                    ninetyDaysLater.setHours(23,59,59,999);

                    $('#date_at')
                        .AnyTime_noPicker()
                        .removeAttr('disabled')
                        .val(rangeDemoConv.format(dayLater))
                        .AnyTime_picker({
                            earliest: dayLater,
                            format: rangeDemoFormat,
                            latest: ninetyDaysLater
                        });
                }
                catch(e) {
                    $('#date_at').val('').attr('disabled', 'disabled');
                }
            });

        });
    </script>

@endsection