@extends('layouts.video')

@section('title', 'Wizard')

@section('css')

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('template/minimal/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--alerts CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <!-- Menu CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- Wizard CSS -->
    <link href="{{ asset('template/minimal/../plugins/bower_components/jquery-wizard-master/css/wizard.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('template/minimal/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('template/minimal/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('template/minimal/css/colors/default.css') }}" id="theme" rel="stylesheet">


@endsection

@section('content')

  <div class="container-fluid">
      <div class="row bg-title">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h4 class="page-title">Video Wizard</h4> </div>
          <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                  <li><a href="{{ route('/') }}">Dashboard</a></li>
                  <li class="active">Video Wizard</li>
              </ol>
          </div>
          <!-- /.col-lg-12 -->
      </div>

      <!-- .row -->
      <div class="row">
          <div class="col-sm-12">
              <div class="white-box">
                  <h3 class="box-title m-b-0">Validation</h3>
                  <p class="text-muted m-b-30 font-13"> This is the Validation wizard with validation.</p>
                  <div id="exampleValidator" class="wizard">
                      <ul class="wizard-steps" role="tablist">
                          <li class="active" role="tab">
                              <h4><span>1</span>Cliente</h4> </li>
                          <li role="tab">
                              <h4><span>2</span>Presentasión</h4> </li>

                          @foreach ($features as $key => $feature)
                            <li role="tab">
                                <h4><span>{{$key+3}}</span>{{$feature->name}}</h4> </li>
                          @endforeach
                          <li role="tab">
                              <h4><span>{{count($features) + 3}}</i></span>Video Final</h4> </li>
                      </ul>
                      <form id="validation" class="form-horizontal">
                          <div class="wizard-content">
                              <div class="wizard-pane active" role="tabpanel">
                                  <div class="form-group">
                                      <label class="col-xs-3 control-label">Cliente</label>
                                      <div class="col-xs-5">
                                          <input type="text" class="form-control" name="email" /> </div>
                                  </div>
                              </div>

                              <div class="wizard-pane" role="tabpanel">
                                  <div class="row">
                                      <div class="col-xs-5">
                                          <h3> Video de presentasion del agente de ventas </h3>
                                      </div>
                                  </div>

                                <!-- .row -->
                                  <div class="row">

                                      <div class="col-md-12 col-lg-3">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video</h2>
                                                      <h5 class="text-muted m-t-0">Descripcion</h5></div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12 col-lg-3">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video</h2>
                                                      <h5 class="text-muted m-t-0">Descripcion</h5></div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12 col-lg-3">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video</h2>
                                                      <h5 class="text-muted m-t-0">Descripcion</h5></div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12 col-lg-3">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video</h2>
                                                      <h5 class="text-muted m-t-0">Descripcion</h5></div>
                                              </div>
                                          </div>
                                      </div>


                                  </div>
                                <!-- /.row -->

                                <!-- .row -->
                                  <div class="row">

                                      <div class="col-md-6 col-lg-3">

                                      </div>

                                      <div class="col-md-12 col-lg-6">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video </h2>
                                                      <h5 class="text-muted m-t-0">Reproducion</h5></div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-md-6 col-lg-3">

                                      </div>

                                  </div>
                                <!-- /.row -->
                              </div>

                              @foreach ($features as $key => $feature)
                                <div class="wizard-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <h3> Elige {{$feature->name}} </h3>
                                        </div>
                                    </div>

                                  <!-- .row -->
                                    <div class="row">
                                      @foreach ($feature->getOptions($key + 1) as $opt)

                                        <div class="col-md-12 col-lg-3">

                                            <div class="white-box" style="background-color: beige;">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h2 class="m-b-0 font-medium">{{$opt->name}}</h2>
                                                        <h5 class="text-muted m-t-0">Descripcion</h5></div>
                                                </div>
                                            </div>

                                            <!-- <div class="btn-group">
                                                <button class="btn btn-default btn-outline" type="button">
                                                    <i class="icon-people"></i><br/>
                                                    <span>name</span>
                                                </button>
                                            </div>  -->

                                        </div>
                                      @endforeach
                                    </div>
                                  <!-- /.row -->

                                  <!-- .row -->
                                    <div class="row">

                                        <div class="col-md-6 col-lg-3">

                                        </div>

                                        <div class="col-md-12 col-lg-6">
                                            <div class="white-box" style="background-color: beige;">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h2 class="m-b-0 font-medium">Video </h2>
                                                        <h5 class="text-muted m-t-0">Reproducion</h5></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-3">

                                        </div>

                                    </div>
                                  <!-- /.row -->
                                </div>
                              @endforeach

                              <div class="wizard-pane" role="tabpanel">
                                  <div class="row">
                                      <div class="col-xs-5">
                                          <h3> Video final del agente de ventas </h3>
                                      </div>
                                  </div>

                                <!-- .row -->
                                  <div class="row">

                                      <div class="col-md-12 col-lg-3">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video</h2>
                                                      <h5 class="text-muted m-t-0">Descripcion</h5></div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12 col-lg-3">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video</h2>
                                                      <h5 class="text-muted m-t-0">Descripcion</h5></div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12 col-lg-3">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video</h2>
                                                      <h5 class="text-muted m-t-0">Descripcion</h5></div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12 col-lg-3">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video</h2>
                                                      <h5 class="text-muted m-t-0">Descripcion</h5></div>
                                              </div>
                                          </div>
                                      </div>


                                  </div>
                                <!-- /.row -->

                                <!-- .row -->
                                  <div class="row">

                                      <div class="col-md-6 col-lg-3">

                                      </div>

                                      <div class="col-md-12 col-lg-6">
                                          <div class="white-box" style="background-color: beige;">
                                              <div class="row">
                                                  <div class="col-sm-6">
                                                      <h2 class="m-b-0 font-medium">Video </h2>
                                                      <h5 class="text-muted m-t-0">Reproducion</h5></div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-md-6 col-lg-3">

                                      </div>

                                  </div>
                                <!-- /.row -->
                              </div>

                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

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
    <!-- Form Wizard JavaScript -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js') }}"></script>
    <!-- FormValidation -->
    <link rel="stylesheet" href="{{ asset('template/minimal/../plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css') }}">
    <!-- FormValidation plugin and the class supports validating Bootstrap form -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js') }}"></script>
    <script src="{{ asset('template/minimal/../plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('template/minimal/js/custom.min.js') }}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{ asset('template/minimal/../plugins/bower_components/sweetalert/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        (function () {
            $('#exampleValidator').wizard({
                onInit: function () {
                    $('#validation').formValidation({
                        framework: 'bootstrap'
                        , fields: {
                            username: {
                                validators: {
                                    notEmpty: {
                                        message: 'The username is required'
                                    }
                                    , stringLength: {
                                        min: 6
                                        , max: 30
                                        , message: 'The username must be more than 6 and less than 30 characters long'
                                    }
                                    , regexp: {
                                        regexp: /^[a-zA-Z0-9_\.]+$/
                                        , message: 'The username can only consist of alphabetical, number, dot and underscore'
                                    }
                                }
                            }
                            , email: {
                                validators: {
                                    notEmpty: {
                                        message: 'The email address is required'
                                    }
                                    , emailAddress: {
                                        message: 'The input is not a valid email address'
                                    }
                                }
                            }
                            , password: {
                                validators: {
                                    notEmpty: {
                                        message: 'The password is required'
                                    }
                                    , different: {
                                        field: 'username'
                                        , message: 'The password cannot be the same as username'
                                    }
                                }
                            }
                        }
                    });
                }
                , validator: function () {
                    var fv = $('#validation').data('formValidation');
                    var $this = $(this);
                    // Validate the container
                    fv.validateContainer($this);
                    var isValidStep = fv.isValidContainer($this);
                    if (isValidStep === false || isValidStep === null) {
                        return false;
                    }
                    return true;
                }
                , onFinish: function () {
                    $('#validation').submit();
                    swal("Message Finish!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
                }
            });

        })();
    </script>
    <!--Style Switcher -->


@endsection
