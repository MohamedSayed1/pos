@extends('admin.layout.admin')

@section('content')
    <!-- Model  add  -->
    <div id="add_suppliers" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافه مورد جديد</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="addForm" method="post" action="#">
                    <div class="modal-body modael_here">
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>الاسم</label>
                            <input type="text" name="name" id="name" placeholder="ادخل اسم المورد"  class="form-control" value=""
                                   required>
                            <span class="help-block">
                                <strong class="name-error text-danger"></strong>
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>الهاتف</label>
                            <input type="number" name="phone" placeholder="ادخل رقم الهاتف" id="phone" class="form-control" value="" required>
                            <span class="help-block">
                                <strong class="phone-error text-danger"></strong>
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger"></span>اسم الشركه</label>
                            <input type="text" name="company" id="company" placeholder="ادخل اسم الشركه" class="form-control" value="">
                            <span class="help-block">
                                <strong class="company-error text-danger"></strong>
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger"></span>اسم الشركه</label>
                           <textarea class="form-control" name="address" rows="3" placeholder="ادخل العنوان"></textarea>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>

                    <div class="modal-footer ">

                        <button type="button" id="submitAddSupplier" onclick="saveAdd()"
                                class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i
                                        class="icon-checkmark2"></i></b>حفظ
                        </button>
                        <div id="back_button">
                            <button type="button" class="btn btn-link" data-dismiss="modal">اغلاق</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Model  add  -->
    <div id="updated_suppliers" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" id="updated_content">


            </div>
        </div>
    </div>


    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">الموردين</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <span class="breadcrumb-item active">الموردين</span>
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
                          <span class="d-block font-size-base">هنا تسطيع البحث عن المودر عن طريق الاسم او رقم الهاتف</span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{url('dashboard/suppliers')}}" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label><span class="text-danger"></span>الاسم</label>

                                    <input type="text" name="name"  placeholder="ادخل اسم المورد"  class="form-control" value="{{app('request')->input('name')}}">

                                </div>
                                <div class="col-md-6">
                                    <label><span class="text-danger"></span>الهاتف</label>
                                    <input type="number" name="phone" placeholder="ادخل رقم الهاتف"  class="form-control" value="{{app('request')->input('phone')}}">
                                </div>
                            </div>
                            <br>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-labeled btn-labeled-left btn-lg"><b><i
                                                class="icon-search4"></i></b> بحث
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">
                            <button onclick="openAdd()" type="button"
                                    class="btn btn-primary btn-labeled btn-labeled-left btn-lg"><b><i
                                            class="icon-plus-circle2"></i></b>اضافه مورد
                            </button>
                        </h6>
                    </div>
                    <div class="card-body">

                        <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>الهاتف </th>
                                <th>الشركه</th>
                                <th>العنوان</th>
                                <th>الاعدادات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($suppliers))
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>{{ $supplier->company }}</td>
                                        <td><div style=" word-break: break-all;">
                                                {{ $supplier->address }}
                                            </div>

                                        </td>
                                        <td>
                                            <div class="list-icons">
                                                <div class="dropdown show">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown"
                                                       aria-expanded="top"><i class="icon-menu9"></i></a>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 21px, 0px);">
                                                        <a href="#"
                                                           class="dropdown-item"
                                                           data-toggle="tooltip"
                                                           data-placement="bottom" title=""
                                                           data-original-title="تعديل "
                                                           onclick="updated({{$supplier->supplier_id}})"
                                                        > <i class="icon-pencil7"></i> تعديل
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
    <script>
        function openAdd() {
            $('#add_suppliers').modal('show');

        }
        function saveAdd() {
            var data =  $('#addForm').serialize();
            $.ajax({
                url: '{{url("/dashboard/suppliers/add")}}',
                method: 'POST',
                data: data,
                beforeSend: function () {
                    document.getElementById("submitAddSupplier").disabled = true;
                },
                success: function (data) {
                    document.getElementById("submitAddSupplier").disabled = false;
                    if (data.status == 200) {
                        Swal.fire(
                            'احسنت',
                            'تم الحفظ بنجاح',
                            'success'
                        );
                        location.reload();
                    }
                    else {
                        $.each(data.data, function (key, value) {
                            $('.' + key + '-error').html(value);
                        });
                    }

                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                    document.getElementById("submitAddSupplier").disabled = false;

                }
            });
        }
        function updated(id) {

            $.ajax({
                url: '{{url("dashboard/suppliers/updated")}}'+'/'+id,
                method: 'get',
                success: function (data) {
                    if(data.status !== 'undefined')
                    {
                        $('#updated_suppliers').modal('show');
                        $('#updated_content').html(data);
                    }else{
                        Swal.fire(
                            'حدث خطأ',
                            'برجاء المحاوله مره اخري ..',
                            'error'
                        );
                    }

                },
                error: function (data) {
                    Swal.fire(
                        'حدث خطأ',
                        'برجاء المحاوله مره اخري ..',
                        'error'
                    );
                }
            });
        }
        function saveUpdated() {
            var data =  $('#updated_supp').serialize();
            $.ajax({
                url: '{{url("/dashboard/suppliers/updated")}}',
                method: 'POST',
                data: data,
                beforeSend: function () {
                    document.getElementById("submitupdatedSupplier").disabled = true;
                },
                success: function (data) {
                    document.getElementById("submitupdatedSupplier").disabled = false;
                    if (data.status == 200) {
                        Swal.fire(
                            'احسنت',
                            'تم التعديل بنجاح',
                            'success'
                        );
                        location.reload();
                    }
                    else {
                        $.each(data.data, function (key, value) {
                            $('.' + key + '-updatederror').html(value);
                        });
                    }

                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                    document.getElementById("submitupdatedSupplier").disabled = false;

                }
            });
        }
    </script>

@endsection