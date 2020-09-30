<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template/minimal/../plugins/images/favicon.png') }}">
    <title>Video Make</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('template/minimal/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('template/minimal/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('template/minimal/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('template/minimal/css/colors/default.css') }}" id="theme"  rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')

    <style>
        .footer {
            background-color: #004377 !important;
            color: #fff
        }
    </style>

</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
    <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel">
            <div class="inner-panel">
                <a href="javascript:void(0)" class="p-20 di"><img src="{{ asset('template/minimal/../plugins/images/admin-logo.png') }}"></a>
                <div class="lg-content">
                    <h2>ADMIN MANAGER FOR VIDEO MAKE</h2>
                    <p class="text-muted">Dashboard para adminsitrar los videos de productos para su posterior distribución </p>
                    <!-- <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Buy now</a> -->
                </div>
            </div>
        </div>

        @yield('content')

        <footer class="footer text-center" style="left: 0 !important"> &copy; Plataforma desarrollada por Código Media </footer>

    </section>

    <!-- jQuery -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('template/minimal/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

    <!--slimscroll JavaScript -->
    <script src="{{ asset('template/minimal/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('template/minimal/js/waves.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('template/minimal/js/custom.min.js') }}"></script>
    <!--Style Switcher -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>
</html>
