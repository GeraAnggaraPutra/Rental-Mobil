<aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color:royalblue;">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline text-dark">
            <div class="input-group text-dark" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p style="color: white">
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profileadmin.index') }}"
                        class="nav-link {{ Request::is('admin/profileadmin*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p style="color: white">
                            Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p style="color: white">
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link  {{ Request::is('admin/mobil*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-car"></i>
                        <p style="color: white">
                            Data Mobil
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('mobil.index') }}"
                                class="nav-link  {{ Request::is('admin/mobil') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">Mobil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('merk.index') }}"
                                class="nav-link  {{ Request::is('admin/merk*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">Merk</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('supir.index') }}"
                        class="nav-link  {{ Request::is('admin/supir*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p style="color: white">
                            Supir
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link  {{ Request::is('admin/transaksi*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p style="color: white">
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('transaksi.index') }}"
                                class="nav-link  {{ Request::is('admin/transaksi') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">All Transaksi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.pending') }}"
                                class="nav-link  {{ Request::is('admin/transaksi-pending*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">Pending</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.onRent') }}"
                                class="nav-link  {{ Request::is('admin/transaksi-OnRent*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">On Rent</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.selesai') }}"
                                class="nav-link  {{ Request::is('admin/transaksi-selesai*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">Selesai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi.dibatalkan') }}"
                                class="nav-link  {{ Request::is('admin/transaksi-dibatalkan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">Dibatalkan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link  {{ Request::is('admin/pembayaran*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p style="color: white">
                            Pembayaran
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pembayaran.index') }}"
                                class="nav-link  {{ Request::is('admin/pembayaran') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">Semua pembayaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pembayaran.cod') }}"
                                class="nav-link  {{ Request::is('admin/pembayaran-cod*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">COD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pembayaran.wallet') }}"
                                class="nav-link  {{ Request::is('admin/pembayaran-wallet*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">Wallet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pembayaran.transfer') }}"
                                class="nav-link  {{ Request::is('admin/pembayaran-transfer*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p style="color: white">Transfer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('topup.index') }}"
                        class="nav-link  {{ Request::is('admin/topup*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p style="color: white">
                            Top Up
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.index') }}"
                        class="nav-link  {{ Request::is('admin/contact*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p style="color: white">
                            Kontak Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan') }}"
                        class="nav-link  {{ Request::is('admin/laporan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p style="color: white">
                            Laporan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
