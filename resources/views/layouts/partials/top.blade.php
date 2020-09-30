@php
    $userLogin = \Auth::user();
    $color = $userLogin->getBusiness()->color_primary;
    $businessName = $userLogin->getBusiness()->business;
    $logo = $userLogin->getBusiness()->logo;

@endphp

<style>
    .top-left-part a {
        /* height: 60px; */
        padding: 0px !important
    }

    .navbar-header {
        background: <?php echo $color; ?> !important;
    }

    .text-top-nav-left {
        font-size: 22px;
        color: #fff;
        font-weight: bold;
        margin-top: 10px;
    }
</style>

<nav class="navbar navbar-default navbar-static-top m-b-0">
  <div class="navbar-header">
      <div class="top-left-part" style="height: 60px;">
          <!-- Logo -->
          <a class="logo" href="{{ route('/') }}">
            <b class="hidden-md hidden-lg">
              <img src="{{ $logo }}" alt="home" class="dark-logo" />
              <img src="{{ $logo }}" alt="home" class="light-logo" style="width: 40px; margin-top: 18;"/>
            </b>
            <span class="hidden-xs">
                <img src="{{ $logo }}" alt="home" class="dark-logo" />
                <img src="{{ $logo }}" alt="home" class="light-logo" style="margin-left: 50px;" />
            </span>
          </a>
      </div>
      <!-- /Logo -->
      <!-- Search input and Toggle icon -->
      <ul class="nav navbar-top-links navbar-left">
          <li><a href="javascript:void(0)" class="open-close waves-effect waves-light" style="display: inline;"><i class="ti-menu"></i></a></li>
          <li class="text-top-nav-left">{{$businessName}}</li>

          <!-- /.Megamenu -->
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">

        <li class="dropdown">
            <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-bell-outline"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#"> <strong>Ver propuestas</strong> <i class="fa fa-angle-right"></i> </a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-email-outline"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
            <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#"> <strong>Ver propuestas</strong> <i class="fa fa-angle-right"></i> </a>
                </li>
            </ul>
        </li>

          <li class="dropdown">
              <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ $userLogin->avatar }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b><span class="caret"></span> </a>
              <ul class="dropdown-menu dropdown-user animated flipInY">
                  <li>
                      <div class="dw-user-box">
                          <div class="u-img"><img src="{{ $userLogin->avatar }}" alt="user" /></div>
                          <div class="u-text">
                              <h4>{{ Auth::user()->name.' '.Auth::user()->last_name }}</h4>
                              <p class="text-muted">{{ Auth::user()->email }}</p></div>
                      </div>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{ route('admin.users.show', $userLogin->id) }}"><i class="ti-user"></i> Mi perfil</a></li>
                  <li><a href="{{ route('admin.business.show', $userLogin->business_id) }}"><i class="ti-wallet"></i> Concesionario</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#"><i class="ti-settings"></i> Cambiar contraseña</a></li>
                  <li role="separator" class="divider"></li>
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          <i class="fa fa-power-off"></i> {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                </li>
              </ul>
              <!-- /.dropdown-user -->
          </li>

          <!-- /.dropdown -->
      </ul>
  </div>
  <!-- /.navbar-header -->
  <!-- /.navbar-top-links -->
  <!-- /.navbar-static-side -->
</nav>
