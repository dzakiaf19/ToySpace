@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Products')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
            <ol>
                <li> <a href="">Beranda</a></li>
                <li><a href="">Hewan</a></li>
            </ol>
    </div>
</section><!-- End Breadcrumbs -->
<section id="penawaran-produk" class="penawaran-produk" style="padding: 0">
    <div class="container">
        <div class="section-title d-flex justify-content-between">
            <h3>Penawaran Terbaik</h3>
        </div>
        <div class="all-produk products row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-2 g-lg-3"
            data-aos="fade-up" data-aos-delay="200">
            <div class="product col">
                <div class="card card-product shadow-sm h-100">
                    <img class="card-img-top" src="{{ asset('toyspace/assets/img/products/product-4.png') }}"
                        alt=''>
                    <div class="card-body h-100">
                        <h3 class="card-title">Rp. 89.000</h3>
                        <h2 class="card-title">Red Ferrari Coupe Parked Beside Buildings</h2>
                        <div class="stok d-flex justify-content-between">
                            <h4>Sisa Stok</h4>
                            <h4>489</h4>
                        </div>
                        <div class="button-kendaraan">
                            <div class="homecar-button d-flex justify-content-between">
                                <button class="btn-beli"
                                    onclick="window.location.href = 'detailkendaraan.html';">Beli Sekarang</button>
                                <button class="btn-keranjang"
                                    onclick="window.location.href = 'keranjang.html';"><i
                                        class="fa-solid fa-cart-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product col">
                <div class="card card-product shadow-sm h-100">
                    <img class="card-img-top" src="{{ asset('toyspace/assets/img/products/product-5.png') }}"
                        alt=''>
                    <div class="card-body h-100">
                        <h3 class="card-title">Rp. 89.000</h3>
                        <h2 class="card-title">Red Ferrari Coupe Parked Beside Buildings</h2>
                        <div class="stok d-flex justify-content-between">
                            <h4>Sisa Stok</h4>
                            <h4>489</h4>
                        </div>
                        <div class="button-kendaraan">
                            <div class="homecar-button d-flex justify-content-between">
                                <button class="btn-beli"
                                    onclick="window.location.href = 'detailkendaraan.html';">Beli Sekarang</button>
                                <button class="btn-keranjang"
                                    onclick="window.location.href = 'keranjang.html';"><i
                                        class="fa-solid fa-cart-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product col">
                <div class="card card-product shadow-sm h-100">
                    <img class="card-img-top" src="{{ asset('toyspace/assets/img/products/product-6.png') }}"
                        alt=''>
                    <div class="card-body h-100">
                        <h3 class="card-title">Rp. 89.000</h3>
                        <h2 class="card-title">Red Ferrari Coupe Parked Beside Buildings</h2>
                        <div class="stok d-flex justify-content-between">
                            <h4>Sisa Stok</h4>
                            <h4>489</h4>
                        </div>
                        <div class="button-kendaraan">
                            <div class="homecar-button d-flex justify-content-between">
                                <button class="btn-beli"
                                    onclick="window.location.href = 'detailkendaraan.html';">Beli Sekarang</button>
                                <button class="btn-keranjang"
                                    onclick="window.location.href = 'keranjang.html';"><i
                                        class="fa-solid fa-cart-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product col">
                <div class="card card-product shadow-sm h-100">
                    <img class="card-img-top" src="{{ asset('toyspace/assets/img/products/product-7.png') }}"
                        alt=''>
                    <div class="card-body h-100">
                        <h3 class="card-title">Rp. 89.000</h3>
                        <h2 class="card-title">Red Ferrari Coupe Parked Beside Buildings</h2>
                        <div class="stok d-flex justify-content-between">
                            <h4>Sisa Stok</h4>
                            <h4>489</h4>
                        </div>
                        <div class="button-kendaraan">
                            <div class="homecar-button d-flex justify-content-between">
                                <button class="btn-beli"
                                    onclick="window.location.href = 'detailkendaraan.html';">Beli Sekarang</button>
                                <button class="btn-keranjang"
                                    onclick="window.location.href = 'keranjang.html';"><i
                                        class="fa-solid fa-cart-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product col">
                <div class="card card-product shadow-sm h-100">
                    <img class="card-img-top" src="{{ asset('toyspace/assets/img/products/product-8.png') }}"
                        alt=''>
                    <div class="card-body h-100">
                        <h3 class="card-title">Rp. 89.000</h3>
                        <h2 class="card-title">Red Ferrari Coupe Parked Beside Buildings</h2>
                        <div class="stok d-flex justify-content-between">
                            <h4>Sisa Stok</h4>
                            <h4>489</h4>
                        </div>
                        <div class="button-kendaraan">
                            <div class="homecar-button d-flex justify-content-between">
                                <button class="btn-beli"
                                    onclick="window.location.href = 'detailkendaraan.html';">Beli Sekarang</button>
                                <button class="btn-keranjang"
                                    onclick="window.location.href = 'keranjang.html';"><i
                                        class="fa-solid fa-cart-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product col">
                <div class="card card-product shadow-sm h-100">
                    <img class="card-img-top" src="{{ asset('toyspace/assets/img/products/product-9.png') }}"
                        alt=''>
                    <div class="card-body h-100">
                        <h3 class="card-title">Rp. 89.000</h3>
                        <h2 class="card-title">Red Ferrari Coupe Parked Beside Buildings</h2>
                        <div class="stok d-flex justify-content-between">
                            <h4>Sisa Stok</h4>
                            <h4>489</h4>
                        </div>
                        <div class="button-kendaraan">
                            <div class="homecar-button d-flex justify-content-between">
                                <button class="btn-beli"
                                    onclick="window.location.href = 'detailkendaraan.html';">Beli Sekarang</button>
                                <button class="btn-keranjang"
                                    onclick="window.location.href = 'keranjang.html';"><i
                                        class="fa-solid fa-cart-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
