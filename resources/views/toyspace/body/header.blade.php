<!-- ======= Header ======= -->
<header id="header" class="fixed-top @if (request()->is('/')) @else header-inner-pages @endif">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo me-auto">
            <a href="{{ route('home') }}">TOYSPACE. INC</a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png"
        alt="" class="img-fluid"></a>-->

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav me-auto mb-lg-0">
                    </ul>
                    <form class="d-flex" action="" method="POST">
                        @csrf
                        <input class="form-control me-2" type="search" name="search" placeholder="Cari produk" aria-label="Search">
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <ul class="navbar-nav me-auto mb-lg-0">
                    </ul>
                </div>
            </div>
            <div class="log-cart d-flex">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item dropdown">
                        @if (Auth::check())
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="fa-regular fa-user"></i> {{ Auth::user()->firstName }}</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profil</a></li>
                                <li><a class="dropdown-item" href="{{route('pesananSaya', Auth::user()->id)}}">Pesanan Saya</a></li>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <li>
                                        <button href="{{ route('logout') }}" class="dropdown-item"
                                            @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        @else
                            <div class="row">
                                <a class="getstarted scrollto" href="{{ route('login') }}">Masuk</a>
                            </div>
                        @endif
                    </li>
                </ul>
                @if (Auth::check())
                    <a href="{{ route('shopCart') }}">

                        <div class="cart">
                            <i class="bi bi-cart3"></i>
                            {{-- <span class="notification">3</span> --}}
                        </div>
                    </a>
                @endif
            </div>
        </nav>
    </div>
</header>
<!-- End Header -->
