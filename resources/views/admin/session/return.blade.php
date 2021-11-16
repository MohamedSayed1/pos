@extends('admin.layout.admin')

@section('content')

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">المرتجعات</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <span class="breadcrumb-item active">المرتجعات</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('dashboard/session/point/return')}}" method="post">

                            <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                                <thead>
                                <tr>
                                    <th width="20">#</th>
                                    <th>الصنف</th>
                                    <th>العدد</th>
                                    <th>سعر الواحده</th>
                                    <th>الاجمالي</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="newRow">
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
                                            @foreach($products as $pro)
                                                <option value="{{$pro->product_id}}"
                                                        data-prices="{{$pro->prices}}">{{$pro->name}}
                                                    || {{$pro->parcod}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" min="1" step="1" name="count[]"
                                               class="form-control qnyNum" required disabled>
                                    </td>
                                    <td class="onePrices">

                                    </td>
                                    <td class="subtotal">
                                        0
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td id="total">0</td>
                                </tr>
                                </tfoot>
                            </table>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <button type="submit" class="btn btn-primary btn-labeled btn-labeled-left btn-lg"><b><i class="icon-file-plus"></i></b> حفظ </button>


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
    <script>
        $('.select-search').select2();

        function addmore() {
            $('#xtreme-table55 tbody').append(
                `
                    <tr class="newRow">
                                        <td>
                                            <a class="btn btn-light btn-sm" onclick="addmore()" >
                                                <i class="icon-plus3"></i></a>
                                            <hr>
                                            <a class="btn btn-light btn-sm delete_row btn-close-regust1">
                                                <i class="icon-trash-alt"></i>
                                            </a>

                                        </td>
                                        <td>
                                            <select name="product[]" class="form-control select-search select2-hidden-accessible cat_id_select" tabindex="-1" aria-hidden="true" required>
                                                <option>اختار الصنف</option>
                                                @foreach($products as $pro)
                    <option value="{{$pro->product_id}}" data-prices="{{$pro->prices}}">{{$pro->name}} || {{$pro->parcod}}</option>
                                                @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" min="1" step="1" name="count[]" class="form-control qnyNum" required disabled>
                </td>
                <td class="onePrices">

                </td>
                <td class="subtotal">
                    0
                </td>
            </tr>
`
            );
            $('.select-search').select2();
        }


        $("#xtreme-table55").on('click', '.btn-close-regust1', function () {
            if ($("#xtreme-table55 tbody tr").length != 1) {
                $(this).parents('tr').remove();
            }

        });


        $('#xtreme-table55').on('change', '.cat_id_select', function () {

            console.log($(this));
            var prices = $(this).find("option:selected").data('prices');
            $(this).parents('tr').find('.qnyNum').attr('disabled', false);
            $(this).parents('tr').find('.qnyNum').val(1);
            $(this).parents('tr').find('.subtotal').html(prices);
            $(this).parents('tr').find('.onePrices').html(prices);
            getTotal();
        });

        $('#xtreme-table55').on('change', '.qnyNum', function () {

            console.log($(this));
            var prices = $(this).parents('tr').find('.onePrices').text();
            $(this).parents('tr').find('.qnyNum').attr('disabled', false);
            var qny = $(this).parents('tr').find('.qnyNum').val();
            $(this).parents('tr').find('.subtotal').html(Number(prices) * Number(qny));

            getTotal();
        });


        function getTotal() {
            var total = 0;
            $('.subtotal').each(function () {
                total += parseFloat($(this).text());
            });

            $('#total').html(total);
        }

    </script>
@endsection