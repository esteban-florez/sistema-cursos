<header class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav align-items-center">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    <li class="nav-item">
      <span class="d-none d-sm-inline-block h5 m-0">Departamento de Vinculación Social</span>
    </li>
  </ul>
  <img src="{{ asset('img/logo-upta.png') }}" alt="Logo de la UPTA" class="brand-image footer-img d-sm-none"
    height="35">
  <ul class="navbar-nav ml-auto">
    {{-- comentado hasta que funcione --}}
    {{-- <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell navbar-icon"></i>
        <span class="badge badge-danger navbar-badge">2</span>
      </a>
      <x-layout.header.dropdown/>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link" role="button" data-toggle="modal" data-target="#infoModal">
        <i class="fas fa-info-circle mr-1"></i>
        <span class="d-none d-md-inline">Contáctanos</span>
      </a>
    </li>
  </ul>
</header>