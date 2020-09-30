@extends('layouts.app')

@section('title', 'Dashboard')

@php
    $videos = \App\Http\Controllers\HomeController::videoList();
    $userLogin = \Auth::user();
@endphp

<style>

        input[type="checkbox"]:active ~ label .well  {
            opacity: 1;
        }

        input[type="checkbox"]:checked ~ label .well {
            opacity: 1;
            border: 1px solid blue;
            -moz-box-shadow: 4px 4px 6px 0px rgba(0,0,0,0.57);
            box-shadow: 4px 4px 6px 0px rgba(0,0,0,0.57);
            -webkit-box-shadow: 4px 4px 6px 0px rgba(0,0,0,0.57);
        }

        .row-well {
            /* display: flex !important;
            justify-content: center !important; */
        }

        .yellow {
            font-weight: bold !important;
            color: #f0b342 !important;
        }

        .well-box {
            cursor: pointer !important;
            height: 230px !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            /* color: #fff !important; */
            text-align: center;
        }

        .well-box:hover {
            -moz-box-shadow: 4px 4px 6px 0px rgba(0,0,0,0.57) !important;
            box-shadow: 4px 4px 6px 0px rgba(0,0,0,0.57) !important;
            -webkit-box-shadow: 4px 4px 6px 0px rgba(0,0,0,0.57) !important;
        }

        .well-box-video {
            height: 230px !important;
            justify-content: center !important;
            align-items: center !important;
            /* border-radius: 20px !important; */
            text-align: center;
        }

        .center {
            justify-content: center;
            align-content: center;
            display: flex;
        }

        /* #outer {
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            overflow: hidden;
            position: relative;
        } */

        .video {
            position: relative;
            left: 0;
            top: 0;
            opacity: 1;
            /* border-top-right-radius: 20px;
            border-top-left-radius: 20px; */
        }

        .buttons {
            cursor: pointer;
            position: absolute !important;
            color: white;
            right: 10px;
            top: 10px;
        }

        .link {
            font-size: 20px !important;
            cursor: pointer;
            color: white;
        }

        .trash {
            font-size: 20px !important;
            cursor: pointer;
            color: white;
        }

        .mdi-plus-circle {
            font-size: 42px !important;
            font-weight: bold !important;
            color: #f0b342 !important;
        }

    </style>

@section('content')


<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Panel de Control</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li class="active">Panel de Control</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
        <!-- ============================================================== -->
        <!-- Other sales widgets -->
        <!-- ============================================================== -->
        <!-- .row -->
    <div class="container ">
        <div class="row">
            <p style="font-size: 40pt; font-weight: 500">¡Hola, {{$userLogin->name}}!</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12" id="create_video">
                <div class="well well-box col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="center col-lg-12 col-md-12 col-sm-12" >
                            <h2 class="yellow">CREAR</h2>
                        </div>
                        <div class="center plus m-t-5 m-b-5 col-lg-12 col-md-12 col-sm-12">
                            <i class="mdi mdi-plus-circle"></i>
                        </div>
                        <div class="center col-lg-12 col-md-12 col-sm-12" >
                            <h5 class="yellow">un nuevo vídeo para tu cliente</h5>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($videos as $video)
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="well well-box-video col-lg-8 col-md-8 col-sm-12" style="padding: 0px;">
                        <div class="col-lg-12 col-md-12 col-sm-12" id="outer" style="padding: 0px;">
                            <video src="{{asset('record/output')}}/{{$video->video}}" id="video_open" class="video" controls width="100%" height="155px" style="background:black"></video>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5>Titulo del vídeo</h5>
                            <h6>Esto es una descripción del video</h6>
                        </div>
                        <div class="row buttons">
                            <div class="link col-md-2" link="{{route('admin.clientvideos.linkvideo', $video->id)}}">
                                <i class="mdi mdi-link-variant"></i>
                            </div>
                            <div class="trash col-md-2" link="#">
                                <i class="mdi mdi-delete"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection



@section('js')
    <script>
        let create_route = '{{ route('admin.videos.create') }}';
        jQuery(document).ready(function () {
            $("#create_video").on("click", function(e) {
                location.href = create_route;
            });

             $(".link").on("click", function(e) {
                location.href = $(this).attr('link');
            });
        });
    </script>
@endsection
