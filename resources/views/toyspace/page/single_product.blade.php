@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Single Product')

@section('content')
    <main id="main">
        <section class="product-detail" id="product-detail">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-7">
                        <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                            <!-- slides -->
                            <div class="carousel-inner">
                                @foreach ($product->images as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img style="width: 100%;
                                        max-height: 400px; object-fit: scale-down;" src="{{ Storage::url($image->path) }}" alt="">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Thumbnails -->
                            <ol class="carousel-indicators list-inline">
                                @foreach ($product->images as $key => $image)
                                    <li class="list-inline-item {{ $key == 0 ? 'active' : '' }}">
                                        <a id="{{ 'carousel-selector-' . $key }}" class="selected"
                                            data-slide-to="{{ $key }}" data-target="#custCarousel">
                                            <img style="object-fit: scale-down;" src="{{ Storage::url($image->path) }}" class="img-fluid">
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <div class="col-lg-5 product-info">
                        <div class="title-product">
                            <h4>HOTSALE</h4>
                            <h3>{{ $product->name }}</h3>
                        </div>
                        <div class="description">
                            <div class="harga">
                                <div class="harga d-flex">
                                    <h3>Rp {{ $product->price }} </h3>
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
                                <div class="col-1 qty" style="padding:0">
                                    <h5>Qty</h5>
                                </div>
                                <div class="col-5 quantity" style="padding:0">
                                    {{-- <button class="decrease">-</button>
                                    <span class="count">1</span>
                                    <button class="increase">+</button> --}}
                                    <input type="number" id="quantity" value="1" name="quantity" min="1" max="{{$product->stock}}">
                                </div>
                                <div class="col-6 entry-button  justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                                    style="padding:0">
                                    <button class="btn-entry" type="submit">ADD TO CART</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
