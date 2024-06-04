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
                    <form class="d-flex" action="/pageProducts" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" value="{{ request('search') }}" name="search" class="form-control"
                                placeholder="Cari Produk" aria-label="Search" aria-describedby="button-search">
                            <select class="form-select" name="category" aria-label="Category select">
                                <option value="" selected>Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ old('category', request('category')) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-danger" type="submit" id="button-search"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
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
                                <li><a class="dropdown-item" href="{{ route('pesananSaya', Auth::user()->id) }}">Pesanan
                                        Saya</a></li>
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
