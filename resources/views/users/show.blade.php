

@extends('layouts.app')

@section('title', 'Usuario')

@section('css')

    <style>
        .panel {
            margin-left: 20%;
            margin-right: 20%;
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
            .panel {
                margin-left: 0%;
                margin-right: 0%;
            }

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
        }

        @media (min-width: 1281px) {
            .panel {
                margin-left: 20%;
                margin-right: 20%;
            }
        }

        @media (min-width: 1025px) and (max-width: 1280px) {
            .panel {
                margin-left: 20%;
                margin-right: 20%;
            }
        }

        @media (min-width: 1280px) {
            .panel {
                margin-left: 20%;
                margin-right: 20%;
            }
        }
    </style>

@endsection

@section('content')

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Mi Perfil</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
				<li><a href="{{ route('/') }}">Panel de Control</a></li>
                <li class="active">Mi Perfil</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
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
                                <p class="job">Gestor de ventas - {{$user->business->business}}</h5>
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

@endsection

@section('js')

@endsection
