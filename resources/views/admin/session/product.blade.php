<div class="overflow-auto order-2 order-md-1">
    <div class="row">
        @foreach($products as $product)
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">
                            @if(!empty($product->photo) && file_exists(public_path().'/upload/'.$product->photo))
                                <img src="{{url('upload/'.$product->photo)}}" class="card-img" width="160" height="160"
                                     alt="">
                                <span class="badge badge-info badge-pill badge-float border-2 border-white"
                                      id="product_count_{{$product->product_id}}">{{$product->count}}</span>
                            @else
                                <img src="{{asset("/template/back/assets/global_assets/images/no-image.png")}}"
                                     class="card-img" width="160" height="160" alt="">
                                <span class="badge badge-info badge-pill badge-float border-2 border-white"
                                      id="product_count_{{$product->product_id}}"> {{$product->count}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <h6 class="font-weight-semibold mb-0">
                                {{$product->name}}
                            </h6>
                        </div>
                        <h3 class="mb-0 font-weight-semibold">{{$product->prices}}</h3>
                        <button type="button" class="btn bg-teal-400 legitRipple"
                                onclick="addCard({{$product->product_id}})"><i class="icon-cart-add mr-2"></i>
                            اضافه للشراء
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center pt-3 mb-3">
        <ul class="pagination shadow-1">
            <li class="page-item">{!! $products->links() !!}</li>

        </ul>
    </div>
</div>