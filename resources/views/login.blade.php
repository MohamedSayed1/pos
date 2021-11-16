<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>epos Login</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/back/assets/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('template/back/assets/global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/plugins/ui/ripple.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('template/back/assets/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script src="{{asset('template/back/assets/assets/js/app.js')}}"></script>
    <script src="{{asset('template/back/assets/global_assets/js/demo_pages/login.js')}}"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Page content -->
<div class="page-content login-cover">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Login form -->
            <form class="login-form wmin-sm-400" action="{{url('login')}}" method="post">
                <div class="card mb-0">
                    <div class="tab-content card-body">
                        <div class="tab-pane fade show active" id="login-tab1">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">
                                    تسجيل الدخول إلى حسابك</h5>
                                @if($errors->any())
                                    @foreach($errors->all() as $err)
                                      <span class="d-block text-muted" style="color: red !important;">{{$err}}</span>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="اسم المستخدم">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="كلمه السر">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <div class="form-check mb-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
                                        تذكرني
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
                            </div>
                            <!--span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span-->
                        </div>

                    </div>
                </div>
            </form>
            <!-- /login form -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>
