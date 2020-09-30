@extends('layouts.video')

@section('title', 'Links')


@section('css')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('template/minimal/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/minimal/../plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('template/minimal/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('template/minimal/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('template/minimal/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <!--alerts CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">

    <style>

        input[type="search"] {
            color: #004377 !important;
            border: none;
        }

        .dataTables_filter label {
            margin: 3px;
        }

        .dataTables_filter {
            border-radius: 20px !important;
            border: 1px solid #004377 !important;
        }

        .dataTables_filter:after {
            padding: 5px;
            content: "\F349";
            font: normal normal normal 30px/1 "Material Design Icons";
            font-size: inherit;
            text-rendering: auto;
            line-height: inherit;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            transform: translate(0, 0);
            font-size: 20px;
        }

        select {
            border: 1px solid #004377 !important;
        }

        .mdi-content-copy {
            font-size: 14px !important;
        }

        .copy-button {
            background: #f0b342 !important;
            border-radius: 20px !important;
            font-family: 'Rubik', sans-serif !important;
            width: 120px !important;
            height: 35px;
            color: white !important;
            border: 0 none !important;
            cursor: pointer !important;
        }

        .copy-button:hover {
            -moz-box-shadow: 0 0 0 2px white, 0 0 0 3px #f0b342 !important;
            box-shadow: 0 0 0 2px white, 0 0 0 3px #f0b342 !important;
            -webkit-box-shadow: 0 0 0 2px white, 0 0 0 3px #f0b342 !important;
        }

        table.dataTable {
            border: none !important;
            color: #004377 !important;
        }

        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
            color: #004377 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            color: #004377 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #fff !important;
            border: 1px solid #004377 !important;
            background-color: #004377 !important;
            box-shadow: 0 0 black;
        }

        table.dataTable thead th, table.dataTable thead td, table.dataTable tbody td {
            border-bottom: 1px solid #004377 !important;
            color: #004377;
        }

        th {
            color: #004377 !important;
            font-size: 24px;
        }

        table.dataTable.stripe tbody tr.odd, table.dataTable.display tbody tr.odd {
            background-color: transparent;
        }

        .sweet-alert {
            padding: 0px !important;
        }

        .sweet-alert h2 {
            color: #004377 !important;
        }

        @media (min-width: 320px) and (max-width: 480px) {
            th {
                color: #004377 !important;
                font-size: 14px;
            }
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Links Clientes</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                <ol class="breadcrumb">
                    <li><a href="{{ route('/') }}">Panel de Control</a></li>
                    <li class="active">Links Clientes</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-lg-12 col-md-10 col-sm-12">
                <p style="font-size: 40pt; font-weight: 500">Lista Links</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <table id="myTable" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Email</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientVideos as $clientVideo)
                            <tr>
                                <td>{{$clientVideo->client->name}}</td>
                                <td><a href="mailto:{{$clientVideo->client->email}}">{{$clientVideo->client->email}}</a></td>
                                <td>
                                    <button link-id="{{$clientVideo->token}}" data-link="delete_dialog" class="copy-button" title="Copiar Link">
                                        Copiar link
                                        <i class="mdi mdi-content-copy"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="sweet-overlay" tabindex="-1" style="opacity: 0; display: none;"></div>

    <div class="sweet-alert hideSweetAlert" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: none; margin-top: -80px; opacity: -0.01;">
        <div class="row" style="display: flex; align-items: center;">
            <div class="col-md-8">
                <h2>Link copiado!</h2>
            </div>
            <div class="col-md-4">
                <i class="mdi mdi-close-circle" style="font-size: 24px; cursor: pointer"></i>
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
    <script src="{{ asset('template/minimal/../plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('template/minimal/../plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>

    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->

    <!-- Sweet-Alert  -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>

    <script>
        $(document).ready(function () {

            $('[data-link]').click(function (e) {
                token_ = $(this).attr('link-id');
                e.preventDefault();
                var aux = document.createElement("input");
                let url = "{{ route('clientvideos.showvideo', 'xxxx') }}".replace(/xxxx/i, token_);
                console.log(url);
                aux.setAttribute("value",url);
                document.body.appendChild(aux);
                aux.select();
                document.execCommand("copy");
                document.body.removeChild(aux);

                $('.sweet-alert').removeClass("hideSweetAlert").addClass("showSweetAlert visible");
                $('.sweet-alert').css({
                    display : "block",
                    marginTop: "-80px",
                    opacity: 1
                });

                $('.sweet-overlay').css({
                    display : "block",
                    opacity: 1.08
                });
            });

            $('.mdi-close-circle').on('click', function() {
                $('.sweet-alert').removeClass("showSweetAlert visible").addClass("hideSweetAlert");
                $('.sweet-alert').css({
                    display : "none",
                    marginTop: "-80px",
                    opacity: 0
                });

                $('.sweet-overlay').css({
                    display : "none",
                    opacity: 0
                });
            });

            $(document).ready(function () {

                $('#myTable').DataTable({
                    "language": {
                                    "sProcessing":     "Procesando...",
                                    "sLengthMenu":     "Mostrar _MENU_ registros",
                                    "sZeroRecords":    "No se encontraron resultados",
                                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                    "sInfoPostFix":    "",
                                    "sSearch":         "",
                                    'searchPlaceholder': "Buscar...",
                                    "sUrl":            "",
                                    "sInfoThousands":  ",",
                                    "sLoadingRecords": "Cargando...",
                                    "oPaginate": {
                                        "sFirst":    "Primero",
                                        "sLast":     "Último",
                                        "sNext":     "Siguiente",
                                        "sPrevious": "Anterior"
                                    },
                                    "oAria": {
                                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                    }

                    }
                });

                var table = $('#example').DataTable({
                    language: 'es'
                    , "columnDefs": [
                        {
                            "visible": false
                            , "targets": 2
                        }
                    ]
                    , "order": [[2, 'asc']]
                    , "displayLength": 25
                    , "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    }
                    else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });

        $('#example23').DataTable({
            language: 'es',
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

    </script>

    @if(\Session::has('message'))
        <script>
            $(document).ready(function() {
                $.toast({
                    heading: 'Notificación',
                    text: '{{ \Session::get('message') }}',
                    position: 'top-right',
                    loaderBg:'#ff6849',
                    icon: 'success',
                    hideAfter: 4000,
                    stack: 6
                });
            });
        </script>
    @endif
    <!--Style Switcher -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endsection
