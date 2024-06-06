@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Single Product')

@section('content')
<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                    <li><a
                            href="">ini breadcrumbs</a>
                    </li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->
    <section class="product-detail" id="product-detail">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-6">
                    <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                        <!-- slides -->
                        <div class="carousel-inner">
                            @foreach($product->images as $key => $image)
                                <div
                                    class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img style="width: 100%;
                                        max-height: 400px; object-fit: scale-down;"
                                        src="{{ Storage::url($image->path) }}" alt="">
                                </div>
                            @endforeach
                        </div>

                        <!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline">
                            @foreach($product->images as $key => $image)
                                <li
                                    class="list-inline-item {{ $key == 0 ? 'active' : '' }}">
                                    <a id="{{ 'carousel-selector-' . $key }}" class="selected"
                                        data-slide-to="{{ $key }}" data-target="#custCarousel">
                                        <img style="object-fit: scale-down;"
                                            src="{{ Storage::url($image->path) }}" class="img-fluid">
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-lg-6 product-info">
                    <div class="title-product">
                        <h4>HOTSALE</h4>
                        <h3>{{ $product->name }}</h3>
                    </div>
                    <div class="description">
                        <div class="harga">
                            <div class="harga d-flex">
                                <h3>Rp {{ $product->price }} </h3>
                                <h4 style="padding-right: 10px;border-right: 1px solid #BFBFBF;
                                margin-right: 10px;">86 Stock Left</h4>
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <h4>4.9 (2130 reviews)</h4>
                            </div>
                        </div>
                        <div class="desc">
                            <h4>Description:</h4>
                            <p>{{ $product->desc }}</p>
                        </div>
                    </div>
                    <form action="{{ route('addCart', $product) }}" method="POST">
                        @csrf
                        <div class="add-cart d-flex">
                            <div class="col-2 quantity" style="padding:0">
                                {{-- <button class="decrease">-</button>
                                    <span class="count">1</span>
                                    <button class="increase">+</button> --}}
                                <input type="number" id="quantity" value="1" name="quantity" min="1"
                                    max="{{ $product->stock }}">
                            </div>
                            <div class="col-5 entry-button  justify-content-center pt-4 pt-lg-0" style="padding:0">
                                <button class="btn-entry" type="submit">Tambahkan Ke Keranjang</button>
                            </div>
                            <!-- <div class="col-5">
                                <button class="btn-entry" type="submit">Beli Sekarang</button>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="produk-serupa" class="produk-serupa">
        <div class="container">
            <div class="section-title d-flex justify-content-between">
                <h3>Produk Serupa</h3>
                <a href="{{ route('pageProducts') }}">Lihat Lebih Banyak <i
                        class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="all-produk products row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-2 g-lg-3"
                data-aos="fade-up" data-aos-delay="200">

            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
