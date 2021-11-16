
<div class="col-md-12">
    <label><span class="text-danger">*</span>العدد</label>
    <input  type="number" min="1" step="1"  name="count_updated" id="count_updated" class="form-control"
           value="{{$detail->count}}"
           required>
    <span class="help-block">
      <strong class="count_updated-error text-danger"></strong>
    </span>
</div>
<div class="col-md-12">
    <label><span class="text-danger">*</span>سعر الشراء</label>
    <input  type="number" min="1" step="1"  name="pruch_prices_updated" id="pruch_prices_updated" class="form-control"
           value="{{$detail->pruch_prices}}"
           required>
    <span class="help-block">
      <strong class="pruch_prices_updated-error text-danger"></strong>
    </span>
</div>
<div class="col-md-12">
    <label><span class="text-danger">*</span>سعر البيع</label>
    <input  type="number" min="0" step="any"  name="prices_updated" id="prices_updated" class="form-control"
           value="{{$detail->prices}}"
           required>
    <span class="help-block">
      <strong class="prices_updated-error text-danger"></strong>
    </span>
</div>