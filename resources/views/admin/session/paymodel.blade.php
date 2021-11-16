<div class="modal-header">
    <h5 class="modal-title">دفع</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<form id="paid" >
    <div class="modal-body modael_here">


            <div class="table-responsive table-scrollable">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الصنف</th>
                        <th>العدد</th>
                        <th>السعر</th>
                        <th>الاجمالي</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $row)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->qty}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->price * $row->qty}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        <legend class="text-uppercase font-size-base font-weight-bold"></legend>

        <table class="table col-md-4">
            <tbody>
            <tr>
                <th>الاجمالي :</th>
                <td class="text-right" id="total_prices">{{Cart::total()}}</td>
            </tr>
            <tr>
                <th>الباقي : </th>
                <td class="text-right" id="rest_total">0</td>
            </tr>
            </tbody>
        </table>

        <div class="col-md-12">
            <label><span class="text-danger">*</span>المدفوع</label>
            <input type="number" min="{{Cart::total()}}" step='any' name="paid" onkeyup="rest(this,'{{Cart::total()}}')" id="paid_total" class="form-control" value="{{Cart::total()}}"
                   required>
            <span class="help-block">
                  <strong class="name-error text-danger"></strong>
            </span>

            <label><span class="text-danger"></span>الخصم</label>
            <input type="number" min="0" step='any' name="discount" onkeyup="discount_res(this,'{{Cart::total()}}')" id="discount" class="form-control" value="0"
                   required>
            <span class="help-block">
                  <strong class="name-error text-danger"></strong>
            </span>

        </div>


        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </div>

    <div class="modal-footer ">

        <button type="button" onclick="savebill()"
                class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i
                        class="icon-checkmark2"></i></b>حفظ
        </button>
        <div id="back_button">
            <button type="button" class="btn btn-link" data-dismiss="modal">اغلاق</button>
        </div>
    </div>
</form>
