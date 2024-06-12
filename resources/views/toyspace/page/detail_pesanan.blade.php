@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Checkout Product')

@section('content')

    <main id="detail-pesanan-saya" class="detail-pesanan-saya">
        <section id="title-cart" class="title-cart">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="col-md-7">
                                <a href="{{ route('pesananSaya') }}">
                                    <i class="fa-solid fa-chevron-left"></i> Kembali
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a>ID Pesanan : ToySpace-{{ $order->id }}</a>
                            </div>
                            <div class="col-md-2">
                                @if ($order->status === 'PENDING')
                                    <a target="_blank" href="{{ $order->payment_url }}">
                                        Belum Dibayar
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                @elseif($order->status === 'SUCCESS')
                                    Pesanan Sedang Diproses
                                @elseif($order->status === 'CANCELLED')
                                    Dibatalkan
                                @elseif($order->status === 'SEND')
                                    Sedang Dikirim
                                @elseif($order->status === 'FINISHED')
                                    Pesanan Selesai
                                @else
                                    Status Tidak Dikenal
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex shipping">
                            <div class="col-md-8">
                                <div class="address">Alamat Pengiriman :</div>
                                <div class="receive">{{ $order->name }} (+62){{ $order->phone }}</div>
                                <div class="street">{{ $order->address }}</div>
                            </div>
                            <div class="col-md-1">
                                @if ($order->status === 'SUCCESS' || $order->status === 'SEND' || $order->status === 'FINISHED')
                                    <div class="card-nresi">
                                            <a href='{{ route('invoice.show', $order) }}' target='_blank'>
                                                Invoice
                                            </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <div class="card-nresi">Nomor Resi :</div>
                                <div class="card-resi">
                                    @if ($order->status === 'SEND' || $order->status === 'FINISHED')
                                        <a href='https://cekresi.com/tracking/cek-resi-jne.php?noresi=+{{ $order->no_resi }}'
                                            target='_blank'>
                                            {{ $order->no_resi }}<i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @php
                            $sub = 0;
                        @endphp
                        @foreach ($orderDetails as $detail)
                            <div class="d-flex orders mt-3">
                                <div class="col-md-4">
                                    <img src="{{ $detail->product->images()->exists() ? Storage::url($detail->product->images->first()->path) : 'https://img.freepik.com/free-photo/abstract-textured-backgound_1258-30538.jpg?w=740&t=st=1717040880~exp=1717041480~hmac=48d946a95d70e6d9bdcaf19b81aaf4e71dce68fc0d9ab5a3109b75929f23c4d8' }}"
                                        class="card-img-top" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="nameproduk">{{ $detail->product->name }}</div>
                                    <div class="card-qty">Rp{{ $detail->product->price }} x {{ $detail->qty }}</div>
                                    <div class="card-price">Rp{{ $sub = $sub + $detail->product->price * $detail->qty }}
                                    </div>
                                </div>
                                {{-- <div class="col-md-2">
                                    <a href="{{ route('psDetails', Auth::user()->id) }}" class="btn btn-primary-all">Lacak
                                        Pesanan</a>
                                </div> --}}
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <div class="col-md-10">
                                <p>Subtotal</p>
                            </div>
                            <div class="col-md-2 h">
                                <p>Rp{{ $sub }}</p>
                            </div>

                        </div>
                        <div class="d-flex">
                            <div class="col-md-10">
                                Biaya Pengiriman</p>
                            </div>
                            <div class="col-md-2 h">
                                <p>Rp{{ $order->ongkir_price }}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-md-10">
                                <p>Total Pesanan</p>
                            </div>
                            <div class="col-md-2">
                                <p>Rp{{ $order->total_price }}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-md-10">
                                <p>Metode Pembayaran</p>
                            </div>
                            <div class="col-md-2 h">
                                <p>{{ $order->payment_type }}</p>
                            </div>
                        </div>
                        @if ($order->status === 'SEND')
                            <div class="d-flex">
                                <div class="col-md-12">
                                    <a href="{{ route('selesai.pesan', $order) }}" class="btn btn-primary-all">
                                        Selesaikan Pesanan
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
