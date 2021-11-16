<div class="modal-header">
    <h5 class="modal-title"> تعديل المورد </h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<form id="updated_supp" method="post" action="#">
    <div class="modal-body modael_here">
        <div class="col-md-12">
            <label><span class="text-danger">*</span>الاسم</label>
            <input type="text" name="name"  placeholder="ادخل اسم المورد"  class="form-control" value="{{$supplier->name}}"
                   required>
            <span class="help-block">
                      <strong class="name-updatederror text-danger"></strong>
            </span>
        </div>
        <div class="col-md-12">
            <label><span class="text-danger">*</span>الهاتف</label>
            <input type="number" name="phone" placeholder="ادخل رقم الهاتف"  class="form-control" value="{{$supplier->phone}}" required>
            <span class="help-block">
                                <strong class="phone-updatederror text-danger"></strong>
                            </span>
        </div>
        <div class="col-md-12">
            <label><span class="text-danger"></span>اسم الشركه</label>
            <input type="text" name="company"  placeholder="ادخل اسم الشركه" class="form-control" value="{{$supplier->company}}">
            <span class="help-block">
                                <strong class="company-updatederror text-danger"></strong>
                            </span>
        </div>
        <div class="col-md-12">
            <label><span class="text-danger"></span>اسم الشركه</label>
            <textarea class="form-control" name="address" rows="3" placeholder="ادخل العنوان">{{$supplier->address}}</textarea>
        </div>
        <input type="hidden" name="id" value="{{$supplier->supplier_id}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

    </div>

    <div class="modal-footer ">

        <button type="button" id="submitupdatedSupplier" onclick="saveUpdated()"
                class="btn btn-primary btn-labeled btn-labeled-left btn-sm"><b><i
                    class="icon-checkmark2"></i></b>حفظ
        </button>
        <div id="back_button">
            <button type="button" class="btn btn-link" data-dismiss="modal">اغلاق</button>
        </div>
    </div>
</form>