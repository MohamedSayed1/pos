<style>
    .dataTables_filter {
        display: none;
    }
</style>
<div class="modal-header">
    @if($type == 'sale')
        <h5 class="modal-title">تقرير البيع </h5>
    @elseif($type == 'return')
        <h5 class="modal-title">تقرير مرتجعات الورديه</h5>
    @elseif($type == 'expenses')
        <h5 class="modal-title">تقرير المصروفات خلال الورديه</h5>
    @endif
</div>


<div class="modal-body">
    @if($type == 'expenses')
        <table id="table_detials" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th colspan="3">التفاصيل</th>
                <th>المدفوع</th>
                <th>الوقت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detials as $detial)
                <tr class="table-success table-border-solid">
                    <td>{{$loop->iteration}}</td>
                    <td colspan="3">{{$detial->details}}</td>
                    <td>{{$detial->total}}</td>
                    <td>{{$detial->created_at->format('H:i:s')}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @else
        <table id="table_detials" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>رقم الفاتوره</th>
                <th>الاجمالي</th>
                <th>الخصم</th>
                <th>المدفوع</th>
                <th>الوقت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detials as $detial)
                <tr class="table-success table-border-solid">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$detial->transaction_id}}</td>
                    <td>{{$detial->total}}</td>
                    <td>{{$detial->disc}}</td>
                    <td>{{$detial->real_total}}</td>
                    <td>{{$detial->created_at->format('H:i:s')}}</td>
            <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>اسم الصنف</th>
                <th>العدد</th>
                <th>سعر الشراء</th>
                <th>سعر البيع</th>
            </tr>
            </thead>
            <tbody>
            @foreach($detial->get as $de)
                <tr>
                    <td></td>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$de->name}}</td>
                    <td>{{$de->quantity}}</td>
                    <td>{{$de->pruch_prices}}</td>
                    <td>{{$de->paid}}</td>
                </tr>
            @endforeach
            </tbody>
            </tr>

            @endforeach

            </tbody>
        </table>
    @endif
</div>
<div class="modal-footer ">
    <div id="back_button">
        <button type="button" class="btn btn-link" onclick="closeAndOpen()">اغلاق</button>
    </div>
</div>


<script>
    $('#table_detials').DataTable({
        autoWidth: false,
        order: [[0, 'desc']],
        dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
        language: {
            search: '<span> بحث: </span> _INPUT_',
            searchPlaceholder: 'بحث ...',
            lengthMenu: '<span> عدد العناصر: </span> _MENU_',
            paginate: {
                'first': 'First',
                'last': 'Last',
                'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
            }
        },
        lengthMenu: [10, 25, 50, 75, 100],
        displayLength: 10
    });

</script>