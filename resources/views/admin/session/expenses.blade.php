<div class="modal-header">
    <h5 class="modal-title">مصروف</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<form>
    <div class="modal-body">
        <div class="col-md-12">
            <label><span class="text-danger">*</span>السبب</label>
            <textarea  name="details" id="details_expen"
                   class="form-control"
                       required></textarea>
            <span class="help-block">
                  <strong class="details-expens-error text-danger"></strong>
            </span>
        </div>
        <div class="col-md-12">
            <label><span class="text-danger">*</span>المبلغ</label>
            <input type="number" min="0" step='any' name="total"  id="total_expens"
                   class="form-control" value=""
                   required>
            <span class="help-block">
                  <strong class="total-expens-error text-danger"></strong>
            </span>
        </div>


        <input type="hidden" name="_token" value="{{csrf_token()}}">
    </div>

    <div class="modal-footer ">

        <button type="button" onclick="expesnes_send()"
                class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i
                        class="icon-checkmark2"></i></b>حفظ
        </button>
        <div id="back_button">
            <button type="button" class="btn btn-link" data-dismiss="modal">اغلاق</button>
        </div>
    </div>
</form>
