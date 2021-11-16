@extends('admin.layout.admin')
@section('css')
    <style>

        #calac_tabel {
            width: 100%;
            border-color: #f4f4f4;
            max-width: 73%;
            margin: 0 auto;
        }

        .calactor_buttom {
            width: 73%;
            height: 50px;
            font-size: 20px;
            background-color: white;
            border: none;
        }

        #inputLabel {
            height: 40px;
            font-size: 20px;
            vertical-align: bottom;
            text-align: right;
            padding-right: 16px;
            background-color: #ececec;
            overflow-wrap: break-word !important;
            word-wrap: break-word !important;
            hyphens: auto !important;

        }

        #acButton {
            background-color: #a0144b;
        }

        .media-list {
            max-height: 28%;
            overflow-y: auto;
            height: 300px;
        }

    </style>
@endsection
@section('content')
    <div id="modal_default" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_pay">

            </div>
        </div>
    </div>

    <div id="modal_default2" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_expenses">

            </div>
        </div>
    </div>

    <div id="modal_default3" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_close">

            </div>
        </div>
    </div>
    <!-- Page header -->

    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <span class="breadcrumb-item active">المنتجات</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card scroll_product">
                    <div class="card-header bg-light header-elements-inline">
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" id="serach" class="form-control form-control-lg"
                                   placeholder="اسم المنتج , الباركود">
                            <div class="form-control-feedback form-control-feedback-lg">
                                <i class="icon-search4"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" id="fetch_data">
                        @include('admin.session.product')
                    </div>
                    <!-- /left content -->
                </div>
            </div>
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="text-uppercase font-size-sm font-weight-semibold">الفاتوره</span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" id="cart_product">
                        @include('admin.session.cart')
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="text-uppercase font-size-sm font-weight-semibold"><i class="icon-calculator2"></i></span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-wrap">
                        <table id="calac_tabel" class="pull-sm-left" border="1" cellspacing="0">
                            <tr>
                                <td colspan="4" class="text-nowrap" id="inputLabel">0</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button class="calactor_buttom" id="acButton" onclick="pushBtn(this);">AC</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">/</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">7</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">8</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">9</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">*</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">4</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">5</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">6</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">-</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">1</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">2</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">3</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">+</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="calactor_buttom" onclick="pushBtn(this);">0</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">.</button>
                                </td>
                                <td>
                                    <button class="calactor_buttom" onclick="pushBtn(this);">=</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card border-left-3 border-left-success rounded-left-0">
                    <div class="card-body">
                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                            <div>
                                <h6 class="font-weight-semibold">{{Auth()->user()->open_seesion}}</h6>
                            </div>

                            <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                <h6 class="font-weight-semibold"><a href="{{url('dashboard/session/point/return')}}" target="_blank" class="text-default" title="المرتجع"><i class="icon-move-down"></i></a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
						<span>
							<span class="badge badge-mark border-success mr-2"></span>
							<span class="font-weight-semibold">{{Carbon\Carbon::now()->format('Y-m-d')}}</span>
						</span>
                        <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                            <li class="list-inline-item">
                                <a href="#" onclick="expenses()" class="text-default" title="مصروفات"><i class="icon-exit3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" onclick="closeSession()" class="text-default" title="غلق الورديه" ><i class="icon-file-locked2"></i></a>
                            </li>
                        </ul>
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
    <script src="{{asset('template/back/assets/global_assets/js/demo_pages/form_input_groups.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/forms/inputs/touchspin.min.js')}}"></script>

    <script>
        /*   get Product */
        $(document).ready(function () {
            $(document).on('click', '.page-link', function (event) {
                event.preventDefault();

                var page = $(this).attr('href').split('page=')[1];
                var serach = $('#serach').val();
                fetch_data(page, serach);
            });

            $(document).on('keyup', '#serach', function () {
                var serach = $('#serach').val();
                fetch_data(1, serach);
            });

            function fetch_data(page, serach) {
                $.ajax({
                    url: "{{url('/dashboard/session/pagintaion/fetch_data?page=')}}" + page + "&serach=" + serach,
                    beforeSend: function () {

                    },
                    success: function (data) {
                        $('#fetch_data').html(data);

                    }
                });
            }
        });

        /*   End Product */

        /*   calculator */

        var inputLabel = document.getElementById('inputLabel');

        function pushBtn(obj) {

            var pushed = obj.innerHTML;

            if (pushed == '=') {
                // Calculate
                inputLabel.innerHTML = eval(inputLabel.innerHTML);

            } else if (pushed == 'AC') {
                // All Clear
                inputLabel.innerHTML = '0';

            } else {
                if (inputLabel.innerHTML == '0') {
                    inputLabel.innerHTML = pushed;

                } else {
                    inputLabel.innerHTML += pushed;
                }
            }

        }

        /*  End calculator */

        /*  Cart  */
        /*  add  */
        function addCard(id) {
            $.ajax({
                url: '{{url("card/add/")}}/' + id,
                method: 'get',
                success: function (data) {
                    $('#cart_product').html(data);
                    $('.touchspin-no-mousewheel').TouchSpin({
                        mousewheel: false
                    });
                    $('.media-list').css({
                        'max-height': '28%',
                        'overflow-y': 'auto',
                        'height': '300px',
                    });

                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });

        }
        /*  updated   */
        function quty(id, object) {
            $.ajax({
                url: '{{url("card/updated")}}',
                method: 'post',
                data: {
                    id: id,
                    q: object.value,
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    $('#cart_product').html(data);
                    $('.touchspin-no-mousewheel').TouchSpin({
                        mousewheel: false
                    });
                    $('.media-list').css({
                        'max-height': '28%',
                        'overflow-y': 'auto',
                        'height': '300px',
                    });

                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });
        }
       /* deleted  */
        function deleteCart(id) {

            $.ajax({
                url: '{{url("card/del/")}}/' + id,
                method: 'get',
                beforeSend: function () {
                    return confirm("تاكيد الحذف من الفاتوره");
                },
                success: function (data) {
                    $('#cart_product').html(data);
                    $('.touchspin-no-mousewheel').TouchSpin({
                        mousewheel: false
                    });

                    $('.media-list').css({
                        'max-height': '28%',
                        'overflow-y': 'auto',
                        'height': '300px',
                    });

                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });


        }
        function dumpbill() {
            $.ajax({
                url: '{{url("card/dump")}}',
                method: 'get',
                beforeSend: function () {
                    return confirm("تاكيد تفريغ الفاتوره ؟؟");
                },
                success: function (data) {
                    $('#cart_product').html(data);
                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });
        }
        /* save and pay   */
        function pay() {

            $('#modal_default').modal('show');

            $.ajax({
                url: '{{url("card/pay/view")}}',
                method: 'get',
                success: function (data) {
                    $('#modal_pay').html(data);
                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });

        }
        function savebill() {
            var dic = $('#discount').val();
            $.ajax({
                url: '{{url("card/paid")}}'+'/'+dic,
                method: 'get',
                success: function (data) {

                    $('#modal_default').modal('hide');
                    $('#cart_product').html('');
                    var url = "{{url('/dashboard/session/point/get/bill')}}" + '/' + data.data;
                    if (data.status == 200) {
                        Swal.fire({
                            title: 'عمل رائع',
                            text: "هل تريد طباعه الفاتوره",
                            showCancelButton: true,
                            confirmButtonColor: '#008000',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'طباعه',
                            cancelButtonText: 'غلق',
                        }).then((result) => {
                            if (result.value) {
                                window.open(url, "_blank", "width=500, height=500");
                            } else {
                                var serach = $('#serach').val();
                                fetch_data(1, serach);
                            }
                        });
                    }
                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });

        }
        /*  Accounts total & discount */
        function rest(object, total) {
            var paid = object.value;
            var dic  = $('#discount').val();
            var etotal = Number(total) - Number(dic);
            var oprate = Number(paid) - Number(etotal);
            $('#rest_total').html(oprate);
        }

        function discount_res(ob,object) {
            var paid = object;
            var total  = $('#paid_total').val();
            var dic   = ob.value;
            var etotal = Number(paid) - Number(dic);
            var oprate =  Number(total) - Number(etotal);
            $('#rest_total').html(oprate);
        }
        /* end Cart  */
        /*  Expenses */
        /*  Expenses */
        function expenses() {
            $('#modal_default2').modal('show');

            $.ajax({
                url: '{{url("card/expenses/view")}}',
                method: 'get',
                success: function (data) {
                    $('#modal_expenses').html(data);
                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });

        }
        function expesnes_send() {
            $.ajax({
                url: '{{url("card/expenses/view")}}',
                method: 'post',
                data: {
                    details: $('#details_expen').val(),
                    total: $('#total_expens').val(),
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    if (data.status == 200) {
                        Swal.fire(
                            'احسنت',
                            'تم اضافه المصروف بنجاح',
                            'success'
                        );
                        $('#modal_default2').modal('hide');
                    } else {
                        $.each(data.data, function (key, value) {
                            $('.' + key + '-expens-error').html(value);
                        });
                    }

                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });
        }
        /* End Expenses */
        /*   Close Session */
        function closeSession() {
            $('#modal_default3').modal('show');

            var session_id = '{{Auth()->user()->open_seesion}}' ;

            $.ajax({
                url: '{{url("dashboard/session/point/pref/total")}}'+'/'+session_id,
                method: 'get',
                success: function (data) {
                    $('#modal_close').html(data);
                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });
        }
        function closeResponse() {
           var data = $('#closeSession').serialize();

            $.ajax({
                url: '{{url("dashboard/session/point/pref/total")}}',
                method: 'post',
                data:data,
                success: function (data) {
                    if (data.status == 200) {
                        Swal.fire(
                            'احسنت',
                            'تم غلق الورديه',
                            'success'
                        );
                        location.reload();
                    }else{
                        $.each(data.data, function (key, value) {
                            $('.' + key + '-updated-error').html(value);
                        });
                    }
                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                }
            });

        }
        /* End  Close Session */

    </script>


@endsection