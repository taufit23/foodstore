<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ (auth()->user()->role == 'admin') ? route('admin.dashboard') : route('toko.dashboard') }}"
        class="brand-link">
        <span class="brand-text font-weight-light">Kuliner Kampar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (auth()->user()->role == 'toko')
            <div class="image">
                <img src="{{ asset(Auth::user()->toko->cover) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            @endif
            <div class="info">
                <a href="{{ (auth()->user()->role == 'admin') ? route('admin.dashboard') : route('toko.dashboard') }}"
                    class="d-block">{{ auth()->user()->toko->nama_usaha }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    @if (auth()->user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    @else
                    <a href="{{ route('toko.dashboard') }}"
                        class="nav-link {{ Request::is('tokos/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    @endif
                </li>
                {{-- admin link --}}
                @if (auth()->user()->role == 'admin')
                <li class="nav-header">Other Actor</li>
                <li class="nav-item">
                    <a href="{{ route('sellers.index') }}"
                        class="nav-link {{ Request::is('admin/sellers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-product-hunt"></i>
                        <p>
                            Sellers
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item menu-open">
                    <a href="{{ route('product.index') }}"
                        class="nav-link {{ Request::is('tokos/product*') ? 'active' : '' }}">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-header">Account</li>
                <li class="nav-item">
                    <a class="btn btn-primary btn-block" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <ion-icon name="log-out-outline"></ion-icon>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>