
<div class="modal-header">
    <h5 class="modal-title">تقرير الورديه</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>


<div class="modal-body">
    <div class="table-responsive">
        <table class="table text-nowrap">
            <thead>
            <tr>
                <th>النوع</th>
                <th></th>
                <th></th>
                <th>المبلغ</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                           <i class="icon-bag"></i>
                        </div>
                        <div>
                            <a href="#" class="text-default font-weight-semibold">الرصيد الافتتاحي</a>
                        </div>
                    </div>
                </td>
                <td></td>
                <td></td>
                <td><h6 class="font-weight-semibold mb-0">{{$session->opening_balance}}</h6></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <i class="icon-cash3"></i>
                        </div>
                        <div>
                            <a href="#" class="text-default font-weight-semibold">المصروفات </a>
                        </div>
                    </div>
                </td>
                <td></td>
                <td></td>
                <td><h6 class="font-weight-semibold mb-0">{{$pref['expenses']}}</h6></td>
                <td><a href="#" onclick="openMoreDetails({{$session->session_id}},'expenses')"><i class="icon-eye"></i></a></td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <i class="icon-cart-add2"></i>
                        </div>
                        <div>
                            <a href="#" class="text-default font-weight-semibold">المرتجع</a>
                        </div>
                    </div>
                </td>
                <td></td>
                <td></td>
                <td><h6 class="font-weight-semibold mb-0">{{$pref['return']}}</h6></td>
                <td><a href="#" onclick="openMoreDetails({{$session->session_id}},'return')"><i class="icon-eye"></i></a></td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <i class="icon-basket"></i>
                        </div>
                        <div>
                            <a href="#" class="text-default font-weight-semibold">البيع</a>
                        </div>
                    </div>
                </td>
                <td></td>
                <td></td>
                <td><h6 class="font-weight-semibold mb-0">{{$pref['sales']}}</h6></td>
                <td><a href="#" onclick="openMoreDetails({{$session->session_id}},'sale')"><i class="icon-eye"></i></a></td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <i class="icon-display4"></i>
                        </div>
                        <div>
                            <a href="#" class="text-default font-weight-semibold">الفعلي</a>
                        </div>
                    </div>
                </td>
                <td></td>
                <td></td>
                <td><h6 class="font-weight-semibold mb-0">{{$pref['actual'] + $session->opening_balance}}</h6></td>
            </tr>

            <tr class="table-active table-border-double">
                <td colspan="5">غلق الورديه </td>
                <td class="text-right">
                    <span class="progress-meter"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <i class="icon-cash4"></i>
                        </div>
                        <div>
                            <a href="#" class="text-default font-weight-semibold">الكاشير</a>
                        </div>
                    </div>
                </td>
                <td></td>
                <td></td>
                <td><h6 class="font-weight-semibold mb-0">{{$session->close_balance !== null ?$session->close_balance:0}}</h6></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>



<div class="modal-footer ">
    <div id="back_button">
        <button type="button" class="btn btn-link" data-dismiss="modal">اغلاق</button>
    </div>
</div>