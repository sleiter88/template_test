@extends('layouts.video')

@section('title', 'Wizard')

@section('css')

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('template/minimal/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('template/minimal/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('template/minimal/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('template/minimal/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <!-- Wizard CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/register-steps/steps.css') }}" rel="stylesheet">
    <!-- Tag CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/custom-select/custom-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/minimal/../plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('template/minimal/../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/minimal/../plugins/bower_components/multiselect/css/multi-select.css') }}" rel="stylesheet">
    <!-- Carrousel -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/owl.carousel/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/minimal/../plugins/bower_components/owl.carousel/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />

    <style>

        .blockOverlay {
            z-index: 2000 !important;
        }

        .blockMsg {
            z-index: 2001 !important;
        }

        input[type="checkbox"]:active ~ label .box {
            opacity: 1;
        }

        input[type="checkbox"]:checked ~ label .box {
            opacity: 1;
            -webkit-box-shadow: 0px 0px 0px 4px rgba(248,187,90,1);
            -moz-box-shadow: 0px 0px 0px 4px rgba(248,187,90,1);
            box-shadow: 0px 0px 0px 4px rgba(248,187,90,1);
        }

        .row-well {
            display: flex !important;
            overflow: hidden;
        }

        #msform .box {
            cursor: pointer;
            background: #fff;
            padding: 0px;
            /* height: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20px; */
        }

        #msform .box:hover {
            /* -moz-box-shadow: 4px 4px 6px 0px rgba(248,187,90,0.57) !important;
            box-shadow: 4px 4px 6px 0px rgba(248,187,90,0.57) !important;
            -webkit-box-shadow: 4px 4px 6px 0px rgba(248,187,90,0.57) !important; */
        }

        #msform .next-button, #msform .previous-button {
            background: #004377 !important;
            border-radius: 20px !important;
            font-family: 'Rubik', sans-serif !important;
            width: 100px !important;
            color: white !important;
            border: 0 none !important;
            cursor: pointer !important;
            padding: 5px 5px !important;
            margin: 10px 5px !important;
        }

        #msform .previous-button:hover, #msform .next-button:hover {
            -moz-box-shadow: 0 0 0 2px white, 0 0 0 3px #004377 !important;
            box-shadow: 0 0 0 2px white, 0 0 0 3px #004377 !important;
            -webkit-box-shadow: 0 0 0 2px white, 0 0 0 3px #004377 !important;
        }

        #msform .select2-container-multi .select2-choices {
            display: flex !important;
            align-items: center !important;
            border-color: #004377;
        }

        #msform .select2-input {
            color: #004377 !important;
        }

        #msform fieldset {
            background: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
            -webkit-box-shadow: none !important;
        }

        .text-company-title {
            color: #004377 !important;
            font-weight: bold !important;
            text-transform: none !important;
            font-size: 20px;
        }

        .text-company-subtitle {
            color: #004377 !important;
            text-transform: none !important;
            font-size: 15px;
        }

        .video-company-title {
            color: #004377 !important;
            font-weight: bold !important;
            text-transform: none !important;
            font-size: 15px;
        }

        #eliteregister li {
            color: #004377 !important;
            min-width: 70px;
        }

        #eliteregister li.active:before, #eliteregister li.active:after {
            background: #004377 !important;
        }

        #eliteregister li:before {
            background: #8ea4c2 !important;
        }

        #eliteregister li:after {
            background: #8ea4c2 !important;
        }

        .cta {
            margin-top: 5px;
            border-radius: 20px;
            background: transparent !important;
            margin: 50px 0px;
            padding: 0px 20px !important;
            opacity: 1;
            -webkit-box-shadow: 0px 0px 0px 2px rgba(0,66,119,1);
            -moz-box-shadow: 0px 0px 0px 2px rgba(0,66,119,1);
            box-shadow: 0px 0px 0px 2px rgb(0,66,119,1);
        }

        .cta p {
            margin-top: 10px !important;
            line-height: 1.3 !important;
        }

        .video {
            position: relative;
            left: 0;
            top: 0;
            opacity: 1;
            margin-right: 10px;
            /* border-top-right-radius: 20px;
            border-top-left-radius: 20px; */
        }

        .thumnail {
            padding: 0px;
            margin: 10px !important;
            width: 220px !important;
        }

        .carrousel {
            display: flex;
        }

        .preview_view {
          height: 350px;
        }

        @media (min-width: 320px) and (max-width: 480px) {
            .box {
                width: 100% !important;
                margin: 0px !important;
                padding: 0px !important;
            }
            .movil {
                overflow: hidden;
            }
            .arrow {
                margin: 0px !important;
                padding: 0px !important;
            }
            .font {
                font-size: 30px !important;
            }
            .carrousel {
                display: flex;
            }
            .row-well {
                display: flex !important;
                overflow: auto;
            }
            .preview_view {
                height: 150px;
            }
        }

        @media (min-width: 1281px) {
            .carrousel {
                display: flex;
            }
            .row-well {
                display: flex !important;
                overflow: auto;
            }
            .preview_view {
                height: 350px;
            }
        }

        @media (min-width: 1025px) and (max-width: 1280px) {
            .carrousel {
                display: flex;
            }
            .row-well {
                display: flex !important;
                overflow: auto;
            }
            .preview_view {
                height: 350px;
            }
        }

        @media (min-width: 1280px) {
            .carrousel {
                display: flex;
            }
            .row-well {
                display: flex !important;
                overflow: auto;
            }
            .preview_view {
                height: 350px;
            }
        }

    </style>
@endsection

@section('content')

  <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Nuevo Vídeo</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('/') }}">Panel de Control</a></li>
                    <li class="active">Nuevo Vídeo</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <form id="msform" method="POST" action="{{route('admin.videos.store')}}">
                    @csrf
                    <!-- progressbar -->
                    <ul id="eliteregister" style="overflow: auto; display: flex;">
                        <li class="active">Cliente</li>
                        <li>Presentación</li>
                            @foreach ($features as $feature)
                                <li>{{$feature->name}}</li>
                            @endforeach
                        <li>Cierre</li>
                        <li>Mensaje</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title text-company-title">Antes que nada, ¿para quién es este vídeo?</h2>

                        <select class="select2 m-b-10 select2-multiple" name="clients[]" multiple="multiple" data-placeholder="">
                            @foreach ($clients as $client)
                                <option value="{{$client}}">{{$client}}</option>
                            @endforeach
                        </select>

                        <input type="button" name="next" class="next client-button next-button" value="Empezar →" />
                    </fieldset>
                    <fieldset class="box">
                        <h2 class="fs-title text-company-title">Elige tu video de presentación</h2>
                        <h3 class="fs-subtitle text-company-subtitle">Empieza la venta asegurándote el éxito con una bienvenida adecuada al cliente</h3>

                        <div class="row carrousel">
                            <div class="col-md-1 col-sm-1 slide-left arrow" style="align-self: center;" slide="slide_open">
                                <div class="center arrow plus m-t-5 m-b-5 col-lg-12 col-md-12 col-sm-12">
                                    <i class="mdi mdi-chevron-left font" style="font-size: 42px !important; cursor: pointer"></i>
                                </div>
                            </div>
                            <div class="col-md-10 movil">
                                <div class="row row-well" id="slide_open">
                                    @foreach ($videoPresentation as $video)
                                        @if($video->type === 'Open')
                                            <!-- <div class="col-lg-3 col-sm-6 col-xs-12 " > -->
                                                <div class="thumnail" option="open" src="{{asset('record/gestor')}}/{{$video->video}}">
                                                    <input value="{{$video->id}}" name="open" type="checkbox" hidden id="match_open_{{$video->id}}">
                                                    <label for="match_open_{{$video->id}}">
                                                        <div class="box col-md-12" for="match_open_{{$video->id}}">
                                                            <div class="col-lg-12 col-md-12 col-sm-12" id="outer" style="padding: 0px;">
                                                                <video src="{{asset('record/gestor')}}/{{$video->video}}" class="video" width="220" height="155px" style="background:black"></video>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <h5 class="video-company-title">{{$video->description}}</h5>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            <!-- </div> -->
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-1 slide-right arrow" style="align-self: center;" slide="slide_open">
                                <div class="center arrow plus m-t-5 m-b-5 col-lg-12 col-md-12 col-sm-12">
                                    <i class="mdi mdi-chevron-right font" style="font-size: 42px !important; cursor: pointer"></i>
                                </div>
                            </div>
                        </div>

                        <input type="button" name="previous" class="previous previous-button" value="← Atrás" />
                        <input type="button" name="next" class="next next-button" value="Siguiente →" />

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6 col-lg-2"></div>
                            <div class="col-md-12 col-lg-8">
                                <!-- <div class="row"> -->
                                    <video class="preview_view" src="" id="video_open" controls width="100%"></video>
                                <!-- </div> -->
                            </div>
                            <div class="col-md-6 col-lg-2"></div>
                        </div>

                    </fieldset>

                    @foreach ($features as $key => $feature)
                        <fieldset class="box">
                            <h2 class="fs-title text-company-title">{{$feature->name}}</h2>
                            <!-- <h3 class="fs-subtitle text-company-subtitle">Elegir {{$feature->name}}</h3> -->
                            <div class="row carrousel">
                                <div class="col-md-1 slide-left arrow" style="align-self: center;" slide="slide_{{$feature->name}}">
                                    <div class="center arrow plus m-t-5 m-b-5 col-lg-12 col-md-12 col-sm-12">
                                        <i class="mdi mdi-chevron-left font" style="font-size: 42px !important; cursor: pointer"></i>
                                    </div>
                                </div>
                                <div class="col-md-10 movil">
                                    <div class="row row-well" id="slide_{{$feature->name}}">
                                        @foreach ($feature->getOptions($key + 1) as $opt)
                                            <div class="col-md-10 thumnail" option="{{$feature->name}}" src="{{asset('record/option')}}/{{$opt->video}}">
                                                <input value="{{$opt->id}}" name="option_id[]" type="checkbox" hidden id="match_option_{{$opt->id}}">
                                                <label for="match_option_{{$opt->id}}">
                                                    <div class="box col-md-12" for="match_option_{{$opt->id}}">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" id="outer" style="padding: 0px;">
                                                            <video src="{{asset('record/option')}}/{{$opt->video}}" class="video" width="220" height="155px" style="background:black"></video>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <h5 class="video-company-title">{{$opt->name}}</h5>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-1 slide-right arrow" style="align-self: center;" slide="slide_{{$feature->name}}">
                                    <div class="center arrow plus m-t-5 m-b-5 col-lg-12 col-md-12 col-sm-12">
                                        <i class="mdi mdi-chevron-right font" style="font-size: 42px !important; cursor: pointer"></i>
                                    </div>
                                </div>
                            </div>

                            <input type="button" name="previous" class="previous previous-button" value="← Atrás" />
                            <input type="button" name="next" class="next next-button" value="Siguiente →" />

                            <div class="row" style="margin-top: 15px">
                                <div class="col-md-6 col-lg-2"></div>
                                <div class="col-md-12 col-lg-8">
                                    <!-- <div class="row"> -->
                                        <video class="preview_view" src="" id="video_{{$feature->name}}" controls width="100%"></video>
                                    <!-- </div> -->
                                </div>
                                <div class="col-md-6 col-lg-2"></div>
                            </div>
                        </fieldset>
                    @endforeach

                    <fieldset class="box">
                        <h2 class="fs-title text-company-title">¿Cómo prefieres cerrar el vídeo?</h2>
                        <h3 class="fs-subtitle text-company-subtitle">Elige el cierre genérico o el personalizado según el modelo. <br> ¡El éxito está asegurado!</h3>

                        <div class="row carrousel">
                            <div class="col-md-1 slide-left arrow" style="align-self: center;" slide="slide_end">
                                <div class="center arrow plus m-t-5 m-b-5 col-lg-12 col-md-12 col-sm-12">
                                    <i class="mdi mdi-chevron-left font" style="font-size: 42px !important; cursor: pointer"></i>
                                </div>
                            </div>
                            <div class="col-md-10 movil" id="slide_end">
                                <div class="row row-well">
                                    @foreach ($videoPresentation as $video)
                                        @if($video->type === 'End')
                                            <div class="thumnail" option="end" src="{{asset('record/gestor')}}/{{$video->video}}">
                                                <input value="{{$video->id}}" name="end" type="checkbox" hidden id="match_end_{{$video->id}}">
                                                <label for="match_end_{{$video->id}}">
                                                    <div class="box col-md-12" for="match_end_{{$video->id}}">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" id="outer" style="padding: 0px;">
                                                            <video src="{{asset('record/gestor')}}/{{$video->video}}" class="video" width="220" height="155px" style="background:black"></video>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <h5 class="video-company-title">{{$video->description}}</h5>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-1 slide-right arrow" style="align-self: center;" slide="slide_end">
                                <div class="center arrow plus m-t-5 m-b-5 col-lg-12 col-md-12 col-sm-12">
                                    <i class="mdi mdi-chevron-right font" style="font-size: 42px !important; cursor: pointer"></i>
                                </div>
                            </div>
                        </div>

                        <input type="button" name="previous" class="previous previous-button" value="← Atrás" />
                        <input type="button" name="next" class="next next-button" value="Siguiente →" />

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-6 col-lg-2"></div>
                            <div class="col-md-12 col-lg-8">
                                <video class="preview_view" src="" id="video_end" controls width="100%"></video>
                            </div>
                            <div class="col-md-6 col-lg-2"></div>
                        </div>

                    </fieldset>

                    <fieldset class="box">
                        <h2 class="fs-title text-company-title">¿Qué mensajes quieres en el botón final?</h2>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12" >
                                <input value="1" name="cta_1" type="checkbox" hidden id="cta_1">
                                <label for="cta_1">
                                    <div class="box cta col-lg-12 col-md-12 col-sm-12" for="cta_1">
                                        <p style="width: 180px;">Pide un prueba:<br>te llevaremos el<br>coche a casa</p>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12" >
                                <input value="1" name="cta_2" type="checkbox" hidden id="cta_2">
                                <label for="cta_2">
                                    <div class="box cta col-lg-12 col-md-12 col-sm-12" for="cta_2">
                                        <p style="width: 180px;">Llámame<br>y te informaré<br>personalmente</p>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12" >
                                <input value="1" name="cta_3" type="checkbox" hidden id="cta_3">
                                <label for="cta_3">
                                    <div class="box cta col-lg-12 col-md-12 col-sm-12" for="cta_3">
                                        <p style="width: 180px;">Ven al concesionario<br>y podrás ver, tocar<br>y probar el coche</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <input type="submit" name="submit" name="next" class="submit next-button" value="Finalizar →" />
                    </fieldset>
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <!-- jQuery -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('template/minimal/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!--BlockUI Script -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/blockUI/jquery.blockUI.js') }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/register-steps/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/register-steps/register-init.js') }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('template/minimal/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('template/minimal/js/waves.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('template/minimal/js/custom.min.js') }}"></script>
    <!--Style Switcher -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
    <!--Tag -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/custom-select/custom-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/minimal/../plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
    <!-- jQuery for carousel -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/owl.carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/owl.carousel/owl.custom.js') }}"></script>
    <script>
        jQuery(document).ready(function () {

            $(".slide-right").each(function() {
                $(this).on("click", function(e) {
                    var slide_id = $(this).attr("slide");
                    document.getElementById(slide_id).scrollLeft += 220;
                });
            });

            $(".slide-left").each(function() {
                $(this).on("click", function(e) {
                    var slide_id = $(this).attr("slide");
                    document.getElementById(slide_id).scrollLeft -= 220;
                });
            });

            // For select 2
            $(".select2").select2();

            $(".thumnail").each(function() {
                // var actual = document.getElementById($(this).attr("id"));
                // actual.addEventListener("play", function (e) {
                // actual.pause();
                // if (lastSrc === 'output.mp4') {
                //     myvid.currentTime;
                //     $('#view_complete').text(myvid.currentTime);
                // }
                // lastSrc = $(this).attr("src");
                // myvid.src = $(this).attr("src");
                // // track.cues[0].text = lastSrc;
                // track.cues[0].text = "Hola Francisco";
                // myvid.play();
                // });
                $(this).on("click", function(e) {
                    var myvid = document.getElementById('video_'+$(this).attr("option"));
                    // e.preventDefault();
                    // if (lastSrc === 'output.mp4') {
                    //     myvid.currentTime;
                    //     $('#view_complete').text(myvid.currentTime);
                    // }
                    // lastSrc = $(this).attr("src");
                    myvid.src = $(this).attr("src");
                    // track.cues[0].text = lastSrc;
                    // track.cues[0].text = "Hola Francisco";
                    // myvid.play();
                });
            });
        });
    </script>
    @endsection
