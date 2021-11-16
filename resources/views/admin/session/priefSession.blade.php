<div class="modal-header">
    <h5 class="modal-title">غلق الورديه</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<form id="closeSession" >
    <div class="modal-body modael_here">


        <div class="table-responsive table-scrollable">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الرصيد الافتتاحي</th>
                    <th>المصروفات والمرتجع</th>
                    <th>المبيعات</th>
                    <th>الفعلي</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#</td>
                        <td>{{$pref['opening']}}</td>
                        <td>{{$pref['expenses']}}</td>
                        <td>{{$pref['sales']}}</td>
                        <td>{{$pref['actual']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <legend class="text-uppercase font-size-base font-weight-bold"></legend>

        <table class="table col-md-4">
            <tbody>
            <tr>
                <th>الاجمالي :</th>
                <td class="text-right" id="actual">{{$pref['actual']}}</td>
            </tr>
            </tbody>
        </table>

        <div class="col-md-12">
            <label><span class="text-danger">*</span>الرصيد</label>
            <input type="number" min="0" step='any' name="balance" id="balance" class="form-control" value=""
                   required>
            <span class="help-block">
                  <strong class="balance-updated-error text-danger"></strong>
            </span>

        </div>


        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="session" value="{{$pref['id']}}">
    </div>

    <div class="modal-footer ">

        <button type="button" onclick="closeResponse()"
                class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i
                        class="icon-checkmark2"></i></b>حفظ
        </button>
        <div id="back_button">
            <button type="button" class="btn btn-link" data-dismiss="modal">اغلاق</button>
        </div>
    </div>
</form>
