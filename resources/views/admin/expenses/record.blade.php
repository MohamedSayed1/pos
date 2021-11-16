@extends('admin.layout.admin')

@section('content')
    <!-- Model  add  -->
    <div id="modal_default" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حركه مصروف جديده</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{url('dashboard/expenses/record')}}" method="post">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label>البند</label>
                            <select class="form-control js-select" name="split_id"  required>
                                <option value="">اختار البند</option>
                                @foreach($splits as $v)
                                    <option {{ old('split_id') == $v->s_id ? 'selected' : '' }} value="{{ $v->s_id }}">{{$v->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('split_id'))
                                <span class="help-block">
                                     <strong class="text-danger">{{$errors->first('split_id')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label>الوصف</label>
                            <input type="text" name="desc" class="form-control"  value="{{old('desc')}}" required>
                            @if ($errors->has('desc'))
                                <span class="help-block">
                                     <strong class="text-danger">{{$errors->first('desc')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label>المبلغ</label>
                            <input type="number" min="0" step='any' name="paid"  class="form-control" value="{{old('paid')}}" required>
                            @if ($errors->has('paid'))
                                <span class="help-block">
                                     <strong class="text-danger">{{$errors->first('paid')}}</strong>
                                </span>
                            @endif
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i
                                        class="icon-checkmark2"></i></b>حفظ
                        </button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">اغلاق</button>
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
                    <h5 class="modal-title">تعديل</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{url('dashboard/expenses/record/updated')}}" method="post">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label>البند</label>
                            <select class="form-control js-select" name="split_id" id="split_id" required>
                                <option value="">اختار البند</option>
                                @foreach($splits as $v)
                                    <option {{ old('split_id') == $v->s_id ? 'selected' : '' }} value="{{ $v->s_id }}">{{$v->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('split_id'))
                                <span class="help-block">
                                     <strong class="text-danger">{{$errors->first('split_id')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label>الوصف</label>
                            <input type="text" name="desc" class="form-control" id="desc" value="{{old('desc')}}" required>
                            @if ($errors->has('desc'))
                                <span class="help-block">
                                     <strong class="text-danger">{{$errors->first('desc')}}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label>المبلغ</label>
                            <input type="number" min="0" step='any' name="paid" id="paid" class="form-control" value="{{old('paid')}}" required>
                            @if ($errors->has('paid'))
                                <span class="help-block">
                                     <strong class="text-danger">{{$errors->first('paid')}}</strong>
                                </span>
                            @endif
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input id="id" type="hidden" name="id" value="">
                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i
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
                    <span class="font-weight-semibold">حركه المصورفات</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <a href="{{ url('/dashboard/expenses') }}" class="breadcrumb-item">
                         انواع المصروفات</a>
                    <span class="breadcrumb-item active">حركه المصورفات</span>
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
                                            class="icon-plus-circle2"></i></b> اضافه حركه مصروف جديده
                            </button>
                        </h6>
                    </div>
                    <div class="card-body">

                        <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                            <thead>
                            <tr>
                                <th>نوع الصرف</th>
                                <th>التفاصيل</th>
                                <th>السعر</th>
                                <th>الاعدادات</th>
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
                                            <div class="list-icons">
                                                <div class="dropdown show">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown"
                                                       aria-expanded="top"><i class="icon-menu9"></i></a>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 21px, 0px);">
                                                        <a href="#"
                                                           class="dropdown-item  updated_expenses{{$exp->ex_id}}"
                                                           data-toggle="tooltip"
                                                           data-placement="bottom" title=""
                                                           data-original-title="تعديل "
                                                           onclick="updated({{$exp->ex_id}})"
                                                           data-desc="{{$exp->desc}}"
                                                           data-prices="{{$exp->prices}}"
                                                           data-split_id="{{$exp->split_id}}"
                                                        > <i
                                                            class="icon-pencil7"></i> تعديل
                                                        </a>
                                                        <a href="{{url('dashboard/expenses/record/del/'.$exp->ex_id)}}"
                                                           class="dropdown-item"
                                                           data-toggle="tooltip"
                                                           data-placement="bottom" title=""
                                                           data-original-title="حذف "
                                                           onclick="return confirm('هل انتا متاكد من الحذف');"

                                                        > <i
                                                            class="icon-bin2"></i> حذف
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
    <script>
        $('#no-overlay').on('click', function () {
            var block = $(this).closest('.card');
            $(block).block({
                message: '<i class="icon-spinner4 spinner"></i>',
                showOverlay: false,
                timeout: 200, //unblock after 2 seconds
                css: {
                    border: 0,
                    padding: 15,
                    backgroundColor: '#283133',
                    color: '#fff',
                    width: 46,
                    height: 46,
                    lineHeight: 1,
                    '-webkit-border-radius': '2px',
                    '-moz-border-radius': '2px',
                    opacity: 0.95
                }
            });

            $('#modal_default').modal('show');
            $('.js-select').select2();


        });

        function  updated(id)
        {
            var desc =  $('.updated_expenses'+id).data('desc');
            var prices =  $('.updated_expenses'+id).data('prices');
            var split =  $('.updated_expenses'+id).data('split_id');
            $('#paid').val(prices);
            $('#split_id').val(split).trigger('change');
            $('#desc').val(desc);
            $('#id').val(id);
            $('#modal_default_2').modal('show');
            $('.js-select').select2();

        }
    </script>
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 1)
        <script>
            $(function() {
                $('#modal_default').modal('show');
            });
        </script>
    @elseif(!empty(Session::get('error_code')) && Session::get('error_code') == 2)
        <script>
            $(function() {
                $('#modal_default_2').modal('show');
            });
        </script>
    @endif
@endsection