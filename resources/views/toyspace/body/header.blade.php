<!-- ======= Header ======= -->
<header id="header" class="fixed-top @if (request()->is('/')) @else header-inner-pages @endif">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo me-auto">
            <a href="{{ route('home') }}">TOYSPACE. INC</a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png"
        alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto @if (request()->is('/')) active @endif"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="#">About Us</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="#galeri">Products</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="#galeri">News</a>
                </li>
                <li>
                    <a class="nav-link scrollto" href="#contact">Contact Us</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

        <div class="log-cart d-flex">
            <div class="login">
                @if (Auth::check())
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                            class="fa-regular fa-user"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <li>
                                <button href="{{ route('logout') }}" class="dropdown-item" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </button>
                            </li>
                        </form>
                    </ul>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endif

            </div>
            <div class="cart">
                <i class="bi bi-cart3"></i>
                <span class="notification">3</span>
            </div>
        </div>

    </div>
</header>
<!-- End Header -->
