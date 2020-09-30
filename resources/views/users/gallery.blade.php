@extends('layouts.app')

@section('title', 'Galeria')

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
        }

        .link {
            padding-top: 5px;
            font-size: 24px!important;
            justify-content: center;
            width: 100%;
            cursor: pointer
        }

        .load-button {
            background: #f0b342 !important;
            border-radius: 20px !important;
            font-family: 'Rubik', sans-serif !important;
            width: 140px !important;
            /* font-weight: bold !important; */
            color: white !important;
            border: 0 none !important;
            cursor: pointer !important;
            padding: 5px 5px !important;
            margin: 10px 5px !important;
        }

        .load-button:hover {
            -moz-box-shadow: 0 0 0 2px white, 0 0 0 3px #f0b342 !important;
            box-shadow: 0 0 0 2px white, 0 0 0 3px #f0b342 !important;
            -webkit-box-shadow: 0 0 0 2px white, 0 0 0 3px #f0b342 !important;
        }

    </style>

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Galería</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
            <li><a href="{{ route('/') }}">Panel de Control</a></li>
                    <li class="active">Galería</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <p style="font-size: 40pt; font-weight: 500">Tú Galería</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">
                <button type="submit" class="load-button">
                    Subir vídeo ↑
                </button>
            </div>
        </div>

        <div class="row">
            <p style="font-size: 15pt; font-weight: 100">Tus vídeos de presentación</p>
        </div>

        <div class="row">
            @foreach ($galleries as $video)
                @if($video->type === "Open")
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="well well-box-video col-lg-8 col-md-8 col-sm-12" style="padding: 0px;">
                            <div class="col-lg-12 col-md-12 col-sm-12" id="outer" style="padding: 0px;">
                                <video src="{{asset('record/gestor')}}/{{$video->video}}" id="video_open" class="video" controls width="100%" height="155px" style="background:black"></video>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h5>Titulo del vídeo</h5>
                                <h6>Esto es una descripción del video</h6>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="row">
            <p style="font-size: 15pt; font-weight: 100">Tus vídeos de cierre</p>
        </div>

        <div class="row">
            @foreach ($galleries as $video)
                @if($video->type === "End")
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="well well-box-video col-lg-8 col-md-8 col-sm-12" style="padding: 0px;">
                            <div class="col-lg-12 col-md-12 col-sm-12" id="outer" style="padding: 0px;">
                                <video src="{{asset('record/gestor')}}/{{$video->video}}" id="video_open" class="video" controls width="100%" height="155px" style="background:black"></video>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h5>Titulo del vídeo</h5>
                                <h6>Esto es una descripción del video</h6>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection



@section('js')
    <script>
        jQuery(document).ready(function () {

        });
    </script>
@endsection
