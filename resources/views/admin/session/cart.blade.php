<div class="nav nav-sidebar mb-2">
        <li class="nav-item">
            <a href="#" class="nav-link">
                عدد العناصر
                <span class="badge badge-secondary badge-pill ml-auto">{{Cart::count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                الاجمالي
                <span class="badge badge-secondary badge-pill ml-auto"> {{Cart::total()}}</span>
            </a>
        </li>
    </div>
<legend class="text-uppercase font-size-base font-weight-bold"></legend>
<ul class="media-list" id="dd">
    @foreach(Cart::content() as $row)

        <li class="media">
            <a href="#" class="mr-3 position-relative">
                @if(!empty($row->options->photo) && file_exists(public_path().'/upload/'.$row->options->photo))
                    <img src="{{url('upload/'.$row->options->photo)}}" width="36"
                         height="36" class="rounded-circle" alt="">
                @else
                    <img src="{{asset("/template/back/assets/global_assets/images/no-image.png")}}" width="36"
                         height="36" class="rounded-circle" alt="">

                @endif
                <span class="badge badge-info badge-pill badge-float border-2 border-white">{{$row->qty}}</span>
            </a>

            <div class="media-body">
                <div class="font-weight-semibold">{{$row->name}}
                </div>
                <span class="font-size-sm text-muted">{{$row->price}}</span>
                <div class="input-group bootstrap-touchspin">
                    <input type="text" onchange="quty('{{$row->rowId}}',this)" value="{{$row->qty}}"
                           class="form-control touchspin-no-mousewheel">
                </div>
            </div>
            <div class="ml-3 align-self-center">
                <a href="#" class="list-remove"
                   aria-expanded="top" onclick="deleteCart('{{$row->rowId}}')"><i class="icon-cross3"></i></a>

            </div>
        </li>

    @endforeach


</ul>
<legend class="text-uppercase font-size-sm font-weight-bold"></legend>
<div class="d-flex align-items-center">

    @if(Cart::count() != 0)
        <div class="list-icons list-icons-extended">
            <a href="#" onclick="dumpbill()" class="list-icons-item" data-popup="tooltip" title="تفريغ الفاتوره" data-container="body"
               data-original-title="تفريغ الفاتوره"><i class="icon-spinner11"></i></a>

        </div>

        <button type="button" onclick="pay()" class="btn bg-blue btn-labeled btn-labeled-right ml-auto"><b><i class="icon-cash3"></i></b>
            دفع
        </button>
    @endif

</div>
