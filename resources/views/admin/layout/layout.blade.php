<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->
    @yield('css')



</head>

<body class="{{ Request::is('dashboard/session/point*') ? 'sidebar-xs' : '' }}">

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light">

    <!-- Header with logos -->
    <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
        <div class="navbar-brand navbar-brand-md">
            <a href="index.html" class="d-inline-block">
                Pos v 1.0
            </a>
        </div>

        <div class="navbar-brand navbar-brand-xs">
            <a href="index.html" class="d-inline-block">
                Pos v 1.0
            </a>
        </div>
    </div>
    <!-- /header with logos -->


    <!-- Mobile controls -->
    <div class="d-flex flex-1 d-md-none">
        <div class="navbar-brand mr-auto">
            <a href="index.html" class="d-inline-block">
                <img src="{{asset('template/back/assets/global_assets/images/logo_dark.png')}}" alt=" ">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>

        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <!-- /mobile controls -->


    <!-- Navbar content -->
    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>

        </ul>


        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('template/back/assets/global_assets/images/user-place.png')}}" class="rounded-circle mr-2" height="34" alt=" ">
                    <span>{{Auth()->user()->name}}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{url('/logout')}}" class="dropdown-item"><i class="icon-switch2"></i> تسجيل الخروج</a>
                </div>
            </li>
        </ul>
    </div>
    <!-- /navbar content -->

</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    @yield('sidbar')
    <!-- Main content -->
    <div class="content-wrapper">

    @yield('content')

    {!! Notify::render() !!}
        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						 <a href="#">ePos v 1.00</a> &copy; 2020
					</span>

                <!--span class="navbar-text">
						&copy; 2020 <a href="#">Pos v 1.00</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
				</span>

                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                    <li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
                    <li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
                </ul-->
            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
<!-- Core JS files -->
<script src="{{asset('template/back/assets/global_assets/js/main/jquery.min.js')}}"></script>
<script src="{{asset('template/back/assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/back/assets/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{asset('template/back/assets/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script src="{{asset('template/back/assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
<script src="{{asset('template/back/assets/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{asset('template/back/assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script src="{{asset('template/back/assets/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script src="{{asset('template/back/assets/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

<script src="{{asset('template/back/assets/assets/js/app.js')}}"></script>
<script src="{{asset('template/back/assets/global_assets/js/demo_pages/dashboard.js')}}"></script>
<!-- /theme JS files -->
<script src="{{ asset('template/back/assets/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('template/back/assets/global_assets/js/plugins/tables/datatables/extensions/natural_sort.js') }}"></script>
<!--script-- src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/locales/ar.min.js"></script-->
<script src="{{ asset('template/back/assets/global_assets/js/plugins/notifications/bootbox.min.js')}}"></script>
<script src="{{ asset('template/back/assets/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></--script-->

<script>
    $('.tasks-list').DataTable({
        autoWidth: false,
        order: [[0, 'desc']],
        dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
        language: {
            search: '<span>بحث:</span> _INPUT_',
            searchPlaceholder: 'بحث ...',
            lengthMenu: '<span>عدد العناصر:</span> _MENU_',
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
@yield('script')

</body>
</html>
