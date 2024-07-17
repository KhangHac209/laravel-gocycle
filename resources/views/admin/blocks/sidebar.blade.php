<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('asset/admin/dist/img/logoBicycle.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">GoCycle</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('asset/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li
                    class="nav-item has-treeview {{ request()->is('admin/dashboard*') || request()->is('admin/product_category*') || request()->is('admin/product*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/dashboard*') || request()->is('admin/product_category*') || request()->is('admin/product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DashBoard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product_category.index') }}"
                                class="nav-link {{ request()->routeIs('admin.product_category.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Category</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.product.index') }}"
                                class="nav-link {{ request()->routeIs('admin.product.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.product_category.create') }}"
                                class="nav-link {{ request()->routeIs('admin.product_category.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.product.create') }}"
                                class="nav-link {{ request()->routeIs('admin.product.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Product</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
