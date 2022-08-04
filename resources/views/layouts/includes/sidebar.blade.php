<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ route('adminprofile.index') }}" class="nav-link {{ Request::is('admin/adminprofile*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('mobil.index') }}" class="nav-link  {{ Request::is('admin/mobil*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Mobil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('supir.index') }}" class="nav-link  {{ Request::is('admin/supir*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Supir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('transaksi.index') }}" class="nav-link  {{ Request::is('admin/transaksi*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('customer.index') }}" class="nav-link  {{ Request::is('admin/customer*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Customer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('laporan.index') }}" class="nav-link  {{ Request::is('admin/laporan*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.home') }}" class="nav-link  ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Halaman Customer
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>