<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin/dist/img/k.png') }}" alt="kasir Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </a>
    @if (Auth::user()->role == 'admin')
        <!-- Brand Logo -->

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                    <li class="nav-item {{ request()->routeIs('admin-dashboard') ? 'menu-open' : '' }} ">
                        <a href="{{ route('admin-dashboard') }}"
                            class="nav-link {{ request()->routeIs('admin-dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas bi bi-house"></i>
                            <p>
                                Dashboard
                                <i class=""></i>
                            </p>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('produk-admin', 'produk-edit', 'produk-create', 'produk-show') ? 'menu-open' : '' }} ">
                        <a href="{{ route('produk-admin') }}"
                            class="nav-link {{ request()->routeIs('produk-admin', 'produk-edit', 'produk-create', 'produk-show') ? 'active' : '' }}">
                            <i class="nav-icon fas bi bi-boxes"></i>
                            <p>
                                Produk
                                <i class=""></i>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('penjualan-admin') ? 'menu-open' : '' }} ">
                        <a href="{{ route('penjualan-admin') }}"
                            class="nav-link {{ request()->routeIs('penjualan-admin') ? 'active' : '' }}">
                            <i class="nav-icon fas bi bi-cart4"></i>
                            <p>
                                Penjualan
                                <i class=""></i>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('add_petugas') ? 'menu-open' : '' }} ">
                        <a href="{{ route('add_petugas') }}"
                            class="nav-link {{ request()->routeIs('add_petugas') ? 'active' : '' }}">
                            <i class="nav-icon fas bi bi-person-circle"></i>
                            <p>
                                User
                                <i class=""></i>
                            </p>
                        </a>
                    </li>

                    {{-- <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon  bi bi-box-arrow-left"></i>
                        <p>LogOut</p>
                    </a>
                </li> --}}
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    @else

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                    <li class="nav-item {{ request()->routeIs('petugas-dashboard') ? 'menu-open' : '' }} ">
                        <a href="{{ route('petugas-dashboard') }}"
                            class="nav-link {{ request()->routeIs('petugas-dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas bi bi-house"></i>
                            <p>
                                Dashboard
                                <i class=""></i>
                            </p>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('produk-petugas', 'produk-petugas-show') ? 'menu-open' : '' }} ">
                        <a href="{{ route('produk-petugas') }}"
                            class="nav-link {{ request()->routeIs('produk-petugas', 'produk-petugas-show') ? 'active' : '' }}">
                            <i class="nav-icon fas bi bi-boxes"></i>
                            <p>
                                Produk
                                <i class=""></i>
                            </p>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('penjualan', 'penjualan-create', 'detail-penjualan-petugas' , 'admin-detail-penjualan') ? 'menu-open' : '' }} ">
                        <a href="{{ route('penjualan') }}"
                            class="nav-link {{ request()->routeIs('penjualan', 'penjualan-create', 'detail-penjualan-petugas' , 'admin-detail-penjualan') ? 'active' : '' }}">
                            <i class="nav-icon fas bi bi-cart4"></i>
                            <p>
                                Penjualan
                                <i class=""></i>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    @endif
</aside>
