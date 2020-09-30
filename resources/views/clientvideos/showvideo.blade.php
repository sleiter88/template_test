<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template/minimal/../plugins/images/favicon.png') }}">
    <title>Presentación</title>
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
    <!-- Carrousel -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/owl.carousel/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/minimal/../plugins/bower_components/owl.carousel/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />

    <style>

        #page-wrapper {
            margin: 0px !important;
        }

        .profile-button {
            background: #004377 !important;
            border-radius: 20px !important;
            font-family: 'Rubik', sans-serif !important;
            width: 200px !important;
            font-weight: bold !important;
            color: white !important;
            border: 0 none !important;
            cursor: pointer !important;
            padding: 10px 5px !important;
            margin: 10px 5px !important;
            text-align: center;
        }

        .profile-button:hover {
            -moz-box-shadow: 0 0 0 2px white, 0 0 0 3px #004377 !important;
            box-shadow: 0 0 0 2px white, 0 0 0 3px #004377 !important;
            -webkit-box-shadow: 0 0 0 2px white, 0 0 0 3px #004377 !important;
        }

        .cta-button {
            background: #004377 !important;
            border-radius: 20px !important;
            font-family: 'Rubik', sans-serif !important;
            /* width: 200px !important; */
            /* font-weight: bold !important; */
            color: white !important;
            border: 0 none !important;
            cursor: pointer !important;
            padding: 10px 40px !important;
            margin: 50px 0px;
            text-align: center;
        }

        .cta-button:hover {
            -moz-box-shadow: 0 0 0 2px white, 0 0 0 3px #004377 !important;
            box-shadow: 0 0 0 2px white, 0 0 0 3px #004377 !important;
            -webkit-box-shadow: 0 0 0 2px white, 0 0 0 3px #004377 !important;
        }

        .video {
            height: auto;
        }

        ::cue {
            color: white;
            font: bold;
            font-size: 72px;
        }

        .col-center {
            float: none;
            margin-left: auto;
            margin-right: auto;
        }

        .row-center {
            justify-content: center;
            display: flex;
        }

        .panel-seller {
            margin-left: 20% !important;
            margin-right: 20% !important;
        }

        .line {
            border-color: #004377;
            margin-right: 10px
        }

        .name {
            font-size: 40pt;
            font-weight: 500
        }

        .job {
            font-size: 15pt;
            font-weight: 500;
            color: #f0b342
        }

        .fa {
            color: #fff
        }

        .fa {
            color: #fff
        }

        .circle-md-web {
            width: 60px !important;
            padding-top: 13px !important;
            height: 60px !important;
            font-size: 24px !important;
            background: #dd686b
        }

        .circle-md-email {
            width: 60px !important;
            padding-top: 13px !important;
            height: 60px !important;
            font-size: 24px !important;
            background: #f0b342
        }

        .circle-md-phone {
            width: 60px !important;
            padding-top: 13px !important;
            height: 60px !important;
            font-size: 24px !important;
            background: #004377
        }

        .circle-md-whatsapp {
            width: 60px !important;
            padding-top: 11px !important;
            height: 60px !important;
            font-size: 28px !important;
            background: #4fce5d
        }

        .circle-md-skype {
            width: 60px !important;
            padding-top: 13px !important;
            height: 60px !important;
            font-size: 24px !important;
            background: #00aff0
        }

        .dp-table {
            display: table;
            width: 90%;
            margin: 0px;
        }

        @media (min-width: 320px) and (max-width: 480px) {

            .line {
                border-color: #004377;
                margin-right: 0px
            }

            .name {
                font-size: 24px;
                font-weight: 500
            }

            .job {
                font-size: 15px;
                font-weight: 500;
                color: #f0b342
            }

            .info {
                text-align: center;
            }

            .dp-table {
                display: table;
                width: 100%;
                margin: 0px;
            }

            .row-center {
                justify-content: center;
                display: block;
            }

            .cta-button {
                background: #004377 !important;
                border-radius: 20px !important;
                font-family: 'Rubik', sans-serif !important;
                color: white !important;
                border: 0 none !important;
                cursor: pointer !important;
                padding: 10px 40px !important;
                margin: 10px 0px;
                text-align: center;
            }

            .circle-md-web {
                width: 30px !important;
                padding-top: 6px !important;
                height: 30px !important;
                font-size: 14px !important;
                background: #dd686b
            }

            .circle-md-email {
                width: 30px !important;
                padding-top: 6px !important;
                height: 30px !important;
                font-size: 14px !important;
                background: #f0b342
            }

            .circle-md-phone {
                width: 30px !important;
                padding-top: 6px !important;
                height: 30px !important;
                font-size: 14px !important;
                background: #004377
            }

            .circle-md-whatsapp {
                width: 30px !important;
                padding-top: 3px !important;
                height: 30px !important;
                font-size: 18px !important;
                background: #4fce5d
            }

            .circle-md-skype {
                width: 30px !important;
                padding-top: 6px !important;
                height: 30px !important;
                font-size: 14px !important;
                background: #00aff0
            }

        }

        @media (min-width: 1281px) {

        }

        @media (min-width: 1025px) and (max-width: 1280px) {

        }

        @media (min-width: 1280px) {

        }
    </style>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">


        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- <div class="row bg-title">
                </div> -->
                <div class="row m-t-30 m-b-30" style="text-align: center;">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-xs-4 col-md-5 col-lg-5"></div>
                                <div class="col-xs-4 col-md-2 col-lg-2" style="justify-content: center; display: flex;">
                                    <img class="img-responsive" width="120" heigth="120" alt="user" src="{{$client->business->logo}}">
                                </div>
                                <div class="col-xs-4 col-md-5 col-lg-5"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-0 col-md-2 col-lg-2"></div>
                                <div class="col-xs-12 col-md-8 col-lg-8">
                                    <p style="font-size: 40pt; font-weight: 500">¡Hola, {{$client->name}}!</p>
                                    <!-- <p>{{$video->description}}</p> -->
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consectetur ante non enim eleifend, sed placerat orci consectetur. Sed suscipit nisl tellus, in ornare quam tincidunt in. Donec non dui elit. Aliquam sit amet quam at nibh elementum viverra a eu nibh.</p>
                                </div>
                                <div class="col-xs-0 col-md-2 col-lg-2"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-0 col-md-1 col-lg-1"></div>
                                <div class="col-xs-12 col-md-10 col-lg-10" style="justify-content: center; display: flex;">
                                    <video src="{{asset('record/output')}}/{{$video->video}}" id="video_open" class="video" controls width="100%" height="450" style="background:black"></video>
                                </div>
                                <div class="col-xs-0 col-md-1 col-lg-1"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-0 col-md-1 col-lg-1"></div>
                                    <div class="col-xs-12 col-md-10 col-lg-10">
                                        <div class="panel panel-default">
                                            <div class="panel-wrapper p-b-10 collapse in">
                                                <div id="owl-demo2" class="owl-carousel owl-theme ">
                                                    @foreach ($videoMake as $video)
                                                        <div class="item">
                                                            <video src="{{asset('record/option')}}/{{$video->option->video}}" id="video_{{$video->option->id}}" class="video" controls width="200" height="140" style="background:black;"></video>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-xs-0 col-md-1 col-lg-1"></div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-lg-2 col-md-4 col-sm-12" ></div> -->
                                <div class="col-lg-8 col-md-4 col-sm-12 col-center" >
                                    <div class="row row-center">
                                        @if($video->video->cta_1 === 1)
                                            <div class="col-lg-4 col-md-4 col-sm-12" >
                                                <button type="button" class="cta-button">Pide un prueba:<br>te llevaremos el<br>coche a casa</button>
                                            </div>
                                        @endif
                                        @if($video->video->cta_2 === 1)
                                            <div class="col-lg-4 col-md-4 col-sm-12" >
                                                <button type="button" class="cta-button">Llámame<br>y te informaré<br>personalmente</button>
                                            </div>
                                        @endif
                                        @if($video->video->cta_3 === 1)
                                            <div class="col-lg-4 col-md-4 col-sm-12" >
                                                <button type="button" class="cta-button">Ven al concesionario<br>y podrás ver, tocar<br>y probar el coche</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- <div class="col-lg-2 col-md-4 col-sm-12" ></div> -->
                            </div>

                            <div class="row">
                                <div class="col-xs-0 col-md-2 col-lg-2"></div>
                                <div class="col-xs-12 col-md-8 col-lg-8">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consectetur ante non enim eleifend, sed placerat orci consectetur. Sed suscipit nisl tellus, in ornare quam tincidunt in. Donec non dui elit. Aliquam sit amet quam at nibh elementum viverra a eu nibh.</p>
                                </div>
                                <div class="col-xs-0 col-md-2 col-lg-2"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-0 col-md-2 col-lg-2"></div>
                                <div class="col-xs-12 col-md-8 col-lg-8">
                                    <div class="row">
                                        <div class="col-xs-0 col-md-3 col-lg-3"></div>
                                        <div class="col-xs-12 col-md-6 col-lg-6">

                                            <ul class="dp-table profile-social-icons">
                                                <li>
                                                    <div class="circle-md-web pull-right circle">
                                                        <a href="{{ $client->business->web }}" target="_blank"><i class="fa fa-globe"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="circle-md-email pull-right circle">
                                                        <a href="mailto:{{ $client->business->email }}"><i class="fa fa-envelope-o"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="circle-md-whatsapp pull-right circle">
                                                        <a class="whatsapp"  href="https://api.whatsapp.com/send?phone={{ $client->business->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="circle-md-phone pull-right circle">
                                                        <a class="phone"  href="tel:{{ $client->business->phone }}" target="_blank"><i class="fa fa-phone"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="circle-md-skype pull-right circle">
                                                        <a class="skype"  href="skype:{{ $client->business->skype }}?call" target="_blank"><i class="fa fa-skype"></i></a>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                        <div class="col-xs-0 col-md-3 col-lg-3"></div>
                                    </div>
                                </div>
                                <div class="col-xs-0 col-md-2 col-lg-2"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-0 col-md-4 col-lg-4"></div>
                                <div class="col-xs-12 col-md-4 col-lg-4">
                                    <input type="button" class="profile-button" data-toggle="modal" data-target=".bs-example-modal-lg" value="Ver perfil de vendedor →" />
                                </div>
                                <div class="col-xs-0 col-md-4 col-lg-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sample modal content -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="panel">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="p-30" style="text-align: center;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="{{$user->avatar}}" alt="varun" class="img-circle img-responsive">
                                                <br>
                                                <p style="font-weight: bold">Horario</p>
                                                <p>L-V > 9:00h - 18:00h</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12 info">
                                    <div class="p-20">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <p class="name">{{$user->name}}</p>
                                                <p class="job">Gestor de ventas - {{$client->business->business}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-20" style="padding: 10px;">
                                        <p class="">Expertos en vehículos electrificados de Ford</p>
                                    </div>
                                    <hr class="m-t-10 line" />
                                    <ul class="dp-table profile-social-icons">
                                        <li>
                                            <div class="circle-md-email pull-right circle">
                                                <a href="mailto:{{ $user->email }}"><i class="fa fa-envelope-o"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="circle-md-whatsapp pull-right circle">
                                                <a class="whatsapp"  href="https://api.whatsapp.com/send?phone={{ $user->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="circle-md-phone pull-right circle">
                                                <a class="phone"  href="tel:{{ $user->phone }}" target="_blank"><i class="fa fa-phone"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="circle-md-skype pull-right circle">
                                                <a class="skype"  href="skype:{{ $user->skype }}?call" target="_blank"><i class="fa fa-skype"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center" style="background-color: #004377 !important; color: #fff; width: 100%; z-index: 2000; left: 0 !important; "> &copy; Plataforma desarrollada por Código Media </footer>
        </div>
    </div>

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
    <!-- jQuery for carousel -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/owl.carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/owl.carousel/owl.custom.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            var myvid = document.getElementById('video_open');
            var track = myvid.addTextTrack("captions", "English", "en", true);
            track.mode = 'showing';
            track.addCue(new VTTCue(5.5, 8.5, "Hola \n"+"<?php echo $client->name; ?>"));
            track.cues[0].line = 2.5;
            track.cues[0].align = "middle";
            track.cues[0].size = 30;

            $('.owl-carousel').trigger('stop.owl.autoplay');
        });
    </script>
</body>

</html>
