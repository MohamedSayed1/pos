


@extends('admin.layout.admin')

@section('content')




<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header header-elements-inline">

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" id="serach" class="form-control form-control-lg"
                               placeholder="اسم المنتج , الباركود">
                        <div class="form-control-feedback form-control-feedback-lg">
                            <i class="icon-search4"></i>
                        </div>
                    </div>
                </div>

            <div class="card-body">

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Justified pills</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item"><a href="#justified-pill1" class="nav-link active" data-toggle="tab">Active</a></li>
                    <li class="nav-item"><a href="#justified-pill2" class="nav-link" data-toggle="tab">Inactive</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#justified-pill3" class="dropdown-item" data-toggle="tab">Dropdown pill</a>
                            <a href="#justified-pill4" class="dropdown-item" data-toggle="tab">Another pill</a>
                        </div>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="justified-pill1">
                        Easily make pills equal widths of their parent with <code>.nav-justified</code> class.
                    </div>

                    <div class="tab-pane fade" id="justified-pill2">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                    </div>

                    <div class="tab-pane fade" id="justified-pill3">
                        DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                    </div>

                    <div class="tab-pane fade" id="justified-pill4">
                        Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Justified pills</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item"><a href="#justified-pill1" class="nav-link active" data-toggle="tab">Active</a></li>
                    <li class="nav-item"><a href="#justified-pill2" class="nav-link" data-toggle="tab">Inactive</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#justified-pill3" class="dropdown-item" data-toggle="tab">Dropdown pill</a>
                            <a href="#justified-pill4" class="dropdown-item" data-toggle="tab">Another pill</a>
                        </div>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="justified-pill1">
                        Easily make pills equal widths of their parent with <code>.nav-justified</code> class.
                    </div>

                    <div class="tab-pane fade" id="justified-pill2">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
                    </div>

                    <div class="tab-pane fade" id="justified-pill3">
                        DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                    </div>

                    <div class="tab-pane fade" id="justified-pill4">
                        Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection