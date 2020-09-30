@php
    $userLogin = \Auth::user();
@endphp

<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav slimscrollsidebar">
    <div class="sidebar-head">
          <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Menú</span></h3> </div>
          <div class="user-profile">
            <div class="dropdown user-pro-body">
            <!-- <div><img src="{{ $userLogin->avatar }}" alt="user-img" class="img-circle"></div> -->
            <!-- <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name.' '.Auth::user()->last_name }} <span class="caret"></span></a> -->
                <!-- <ul class="dropdown-menu animated flipInY">
                    <li><a href="{{ route('admin.users.show', $userLogin->id) }}"><i class="ti-user"></i> Mi perfil</a></li>
                    <li><a href="{{ route('admin.business.show', $userLogin->business_id) }}"><i class="ti-wallet"></i> Mi trabajo</a></li>
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
                </ul> -->
            </div>
        </div>
      <ul class="nav" id="side-menu">
          <li> <a href="{{ route('/') }}" class="waves-effect"><i class="mdi mdi-play-circle-outline fa-fw" data-icon="v"></i> <span class="hide-menu">Video</span></a> </li>
          <!-- <li class="devider"></li> -->
          <!-- <li> <a href="{{ route('admin.videos.create') }}" class="waves-effect"><i class="mdi mdi-play-circle-outline fa-fw" data-icon="v"></i> <span class="hide-menu">Videos</span></a> </li> -->
          <li class="devider"></li>
          <li> <a href="{{ route('admin.metrics') }}" class="waves-effect"><i class="mdi mdi-chart-line fa-fw" data-icon="v"></i> <span class="hide-menu">Métricas</span></a> </li>
          <li class="devider"></li>
          <li> <a href="{{ route('admin.users.gallery') }}" class="waves-effect"><i class="mdi mdi-folder-multiple-image fa-fw" data-icon="v"></i> <span class="hide-menu">Galeria</span></a> </li>
          <li class="devider"></li>
          <li> <a href="#" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu">Histórico</span></a> </li>
          <li class="devider"></li>

      </ul>
  </div>
</div>
