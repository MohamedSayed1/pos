@extends('admin.layout.admin')

@section('content')
    <!-- Model  add  -->
    <div id="modal_default" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل البيانات</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="addForm" method="post" action="#" enctype="multipart/form-data">
                    <div class="modal-body modael_here">
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>الاسم</label>
                            <input type="text" name="name" id="name" class="form-control" value=""
                                   required>
                            <span class="help-block">
                                <strong class="name-error text-danger"></strong>
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>اسم المستخدم</label>
                            <input type="text" name="username" id="username" class="form-control" value="" required>
                            <span class="help-block">
                                <strong class="username-error text-danger"></strong>
                            </span>

                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" id="id" value="">
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
                    <h5 class="modal-title"> تغير كلمه السر <b id="updated_title"></b></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="updated_pass" method="post" action="#">
                    <div class="modal-body moadel_updated">
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span>الرقم السري</label>
                            <input type="password" name="password" class="form-control" value=""
                                   required>
                            <span class="help-block">
                                     <strong class="password-error text-danger"></strong>
                            </span>

                        </div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span> تاكيد الرقم السري </label>
                            <input type="password" name="password_confirmation" class="form-control" value="">
                            <span class="help-block">
                                     <strong class="password_confirmation-error text-danger"></strong>
                                </span>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" id="user" value="">

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
                    <span class="font-weight-semibold">المستخدمين</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <span class="breadcrumb-item active">المستخدمين</span>
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
                        <!--h6 class="card-title">
                            <button id="no-overlay" type="button"
                                    class="btn btn-primary btn-labeled btn-labeled-left btn-lg"><b><i
                                            class="icon-plus-circle2"></i></b> اضافه منتج جديد
                            </button>
                        </h6-->
                    </div>
                    <div class="card-body">

                        <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>اسم المستخدم</th>
                                <th>النوع</th>
                                <th>الاعدادات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>
                                            <div class="list-icons">
                                                <div class="dropdown show">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown"
                                                       aria-expanded="top"><i class="icon-menu9"></i></a>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 21px, 0px);">
                                                        <a href="#"
                                                           class="dropdown-item  updated_expenses{{$user->id}}"
                                                           data-toggle="tooltip"
                                                           data-placement="bottom" title=""
                                                           data-original-title="تعديل "
                                                           onclick="updated({{$user->id}})"
                                                           data-name="{{ $user->name }}"
                                                           data-username="{{ $user->username }}"
                                                        > <i class="icon-pencil7"></i> تعديل
                                                        </a>
                                                        <a href="#"
                                                           class="dropdown-item"
                                                           data-toggle="tooltip"
                                                           data-placement="bottom" title=""
                                                           data-original-title="تعديل "
                                                           onclick="updatedPassword({{$user->id}})"
                                                        > <i class="icon-lock2"></i> تغير الرقم السري
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

        function updated(id) {
            var name = $('.updated_expenses' + id).data('name');
            var username = $('.updated_expenses' + id).data('username');
            $('#name').val(name);
            $('#username').val(username);
            $('#id').val(id);
            $('#modal_default').modal('show');
        }

        function updatedPassword(id)
        {
            $('#user').val(id);
            $('#modal_default_2').modal('show');
        }

        $(document).ready(function () {

            $('#addSubmit').click(function () {
              var data =  $('#addForm').serialize();

                $.ajax({
                    url: '{{url("/dashboard/users")}}',
                    method: 'POST',
                    data: data,
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
                        $('.username-error').html('');
                        $('.name-error').html('');

                    },
                    success: function (data) {
                        var block = $('.modael_here');
                        $(block).unblock();
                        document.getElementById("addSubmit").disabled = false;
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
              var pass =  $('#updated_pass').serialize();

                $.ajax({
                    url: '{{url("/dashboard/users/password")}}',
                    method: 'POST',
                    data: pass,
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
                        $('.username-error').html('');
                        $('.name-error').html('');

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
                        }
                       else {
                            $.each(data.data, function (key, value) {
                                $('.' + key + '-error').html(value);
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