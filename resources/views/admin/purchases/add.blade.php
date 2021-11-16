@extends('admin.layout.admin')

@section('content')
    <!-- Model  add  -->
    <div id="modal_default" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافه منتج جديد</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="addForm" method="post" action="#" enctype="multipart/form-data">
                    <div class="modal-body modael_here">
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>الاسم</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}"
                                   required>
                            <span class="help-block">
                                     <strong class="name-error text-danger"></strong>
                                </span>

                        </div>
                        <div class="col-md-12">
                            <label>البركود</label>
                            <input type="text" name="parcod" id="parcod" class="form-control" value="{{old('parcod')}}">
                            <span class="help-block">
                                     <strong class="parcod-error text-danger"></strong>
                                </span>

                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>العدد</label>
                            <input type="number" min="0" id="count" step='any' name="count" class="form-control"
                                   value="{{old('count')}}" required>
                            <span class="help-block">
                                     <strong class="count-error text-danger"></strong>
                                </span>

                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>سعر التكلفة </label>
                            <input type="number" min="0" step='any' id="pruch_prices" name="pruch_prices"
                                   class="form-control"
                                   value="{{old('pruch_prices')}}" required>
                            @if ($errors->has('pruch_prices'))
                                <span class="help-block">
                                     <strong class="pruch_prices-error text-danger"></strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>سعر البيع</label>
                            <input type="number" min="0" step='any' id="prices" name="prices" class="form-control"
                                   value="{{old('prices')}}" required>
                            <span class="help-block">
                                     <strong class="prices-error text-danger"></strong>
                                </span>
                        </div>
                        <div class="form-group">
                            <label>الصوره</label>
                            <input type="file" name="photo" id="photo" class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                            <span class="help-block">
                                     <strong class="photo-error text-danger"></strong>
                                </span>

                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>

                    <div class="modal-footer ">

                        <button type="button" id="addSubmit"
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

    <!-- Model  add  -->
    <div id="add_suppliers" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافه مورد جديد</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="addsupp" method="post" action="#">
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

    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <a href="{{ url('/dashboard/purchases') }}" class="breadcrumb-item">
                        الفواتير</a>
                    <span class="breadcrumb-item active">اضافه فاتوره</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-body border-top-1 border-top-pink">
                    <div class="text-center">
                        <h6 class="m-0 font-weight-semibold">اضافه منتج</h6>
                        <p class="text-muted mb-3">هنا تستطيع اضافه منتج جديد</p>

                        <button type="button" onclick="addProd()" class="btn btn-primary legitRipple"><i
                                    class="icon-plus-circle2 mr-2"></i>اضافه
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-body border-top-1 border-top-slate">
                    <div class="text-center">
                        <h6 class="m-0 font-weight-semibold">اضافه مورد</h6>
                        <p class="text-muted mb-3">هنا تستطيع اضافه مورد</p>

                        <button type="button" onclick="addsup()" class="btn btn-primary legitRipple"><i
                                    class="icon-plus-circle2 mr-2"></i>اضافه
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <form action="{{url('dashboard/purchases/add')}}" method="post">
                            <div class="mb-3">
                                <h6 class="mb-0 font-weight-semibold">
                                    المعلومات الاساسيه
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label><span class="text-danger">*</span> المورد</label>
                                    <select  name="name" id="name_" class="form-control"
                                           required>
                                        <option>dsfdsfds</option>
                                    </select>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                     <strong class="name-error text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label><span class="text-danger">*</span>تاريخ</label>
                                    <input type="date" name="data_ion" id="data_ion" class="form-control"
                                           value="{{old('data_ion')}}"
                                           required>
                                    @if ($errors->has('data_ion'))
                                        <span class="help-block">
                                     <strong class="data_ion-error text-danger">{{ $errors->first('data_ion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="mb-3">
                                <h6 class="mb-0 font-weight-semibold">
                                    الاصناف
                                </h6>
                            </div>
                            <table id="xtreme-table55" class="table expensessetupPage">
                                <thead>
                                <tr>
                                    <th width="20">#</th>
                                    <th>الصنف</th>
                                    <th>العدد</th>
                                    <th>سعر الشراء</th>
                                    <th> سعر البيع</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <hr>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-lg"><b><i
                                            class="icon-file-plus"></i></b> حفظ
                            </button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('template/back/assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/ui/prism.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
    <script>
        $('.select-search').select2();
        $('#name_').select2();


        $("#xtreme-table55").on('click', '.btn-close-regust1', function () {
            if ($("#xtreme-table55 tbody tr").length != 1) {
                $(this).parents('tr').remove();
            }

        });


        function addProd() {
            $('#modal_default').modal('show');
        }

        function addsup() {
            $('#add_suppliers').modal('show');
        }
        function saveAdd() {
            var data =  $('#addsupp').serialize();
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
                        let  select = document.getElementById('name_');
                        let opt = document.createElement('option');
                        opt.value = data.id;
                        opt.innerHTML = data.value;
                        select.appendChild(opt);
                        $('#name_').val(opt.value).trigger('change');
                        $('#add_suppliers').modal('hide');
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

        function addmore() {
            $.ajax({
                url: '{{url("dashboard/purchases/get/product")}}',
                method: 'get',
                success: function (data) {
                    var option = '';
                    var lenth = data.data.length;
                    for (var i = 0, len = lenth; i < len; ++i) {
                        option += '<option value="' + data.data[i]['product_id'] + '">' + data.data[i]['name'] + '</option>';
                    }

                    appendMore(option);

                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });
        }

        function appendMore(op) {
            $('#xtreme-table55 tbody').append(
                `<tr class="newRow">
                                    <td>
                                        <a class="btn btn-light btn-sm" onclick="addmore()">
                                            <i class="icon-plus3"></i></a>
                                        <hr>
                                        <a class="btn btn-light btn-sm delete_row btn-close-regust1">
                                            <i class="icon-trash-alt"></i>
                                        </a>

                                    </td>
                                    <td>
                                         <select name="product[]"
                                                class="form-control select-search select2-hidden-accessible cat_id_select"
                                                tabindex="-1" aria-hidden="true" required>
                                            <option value="">اختار الصنف</option>
                                            ` + op + `
                                            </select>

                                     </td>
                <td>
                    <input type="number" min="1" step="1" name="count[]"
                           class="form-control" required>
                </td>
                <td>
                    <input type="number" min="0" step="any" name="pruch_prices[]"
                           class="form-control" required>
                </td>
                <td>
                    <input type="number" min="0" step="any" name="prices[]"
                           class="form-control" required>
                </td>
            </tr>`
            );
            $('.select-search').select2();
        }


        $(document).ready(function () {
            addmore();
            $('#addSubmit').click(function () {
                if ($('#photo')[0].files.length != 0) {
                    var photo = $('#photo')[0].files[0];

                }

                var name = $('#name').val();
                var parcod = $('#parcod').val();
                var count = $('#count').val();
                var pruch_prices = $('#pruch_prices').val();
                var prices = $('#prices').val();

                var formItem = new FormData();
                formItem.append("_token", '{!! csrf_token() !!}');
                formItem.append("name", name);
                formItem.append("parcod", parcod);
                formItem.append("count", count);
                formItem.append("pruch_prices", pruch_prices);
                formItem.append("prices", prices);
                if ($('#photo')[0].files.length != 0) {
                    formItem.append("photo", photo);
                }


                $.ajax({
                    url: '{{url("/dashboard/products")}}',
                    method: 'POST',
                    data: formItem,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        var block = $('.modael_here');
                        $(block).block({
                            message: '<span class="font-weight-semibold float-left left">..برجاء الانتظار</span>',
                            overlayCSS: {
                                backgroundColor: '#1b2024',
                                opacity: 0.8,
                                zIndex: 1200,
                                cursor: 'wait'
                            },
                            css: {
                                border: 0,
                                color: '#fff',
                                padding: 10,
                                zIndex: 1201,
                                backgroundColor: 'transparent'
                            },
                        });
                        $('.photo-error').html('');
                        $('.name-error').html('');
                        $('.parcod-error').html('');
                        $('.count-error').html('');
                        $('.pruch_prices-error').html('');
                        $('.prices-error').html('');
                    },
                    success: function (data) {
                        var block = $('.modael_here');
                        $(block).unblock();
                        if (data.status == 200) {
                            Swal.fire(
                                'احسنت',
                                'تم اضافه المنتج',
                                'success'
                            );
                            $('#photo').val('');
                            $('#name').val('');
                            $('#parcod').val('');
                            $('#count').val('');
                            $('#pruch_prices').val('');
                            $('#prices').val('');
                            $('.photo-error').html('');
                            $('.name-error').html('');
                            $('.parcod-error').html('');
                            $('.count-error').html('');
                            $('.pruch_prices-error').html('');
                            $('.prices-error').html('');
                            $('#back_button').empty();
                            $('#modal_default').modal('hide');

                        } else {
                            $.each(data.data, function (key, value) {
                                $('.' + key + '-error').html(value);
                            });
                        }

                    },
                    error: function (data) {
                        alert('برجاء المحاوله مره اخري .. ');
                        var block = $('.modael_here');
                        $(block).unblock();

                    }
                });


            });

        });

    </script>
@endsection