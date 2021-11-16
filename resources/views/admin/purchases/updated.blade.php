@extends('admin.layout.admin')

@section('content')
    <!-- Model  add  -->
    <div id="modal_default" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">الصنف </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="addForm" method="post" action="#" enctype="multipart/form-data">
                    <div class="modal-body modael_here">

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

    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <a href="{{ url('/dashboard/purchases') }}" class="breadcrumb-item">
                        الفواتير</a>
                    <span class="breadcrumb-item active">تعديل الفاتوره رقم {{$purchas->in_num}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
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
                                    <label><span class="text-danger">*</span>اسم المورد</label>
                                    <input type="text" name="name" id="name_" class="form-control"
                                           value="{{old('name')!= null ?old('name'):$purchas->supplier_name}}"
                                           required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                     <strong class="name-error text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label><span class="text-danger">*</span>تاريخ</label>
                                    <input type="date" name="data_ion" id="data_ion" class="form-control"
                                           value="{{old('data_ion')!= null ?old('data_ion'):$purchas->in_data}}"
                                           required>
                                    @if ($errors->has('data_ion'))
                                        <span class="help-block">
                                     <strong class="data_ion-error text-danger">{{ $errors->first('data_ion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label><span class="text-danger">*</span>اجمالي الفاتوره</label>
                                    <input type="number" name="in_total" min="1" step="any" id="in_total"
                                           class="form-control"
                                           value="{{old('in_total')!= null ?old('in_total'):$purchas->in_total}}"
                                           required>
                                    @if ($errors->has('in_total'))
                                        <span class="help-block">
                                     <strong class="in_total-error text-danger">{{ $errors->first('in_total') }}</strong>
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
                                    <th>الاعدادات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($detalis))
                                    @foreach($detalis as $detali)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$detali->product->name}}</td>
                                            <td>{{$detali->count}}</td>
                                            <td>{{$detali->pruch_prices}}</td>
                                            <td>{{$detali->prices}}</td>
                                            <td>
                                                <div class="list-icons">
                                                    <div class="dropdown show">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown"
                                                           aria-expanded="top"><i class="icon-menu9"></i></a>
                                                        <div class="dropdown-menu" x-placement="bottom-start"
                                                             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 21px, 0px);">
                                                            <a href="#"
                                                               onclick="updatedDetailsview({{$detali->pur_id}})"
                                                               class="dropdown-item"
                                                               data-toggle="tooltip"
                                                               data-placement="bottom" title=""
                                                               data-original-title="تعديل "
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
                            <br>
                            <hr>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <button type="button" onclick="addmore()"
                                    class="btn btn-success btn-labeled btn-labeled-left btn-lg"><b><i
                                            class="icon-plus2"></i></b> اضافه سطر
                            </button>
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


        $("#xtreme-table55").on('click', '.btn-close-regust1', function () {
            if ($("#xtreme-table55 tbody tr").length != 1) {
                $(this).parents('tr').remove();
            }

        });

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
                <td> </td>
            </tr>`
            );
            $('.select-search').select2();
        }

        function  updatedDetailsview(id) {
            $.ajax({
                url: '{{url("dashboard/purchases/updated/detail")}}'+'/'+id,
                method: 'get',
                success: function (data) {
                    if(data.status == undefined)
                    {
                        $('#modal_default').modal('show');
                        $('.modael_here').html(data);
                        $('.select-search').select2();
                    }else{
                        $('#modal_default').modal('hide');
                        alert('برجاء المحاوله مره اخري .. ');
                    }

                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });
        }



    </script>
@endsection