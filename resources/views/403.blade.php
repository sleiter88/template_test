<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template/minimal/../plugins/images/favicon.png') }}">
<title>Error 403</title>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('template/minimal/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset('template/minimal/css/animate.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('template/minimal/css/style.css') }}" rel="stylesheet">
<!-- color CSS -->
<link href="{{ asset('template/minimal/css/colors/default.') }}" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Preloader -->

<section id="wrapper" class="error-page">
  <div class="error-box">
    <div class="error-body text-center">
      <h1 class="text-info">403</h1>
      <h3 class="text-uppercase">Error de acceso</h3>
      <p class="text-muted m-t-30 m-b-30 text-uppercase">No tienes permiso para acceder a este servidor.</p>
      <a href="{{ route('/') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Volver atras </a> </div>
    <footer class="footer text-center">2020 © Video Make.</footer>
  </div>
</section>
<!-- jQuery -->
<script src="{{ asset('template/minimal/../plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('template/minimal/bootstrap/dist/js/bootstrap.min.js') }}"></script>


</body>
</html>
