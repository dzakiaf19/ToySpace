@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Checkout Product')

@section('content')

    <main id="persanan-saya" class="pesanan-saya">
        <section id="title-cart" class="title-cart">
            <div class="container">
                @foreach ($order as $pesanan)
                    <div class="card">
                        <div class="card-header d-flex">
                            <h5 class="order-id">
                                ID Pesanan : ToySpace-{{ $pesanan->id }}
                            </h5>
                            <p class="status">
                                (@if ($pesanan->status === 'PENDING')
                                    Belum Dibayar
                                @elseif($pesanan->status === 'SUCCESS')
                                    Pesanan Sedang Diproses
                                @elseif($pesanan->status === 'CANCELLED')
                                    Dibatalkan
                                @elseif($pesanan->status === 'SEND')
                                    Sedang Dikirim
                                @elseif($pesanan->status === 'FINISHED')
                                    Pesanan Selesai
                                @else
                                    Status Tidak Dikenal
                                @endif)
                            </p>
                        </div>
                        <div class="card-body d-flex">
                            <div class="col-md-6">
                                <div class="nameproduk">Tanggal Pesanan : {{ $pesanan->created_at }}</div>
                                <div class="card-barang">
                                    Barang :
                                    <ul>
                                        @foreach ($pesanan->order_details as $item)
                                            <li>{{ $item->product->name }} - {{ $item->qty }} x
                                                Rp{{ $item->product->price }} = Rp{{ $item->qty * $item->product->price }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="card-qty">Total : Rp{{ $pesanan->total_price - $pesanan->ongkir_price }}</div>
                                <div class="card-price">Ongkos Kirim : Rp{{ $pesanan->ongkir_price }}
                                    ({{ $pesanan->courier }})</div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-2">
                                <a href="{{ route('psDetails', $pesanan) }}" class="btn btn-primary-all">Detail
                                    Pesanan</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

@endsection
