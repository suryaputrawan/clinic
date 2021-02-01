<header id="header" class="header">

  <div class="header-menu">
    <div class="col-sm-7">
      <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
      @yield('search')
    </div>

    <div class="pull-right">
        <div class="user-area dropdown float-right">
            <i class="ti-user text-success border-success"></i>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="text-success border-success">{{ auth()->user()->name }}</span>
            </a>
            <div class="user-menu dropdown-menu" >
              <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-power-off"></i><strong> Logout </strong></a>
            </div>
        </div>
    </div>
  </div>

</header>