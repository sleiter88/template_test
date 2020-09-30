
@extends('layouts.app')

@section('title', 'Negocio')

@section('css')

    <style>

        .info {
            display: flex;
            align-items: center;
        }

        .right-line {
            border: none;
            border-right: 1px solid #004377;
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

        @media (min-width: 320px) and (max-width: 480px) {
            .info {
                display: contents;
                justify-content: center;
                align-items: center;
            }

            .right-line {
                border: none;
            }

            .dp-table {
                display: table;
                width: 100%;
                margin: 0px;
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

    </style>

@endsection

@section('content')

	<div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Negocio</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Panel de Control</a></li>
                    <li class="active">Negocio</li>
                </ol>
            </div>
        </div>

        <!-- description  -->
        <div class="container-fluid">
            <div class="white-box p-r-5 p-l-5">
                <div class="row info">
                    <div class="col-md-12 col-sm-12">
                        <p style="font-size: 40pt; font-weight: 500">{{$business->business}}</p>
                    </div>
                </div>
                <div class="row info">
                    <div class="col-md-3 col-sm-12 right-line">
                        <br>
                        <p><b>País:</b> {{$business->country}}</p>
                        <p><b>C.P.:</b> {{$business->code_zip}}</p>
                        <p><b>Provincia:</b> {{$business->state}}</p>
                        <p><b>Población:</b> {{$business->population}}</p>
                        <p><b>Dirección:</b> {{$business->adress}}</p>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <ul class="dp-table profile-social-icons">
                            <li>
                                <div class="circle-md-web pull-right circle">
                                    <a href="{{ $business->web }}" target="_blank"><i class="fa fa-globe"></i></a>
                                </div>
                            </li>
                            <li>
                                <div class="circle-md-email pull-right circle">
                                    <a href="mailto:{{ $business->email }}"><i class="fa fa-envelope-o"></i></a>
                                </div>
                            </li>
                            <li>
                                <div class="circle-md-whatsapp pull-right circle">
                                    <a href="https://api.whatsapp.com/send?phone={{ $business->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </li>
                            <li>
                                <div class="circle-md-phone pull-right circle">
                                    <a href="tel:{{ $business->phone }}" target="_blank"><i class="fa fa-phone"></i></a>
                                </div>
                            </li>
                            <li>
                                <div class="circle-md-skype pull-right circle">
                                    <a href="skype:{{ $business->skype }}?call" target="_blank"><i class="fa fa-skype"></i></a>
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
