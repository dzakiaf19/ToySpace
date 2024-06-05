@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Checkout Product')

@section('content')

    <main id="persanan-saya" class="pesanan-saya">
        <section id="title-cart" class="title-cart">
            <div class="container">
                @foreach ($order as $pesanan)
                    <div class="card">
                        <div class="card-header">
                            ID Pesanan : # 987629202
                        </div>
                        <div class="card-body d-flex">
                            <div class="col-md-4">
                                <img src="" class="card-img-top" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="nameproduk">Red Ferari Coupe Parked Beside Buildings</div>
                                <div class="card-qty">X2</div>
                                <div class="card-price">Rp80000</div>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('psDetails', Auth::user()->id) }}" class="btn btn-primary-all">Detail
                                    Pesanan</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

@endsection
