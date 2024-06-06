@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Products')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            @foreach($breadcrumbs as $breadcrumb)
                <li><a
                        href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['name'] }}</a>
                </li>
            @endforeach
        </ol>
    </div>
</section><!-- End Breadcrumbs -->
<section id="penawaran-produk" class="penawaran-produk" style="padding: 0">
    <div class="container">
        <div class="section-title d-flex justify-content-between">
            <h3>Katalog Produk</h3>
        </div>
        <div class="all-produk products row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-2 g-lg-3"
            data-aos="fade-up" data-aos-delay="200">
            @if($product->count())
                @foreach($product as $prod)
                    <div class="product col">
                        <a href="{{ route('singleProduct', ['product' => $prod]) }}" class="card-link">
                            <div class="card card-product shadow-sm h-100">
                                <img class="card-img-top"
                                    src='{{ $prod->images()->exists() ? Storage::url($prod->images->first()->path) : 'https://img.freepik.com/free-photo/abstract-textured-backgound_1258-30538.jpg?w=740&t=st=1717040880~exp=1717041480~hmac=48d946a95d70e6d9bdcaf19b81aaf4e71dce68fc0d9ab5a3109b75929f23c4d8' }}'
                                    alt=''>
                                <div class="card-body h-100">
                                    <h3 class="card-title">Rp. {{ $prod->price }}</h3>
                                    <h2 class="card-title">{{ $prod->name }}</h2>
                                    <div class="stok d-flex justify-content-between">
                                        <h4>Sisa Stok</h4>
                                        <h4>{{ $prod->stock }}</h4>
                                    </div>
                                    <div class="button-kendaraan">
                                        <div class="homecar-button d-flex justify-content-between">
                                            <a class="btn-beli"
                                                href="{{ route('singleProduct', ['product' => $prod]) }}">Beli
                                                Sekarang</a>
                                            <form
                                                action="{{ route('addCart', $prod) }}"" method="
                                                post">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1">
                                                <button class="btn-keranjang"
                                                    type="{{ $prod->stock > 0 ? 'submit' : 'button' }}"><i
                                                        class="fa-solid fa-cart-shopping"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p>Produk yang dicari tidak ditemukan</p>
            @endif
        </div>
    </div>
</section>

@endsection
