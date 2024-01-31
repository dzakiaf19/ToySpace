<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}" target="_blank">
            <img src="{{ asset('admin/assets/img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold" style="font-size:18px;">Toyspace.Inc</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <!-- <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main"> -->
    <div class="w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/dashboard')) active @endif"
                    href="{{ route('admin.dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/product', 'admin/product/add', 'admin/product/edit/*')) active @endif" href="{{ route('indexProduct') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-regular fa-file text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/category')) active @endif"
                    href="{{ route('indexCategory') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-book text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/orders')) active @endif" href="{{ route('admin.orders') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-money-bill text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>
            @role('superadmin')
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('admin/indexAdmin', 'admin/addAdmin')) active @endif" href="{{ route('indexAdmin') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-user text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Admin</span>
                    </a>
                </li>
            @endrole
            <!-- <li class="nav-item" id="tablesDropdown">
                <a class="nav-link @if (request()->is('admin/product')) active @endif" href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-regular fa-file text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Product</span>
                </a>
                <ul class="dropdown-menu-sidenav">
                    <li><a class="dropdown-item" href="">Show
                            Product</a></li>
                    <li><a class="dropdown-item" href="./pages/tables.html">Add Product</a></li>
                </ul>
            </li> -->
        </ul>
    </div>
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <div class="sidenav-footer mt-auto pt-8 mx-3">
            <button class="btn btn-sm mb-0 w-100" style="background: #24263D; color: #fff" type="submit">Log
                out</button>
        </div>
    </form>
</aside>
