@extends('admin.layout.admin')

@section('content')
    <!-- Model  add  -->
    <div id="modal_default" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">فتح الجلسه</h5>
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
    <div id="modal_default_2" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> تعديل <b id="updated_title"></b></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="updatedForm" method="post" action="#" enctype="multipart/form-data">
                    <div class="modal-body moadel_updated">
                        <div class="text-center">
                            <div class="card-img-actions d-inline-block mb-3">
                                <img class="rounded-circle" id="iamge_updated_show" src="" width="160" height="160"
                                     alt="">
                                <div class="card-img-actions-overlay card-img rounded-circle">
                                    <a id="iamge_updated_url" target="_blank" href="#"
                                       class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round legitRipple">
                                        <i class="icon-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>الاسم</label>
                            <input type="text" name="name" id="name_updated" class="form-control" value=""
                                   required>
                            <span class="help-block">
                                     <strong class="name-updated-error text-danger"></strong>
                                </span>

                        </div>
                        <div class="col-md-12">
                            <label>البركود</label>
                            <input type="text" name="parcod" id="parcod_updated" class="form-control" value="">
                            <span class="help-block">
                                     <strong class="parcod-updated-error text-danger"></strong>
                                </span>

                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>العدد</label>
                            <input type="number" min="0" id="count_updated" step='any' name="count" class="form-control"
                                   value="{{old('count')}}" required>
                            <span class="help-block">
                                     <strong class="count-updated-error text-danger"></strong>
                                </span>

                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>سعر التكلفة </label>
                            <input type="number" min="0" step='any' id="pruch_prices_updated" name="pruch_prices"
                                   class="form-control"
                                   value="" required>
                            <span class="help-block">
                                     <strong class="pruch_prices-updated-error text-danger"></strong>
                                </span>
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>سعر البيع</label>
                            <input type="number" min="0" step='any' id="prices_updated" name="prices"
                                   class="form-control"
                                   value="{{old('prices')}}" required>
                            <span class="help-block">
                                     <strong class="prices-updated-error text-danger"></strong>
                                </span>
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>خصم</label>
                            <input type="number" min="0" step='any' id="discount_updated" name="discount"
                                   class="form-control"
                                   value="" required>
                            <span class="help-block">
                                 <strong class="prices-updated-error text-danger"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>الصوره</label>
                            <input type="file" name="photo" id="photo_updated" class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                            <span class="help-block">
                                     <strong class="photo-updated-error text-danger"></strong>
                                </span>

                        </div>


                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input id="id" type="hidden" name="id" value="">
                    </div>

                    <div class="modal-footer ">
                        <button type="submit" id="updatedSubmit"
                                class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i
                                        class="icon-checkmark2"></i></b>حفظ
                        </button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">المنتجات</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <span class="breadcrumb-item active">المنتجات</span>
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
                            <button id="no-overlay" type="button"
                                    class="btn btn-primary btn-labeled btn-labeled-left btn-lg"><b><i
                                            class="icon-plus-circle2"></i></b> اضافه منتج جديد
                            </button>
                        </h6>
                    </div>
                    <div class="card-body">

                        <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                            <thead>
                            <tr>
                                <th>رقم الجلسه</th>
                                <th>فتحت بواسطه</th>
                                <th>تاريخ الفتح</th>
                                <th>رصيد الافتتاحي</th>
                                <th>اغلاق بواسطه</th>
                                <th>مبلغ الغلق</th>
                                <th>وقت الغلق</th>
                                <th>الاعدادات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($session))
                                @foreach($session as $sess)
                                    <tr>
                                        <td>{{ $sess->num_session }}</td>
                                        <td>{{ $sess->user_id_open }}</td>
                                        <td>{{ $sess->created_at }}</td>
                                        <td>{{ $sess->opening_balance }}</td>
                                        <td>{{ $sess->user_id_close }}</td>
                                        <td>{{ $sess->close_balance }}</td>
                                        <td>{{ $sess->close_at }}</td>
                                        <td>
                                            <div class="list-icons">
                                                <div class="dropdown show">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown"
                                                       aria-expanded="top"><i class="icon-menu9"></i></a>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 21px, 0px);">
                                                        <a href="#"
                                                           class="dropdown-item  updated_expenses{{$sess->session_id}}"
                                                           data-toggle="tooltip"
                                                           data-placement="bottom" title=""
                                                           data-original-title="تعديل "
                                                           onclick="updated({{$sess->session_id}})"
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
        $('#no-overlay').on('click', function () {
            $('#modal_default').modal('show');

            var block = $('.modael_here');
            $(block).block({
                message: '<span class="font-weight-semibold float-left left">..برجاء الانتظار</span>',
                timeout: 200,
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

        });

        function updated(id) {
            var name = $('.updated_expenses' + id).data('name');
            $('#name_updated').val(name);
            $('#id').val(id);
            $('#modal_default_2').modal('show');

            $.ajax({
                url: '{{url("/dashboard/products/get")}}/' + id,
                method: 'get',
                beforeSend: function () {
                    document.getElementById("updatedSubmit").disabled = true;
                    var block = $('.moadel_updated');
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
                    var block = $('.moadel_updated');
                    $(block).unblock();
                    document.getElementById("updatedSubmit").disabled = false;
                    if (data.status == 200) {
                        console.log(data.data);
                        $('#updated_title').html(data.data.name);
                        $('#name_updated').val(data.data.name);
                        $('#parcod_updated').val(data.data.parcod);
                        $('#count_updated').val(data.data.count);
                        $('#pruch_prices_updated').val(data.data.pruch_prices);
                        $('#prices_updated').val(data.data.prices);
                        $('#discount_updated').val(data.data.discount);
                        $('#id').val(data.data.product_id);
                        if (data.data.photo !== null) {

                            var url = "{{url('/upload/')}}" + '/' + data.data.photo;
                            console.log(url);
                            $('#iamge_updated_show').attr("src", url);
                            $('#iamge_updated_url').attr("href", url);
                        } else {

                            var defu = '{{asset("/template/back/assets/global_assets/images/no-image.png")}}';
                            $('#iamge_updated_show').attr("src", defu);
                            $('#iamge_updated_url').attr("href", defu);
                        }


                    } else {
                        alert('برجاء التاكد من وجود هذا المنتج');
                        $('#modal_default_2').modal('hide');
                    }

                },
                error: function (data) {
                    alert('برجاء المحاوله مره اخري .. ');
                    var block = $('.modael_here');
                    $(block).unblock();
                    document.getElementById("addSubmit").disabled = false;

                }
            });
        }


        $('.form-input-styled').uniform({
            fileButtonClass: 'action btn bg-pink-400'
        });


        $(document).ready(function () {
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
                        document.getElementById("addSubmit").disabled = true;
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
                        document.getElementById("addSubmit").disabled = false;
                        if (data.status == 200) {
                            Swal.fire({
                                title: 'تم الحفظ  عمل رائع',
                                text: "هل تريد ادخال المزيد",
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonColor: '#008000',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'حفظ وعوده',
                                cancelButtonText: 'حفظ والاستمرار للاضافه منتج اخري',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();

                                } else {
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
                                    $('#back_button').append(
                                        '<button type="button" onclick="window.location.reload();" class="btn btn-link" data-dismiss="modal">اغلاق</button>'
                                    );
                                }
                            })
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
                        document.getElementById("addSubmit").disabled = false;

                    }
                });


            });

            $('#updatedSubmit').click(function () {
                if ($('#photo_updated')[0].files.length != 0) {
                    var photo_updated = $('#photo_updated')[0].files[0];

                }

                var name_updated = $('#name_updated').val();
                var parcod_updated = $('#parcod_updated').val();
                var count_updated = $('#count_updated').val();
                var pruch_prices_updated = $('#pruch_prices_updated').val();
                var prices_updated = $('#prices_updated').val();
                var discount_updated = $('#discount_updated').val();
                var id = $('#id').val();

                var formData = new FormData();
                alert(name_updated);
                formData.append("_token", '{!! csrf_token() !!}');
                formData.append("name", name_updated);
                formData.append("parcod", parcod_updated);
                formData.append("count", count_updated);
                formData.append("pruch_prices", pruch_prices_updated);
                formData.append("prices", prices_updated);
                formData.append("id", id);
                formData.append("discount", discount_updated);
                if ($('#photo_updated')[0].files.length != 0) {
                    formData.append("photo", photo_updated);
                }


                $.ajax({
                    url: '{{url("/dashboard/products/get")}}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        document.getElementById("updatedSubmit").disabled = true;
                        var block = $('.moadel_updated');
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
                        $('.photo-updated-error').html('');
                        $('.name-updated-error').html('');
                        $('.parcod-updated-error').html('');
                        $('.count-updated-error').html('');
                        $('.pruch_prices-updated-error').html('');
                        $('.prices-updated-error').html('');
                        $('.discount-updated-error').html('');
                    },
                    success: function (data) {
                        var block = $('.moadel_updated');
                        $(block).unblock();
                        document.getElementById("updatedSubmit").disabled = false;
                        if (data.status == 200) {
                            Swal.fire(
                                'احسنت',
                                'تم التعديل بنجاح',
                                'success'
                            );
                            location.reload();
                        } else {
                            $.each(data.data, function (key, value) {
                                $('.' + key + '-updated-error').html(value);
                            });
                        }

                    },
                    error: function (data) {
                        alert('برجاء المحاوله مره اخري .. ');
                        var block = $('.moadel_updated');
                        $(block).unblock();
                        document.getElementById("updatedSubmit").disabled = false;

                    }
                });


            });
        });
    </script>

@endsection