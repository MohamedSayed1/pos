<div class="print_this">
    <div class="modal-header">
        <h5 class="modal-title">فاتوره رقم : {{$purchas->in_num}} </h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <ul class="list list-unstyled mb-0">
                        <li>فاتوره رقم : <span class="font-weight-semibold">{{$purchas->in_num}}</span></li>
                        <li>المورد : <span class="font-weight-semibold">{{$purchas->supplier_name}}</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-4">
                    <div class="text-sm-right">
                        <ul class="list list-unstyled mb-0">
                            <li>التاريخ: <span class="font-weight-semibold">{{$purchas->in_data}}</span></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
            <tr>
                <th>الصنف</th>
                <th>العدد</th>
                <th>سعر الشراء</th>
                <th>سعر البيع</th>
                <th>الاجمالي</th>

            </tr>
            </thead>
            <tbody>
            @foreach($detalis as $detali)
                <tr>
                    <td>
                        <h6 class="mb-0">{{$detali->product->name}}</h6>
                    </td>
                    <td>{{$detali->count}}</td>
                    <td>{{$detali->pruch_prices}}</td>
                    <td><span class="font-weight-semibold">{{$detali->prices}}</span></td>
                    <td><span class="font-weight-semibold">{{$detali->pruch_prices * $detali->count }}</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-body">
        <div class="d-md-flex flex-md-wrap">
            <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>الاجمالي:</th>
                            <td class="text-right text-primary"><h5 class="font-weight-semibold">{{$purchas->in_total}}</h5></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal-footer bg-transparent">
    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
    <button type="button" id="print" onclick="print()" class="btn btn-light">طباعه</button>
</div>