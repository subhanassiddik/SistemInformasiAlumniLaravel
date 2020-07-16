
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
		<img src="{{asset('sbadmin/img/logo.png')}}" width="35" height="30" class="d-inline-block align-top" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item">
          <a class="nav-link" href="{{route('admin.alumni.index')}}">
            <i class="fas fa-fw fas fa-users	"></i>
            <span>Data Alumni</span>
          </a>
      </li>
   
      <li class="nav-item">
          <a class="nav-link" href="{{route('admin.ikatan_alumni.index')}}">
            <i class="fas fa-fw far fa-address-book"></i>
            <span>Ikatan Alumni</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Info Lowongan Kerja</span>
          </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-list"></i>
          <span>Master</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Info Kampus:</h6>
            <a class="collapse-item" href="{{route('admin.prodi.index')}}">Prodi</a>
            <a class="collapse-item" href="{{route('admin.jurusan.index')}}">Jurusan</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other:</h6>
            <a class="collapse-item" href="{{route('admin.kelulusan.index')}}">Daftar Angkatan/Alumni</a>
            <a class="collapse-item" href="{{route('admin.bidang_pekerjaan.index')}}">Bidang Pekerjaan</a>
            <a class="collapse-item" href="blank.html">Info Penting</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
          <i class="fas fa-fw fa-key"></i>
          <span>Log Out</span></a>
      </li>

      <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
          @crsf
      </form>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
