
@extends('layouts.video')

@section('title', 'Métricas')

@section('css')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('template/minimal/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('template/minimal/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('template/minimal/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('template/minimal/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <!-- Morris CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">

    <style>
        .tab-button {
            background: #f0b342 !important;
            /* border-radius: 20px !important; */
            font-family: 'Rubik', sans-serif !important;
            width: 230px !important;
            height: 50px;
            font-weight: bold !important;
            color: white !important;
            border: 0 none !important;
            cursor: pointer !important;
            padding: 5px 5px !important;
            margin: 10px 5px !important;
        }

        .customtab2 li.active a, .customtab2 li.active a:hover, .customtab2 li.active a:focus {
            background: #f0b342 !important;
            border: 1px solid #f0b342;
            font-weight: bold;
        }

        .nav-tabs > li > a {
            color: #004377;
            background: #fff;
            font-weight: bold;
        }

        .nav-tabs, .customtab2 {
            border: none;
        }

        .selector {
            width: 100%;
            height: 30px;
            border-radius: 20px;
            padding: 5px 5px;
            border: 1px solid #004377;
            font-weight: bold;
            font-size: 13px;
            background: none;
        }

        .knob-chart {
            display: block;
            height: 400px;
            padding: 25% 0%;
        }

        @media (min-width: 320px) and (max-width: 480px) {
            .knob-chart {
                display: block;
                height: 250px;
                padding: 0% 0%;
            }
        }

    </style>
@endsection

@section('content')

  <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Métricas</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('/') }}">Panel de Control</a></li>
                    <li class="active">Métricas</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <p style="font-size: 40pt; font-weight: 500">Métricas generales</p>
        </div>

        <ul class="nav customtab2 nav-tabs" role="tablist" style="display: flex; justify-content: center;">
            <li role="presentation" class="active"><a href="#home6" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Apertura de link</span></a></li>
            <li role="presentation" class=""><a href="#profile6" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Reproducciones de vídeo</span></a></li>
            <li role="presentation" class=""><a href="#messages6" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Mails generados</span></a></li>
        </ul>

        <br>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="white-box text-center">
                    <h3 class="box-title">Aperturas Totales</h3>
                    <div class="knob-chart" >
                        <input data-plugin="knob" data-width="220" data-height="220" data-min="0" data-fgColor="#004377" value="26" data-readOnly=true data-skin="tron" data-angleOffset="0" data-thickness=".2"/>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="white-box text-center">
                    <h3 class="box-title">Aperturas Totales</h3>
                    <div class="flot-chart" >
                        <div class="flot-chart-content" id="flot-bar-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <p style="font-size: 40pt; font-weight: 500">Métricas individuales</p>
        </div>

        <div class="row">
            <div class="col-md-3">
                <select class="selectpicker selector" data-style="form-control">
                    <option>Vídeos de Carlos Bermúdez</option>
                    <option>Vídeos de José María Rodríguez</option>
                    <option>Vídeos de Miguel Pérez</option>
                </select>
            </div>
        </div>

        <br>

        <ul class="nav customtab2 nav-tabs" role="tablist" style="display: flex; justify-content: center;">
            <li role="presentation" class=""><a href="#home6" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Apertura de link</span></a></li>
            <li role="presentation" class="active"><a href="#profile6" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Reproducciones de vídeo</span></a></li>
            <li role="presentation" class=""><a href="#messages6" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Mails generados</span></a></li>
        </ul>

        <br>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="white-box text-center">
                    <h3 class="box-title">Reproducciones de Vídeo</h3>
                    <ul class="list-inline text-right">
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Desktop</h5> </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Table</h5> </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5" style="color: #9675ce;"></i>Mobile</h5> </li>
                    </ul>
                    <div id="morris-area-chart"></div>
                </div>
            </div>
        </div>

  </div>

@endsection

@section('js')

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
    <!--Morris JavaScript -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/morrisjs/morris.js') }}"></script>
    <script src="{{ asset('template/minimal/js/morris-data.js') }}"></script>
    <!--jquery knob -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/knob/jquery.knob.js') }}"></script>
    <script>
        $(function () {
            $('[data-plugin="knob"]').knob();
        });
    </script>
    <!-- Flot Charts JavaScript -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/flot/excanvas.min.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <!-- <script src="{{ asset('template/minimal/js/flot-data.js') }}"></script> -->
    <!--Style Switcher -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>

    <script>
        $(function() {
            var barOptions = {
                series: {
                    bars: {
                        show: true,
                        barWidth: 43200000
                    }
                },
                xaxis: {
                    mode: "time",
                    timeformat: "%m/%d",
                    minTickSize: [2, "day"]
                },
                grid: {
                    hoverable: true
                },
                legend: {
                    show: false
                },
                grid: {
                        color: "#AFAFAF",
                        hoverable: true,
                        borderWidth: 0,
                        backgroundColor: '#FFF'
                    },
                tooltip: true,
                tooltipOpts: {
                    color: "#fb9678",
                    content: "x: %x, y: %y"
                }
            };
            var barData = {
                label: "bar",
                color: "#fb9678",
                data: [
                    [1354521600000, 1000],
                    [1355040000000, 2000],
                    [1355223600000, 3000],
                    [1355306400000, 4000],
                    [1355487300000, 5000],
                    [1355571900000, 6000]
                ]
            };
            $.plot($("#flot-bar-chart"), [barData], barOptions);
        });
    </script>

@endsection
