@extends('admin.layout.admin')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">حركه الصنف</span></h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ url('/dashboard') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> الرئيسيه</a>
                    <span class="breadcrumb-item active">تقرير حركه الصنف</span>
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

                        <table  class="table expensessetupPage">
                            <thead>
                            <tr>
                                <th>اسم المنتج</th>
                                <th>الباركود</th>
                                <th>الصوره</th>
                                <th>العدد</th>
                                <th>سعر الشراء </th>
                                <th>سعر البيع </th>

                            </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->parcod }}</td>
                                        <td>
                                            @if(!empty($product->photo) && file_exists(public_path().'/upload/'.$product->photo))
                                                <div class="mr-md-3 mb-2 mb-md-0">
                                                    <a target="_blank" href="{{url('upload/'.$product->photo)}}">
                                                        <img src="{{url('upload/'.$product->photo)}}" class="rounded-circle"
                                                             width="42" height="42" alt="">
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $product->count }}</td>
                                        <td>{{ $product->pruch_prices }}</td>
                                        <td>{{ $product->prices}}</td>

                                    </tr>
                            </tbody>
                        </table>

                    </div>

                    <div class="card-body">
                        <hr>
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item"><a href="#bottom-justified-tab1" class="nav-link active show"
                                                    data-toggle="tab"><span class="badge badge-danger badge-pill mr-2">{{$countPurch}}</span> الشراء</a></li>

                            <li class="nav-item"><a href="#bottom-justified-tab2" class="nav-link" data-toggle="tab"><span class="badge badge-info badge-pill mr-2">{{$countSale}}</span>البيع</a>
                            </li>
                            <li class="nav-item"><a href="#bottom-justified-tab3" class="nav-link" data-toggle="tab"><span class="badge bg-slate badge-pill mr-2">{{$countReturn}}</span>المرتجعات</a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="bottom-justified-tab1">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                                            <thead>
                                            <tr>
                                                <th>التاريخ</th>
                                                <th>رقم الفاتوره</th>
                                                <th>المورد</th>
                                                <th>سعر الشراء</th>
                                                <th>العدد</th>
                                                <th> سعر البيع</th>
                                                <th>اجمالي المدفوع</th>
                                                <th>صافي الربح</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($purch))
                                                @foreach($purch as $pur)
                                                    <tr>
                                                        <td>{{ $pur->purchases->in_data }}</td>
                                                        <td>{{ $pur->purchases->in_num }}</td>
                                                        <td>{{ $pur->purchases->supplier_name }}</td>
                                                        <td>{{ $pur->pruch_prices }}</td>
                                                        <td>{{ $pur->count }}</td>
                                                        <td>{{ $pur->prices }}</td>
                                                        <td>{{ $pur->pruch_prices * $pur->count }}</td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>المكسب المتوقع</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>{{ $totalExpected ?? '' }}</th>
                                                <th>{{ $totalPurch ?? '' }}</th>
                                                <th>{{$totalExpected - $totalPurch }}</th>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="bottom-justified-tab2">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                                            <thead>
                                            <tr>
                                                <th>التاريخ</th>
                                                <th>السعر الشراء</th>
                                                <th>العدد</th>
                                                <th>سعر البيع </th>
                                                <th>الاجمالي</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($sales))
                                                @foreach($sales as $sale)
                                                    <tr>
                                                        <td>{{ $sale->created_at }}</td>
                                                        <td>{{ $sale->pruch_prices }}</td>
                                                        <td>{{ $sale->quantity }}</td>
                                                        <td>{{ $sale->paid }}</td>
                                                        <td>{{ $sale->paid * $sale->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>الاجمالي</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>{{ $totalSales ?? '' }}</th>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="bottom-justified-tab3">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="xtreme-table55" class="tasks-list table expensessetupPage">
                                            <thead>
                                            <tr>
                                                <th>التاريخ</th>
                                                <th>السعر الشراء</th>
                                                <th>العدد</th>
                                                <th>سعر البيع </th>
                                                <th>الاجمالي</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($returns))
                                                @foreach($returns as $return)
                                                    <tr>
                                                        <td>{{ $return->created_at }}</td>
                                                        <td>{{ $return->pruch_prices }}</td>
                                                        <td>{{ $return->quantity }}</td>
                                                        <td>{{ $return->paid }}</td>
                                                        <td>{{ $return->paid * $return->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>الاجمالي</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>{{ $totalReturn ?? '' }}</th>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection