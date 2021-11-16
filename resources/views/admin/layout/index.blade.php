@extends('admin.layout.admin')

@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">الرئيسيه</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                <div class="btn-group">
                    <button type="button" class="btn bg-indigo-400"><i class="icon-stack2 mr-2"></i> تحميل</button>
                    <button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <div class="dropdown-header">تقرير</div>
                        <a href="{{url('dashboard/reports/export/excel/products')}}" class="dropdown-item"><i class="icon-file-pdf"></i>المخزون الحالي</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content pt-0">

        <!-- Main charts -->
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
                                        <option value="">اختار نوع المصروف</option>
                                        @foreach($expenses as $exp)
                                            <option value="{{$exp->s_id}}">{{$exp->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>التاريخ من </label>
                                    <input type="text" name="data_from" id="date_from" class="form-control"
                                           value="">
                                </div>
                                <div class="col-md-4">
                                    <label>التاريخ الي</label>
                                    <input type="text" name="date_at" id="date_at" class="form-control"
                                           value="">
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
        </div>
        <!-- /main charts -->

        <!-- Dashboard content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">
                            حركه الاصناف
                            <span class="d-block font-size-base">هنا سوف تعرف ( حركه الشراء و البيع والارتجاع ) للصنف</span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{url('dashboard/reports/products')}}" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="ladda-label">المنتجات </label>
                                    <select name="product_id" class="form-control select-search">
                                        @foreach($prodcuts as $prod)
                                            <option value="{{$prod->product_id}}">{{$prod->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>التاريخ من </label>
                                    <input type="text" name="data_from" id="date_from2" class="form-control"
                                           value="">
                                </div>
                                <div class="col-md-4">
                                    <label>التاريخ الي</label>
                                    <input type="text" name="date_at" id="date_at2" class="form-control"
                                           value="">
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-labeled btn-labeled-left btn-lg"><b><i
                                                class="icon-search4"></i></b> التقرير
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->

    </div>




@endsection

@section('script')
    <script src="{{asset('template/back/assets/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script>
        $('.select-search').select2();

        $(document).ready(function () {
            var oneDay = 24 * 60 * 60 * 1000;
            var rangeDemoFormat = '%Y-%m-%d';
            var rangeDemoConv = new AnyTime.Converter({format: rangeDemoFormat});

            $('#date_from').AnyTime_picker({
                format: rangeDemoFormat
            });
            $('#date_from').on('change', function (e) {
                try {
                    var fromDay = rangeDemoConv.parse($('#date_from').val()).getTime();

                    var dayLater = new Date(fromDay + oneDay);
                    dayLater.setHours(0, 0, 0, 0);

                    var ninetyDaysLater = new Date(fromDay + (720 * oneDay));
                    ninetyDaysLater.setHours(23, 59, 59, 999);

                    $('#date_at')
                        .AnyTime_noPicker()
                        .removeAttr('disabled')
                        .val(rangeDemoConv.format(dayLater))
                        .AnyTime_picker({
                            earliest: dayLater,
                            format: rangeDemoFormat,
                            latest: ninetyDaysLater
                        });
                } catch (e) {
                    $('#date_at').val('').attr('disabled', 'disabled');
                }
            });


            $('#date_from2').AnyTime_picker({
                format: rangeDemoFormat
            });
            $('#date_from2').on('change', function (e) {
                try {
                    var fromDay = rangeDemoConv.parse($('#date_from2').val()).getTime();

                    var dayLater = new Date(fromDay + oneDay);
                    dayLater.setHours(0, 0, 0, 0);

                    var ninetyDaysLater = new Date(fromDay + (720 * oneDay));
                    ninetyDaysLater.setHours(23, 59, 59, 999);

                    $('#date_at2')
                        .AnyTime_noPicker()
                        .removeAttr('disabled')
                        .val(rangeDemoConv.format(dayLater))
                        .AnyTime_picker({
                            earliest: dayLater,
                            format: rangeDemoFormat,
                            latest: ninetyDaysLater
                        });
                } catch (e) {
                    $('#date_at2').val('').attr('disabled', 'disabled');
                }
            });

        });


    </script>

@endsection