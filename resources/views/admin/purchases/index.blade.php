@extends('admin.layout.admin')
@section('css')
    <style>
        @media print {
            .print_this{
                direction:  rtl;
            }
        }
    </style>
 @endsection
@section('content')
    <div id="invoice" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">



            </div>
        </div>
    </div>
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">قائمه الفواتير</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <span class="breadcrumb-item active">قائمه الفواتير</span>
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
                          بحث
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{url('dashboard/purchases')}}" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>اسم المورد</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{app('request')->input('name')}}">
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
                                            class="icon-search4"></i></b> ابحث
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">
                          <a href="{{url('dashboard/purchases/add')}}"> <button type="button"
                                    class="btn btn-primary btn-labeled btn-labeled-left btn-lg"><b><i
                                            class="icon-plus-circle2"></i></b>اضافه فاتوره جديده
                            </button></a>
                        </h6>
                    </div>
                    <div class="card-body">

                        <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                            <thead>
                            <tr>
                                <th> اسم المورد</th>
                                <th>رقم الفاتوره</th>
                                <th>تاريخ الفانوره</th>
                                <th>اجمالي الفاتوره</th>
                                <th>الاعدادات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($purchases))
                                @foreach($purchases as $purch)
                                    <tr>
                                        <td>{{ $purch->supplier_name }}</td>
                                        <td>{{ $purch->in_num }}</td>
                                        <td>{{ $purch->in_data }}</td>
                                        <td>{{ $purch->	in_total }}</td>
                                        <td>
                                            <div class="list-icons">
                                                <div class="dropdown show">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown"
                                                       aria-expanded="top"><i class="icon-menu9"></i></a>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 21px, 0px);">
                                                        <a href="#"
                                                           onclick="showBill('{{$purch->purchases_id}}')"
                                                           class="dropdown-item"
                                                           data-toggle="tooltip"
                                                           data-placement="bottom" title=""
                                                           data-original-title="تعديل "
                                                        > <i class="icon-eye4"></i> عرض
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('template/back/assets/global_assets/js/plugins/ui/prism.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/pickers/anytime.min.js')}}"></script>

    <script src="{{asset('template/printThis.js')}}"></script>
    <script>
        function showBill(id){

            $.ajax({
                url: '{{url("dashboard/purchases/show")}}'+'/'+id,
                method: 'get',
                success: function (data) {
                    $('#invoice').modal('show');
                    $('.modal-content').html(data);
                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });
        }
        function print() {
          // $("#invoice .modal-content").printThis();
           $(".print_this").printThis();

        }
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