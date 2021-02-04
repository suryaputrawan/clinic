<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
    <div class="navbar-header">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="{{ route('dashboard') }}"><img src="#" alt="MY CLINIC"></a>
      <a class="navbar-brand hidden" href="{{ route('dashboard') }}"><img src="#" alt="Logo"></a>
    </div>
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
        </li>

        <h3 class="menu-title">COVID-19</h3><!-- /.menu-title -->
        <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bed"></i>COVID-19</a>
            <ul class="sub-menu children dropdown-menu">
              <li><i class="menu-icon fa fa-file-text-o"></i><a href="{{ route('rapidtest') }}">Rapid Test</a></li>
              <li><i class="menu-icon fa fa-file-text-o"></i><a href="{{ route('swabtest') }}">Swab Test</a></li>
              <li><i class="menu-icon fa fa-file-text-o"></i><a href="{{ route('antigen') }}">Antigen Swab</a></li>
            </ul>
        </li>
        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Utilities</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-user"></i><a href="{{ route('plebotomis') }}">Plebotomis</a></li>
            <li><i class="menu-icon fa fa-user"></i><a href="{{ route('labstaff') }}">Staff Lab</a></li>
            <li><i class="menu-icon fa fa-plus-square"></i><a href="{{ route('lab') }}">Laboratorium</a></li>
            <li><i class="menu-icon fa fa-user"></i><a href="{{ route('patient') }}">Patient</a></li>
            <li><i class="menu-icon fa fa-user-md"></i><a href="{{ route('dokter') }}">Doctor</a></li>
          </ul>
        </li>
        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-text"></i>Report</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-file"></i><a href="{{ route('report') }}">Rapid & Swabtest</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside><!-- /#left-panel -->