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
                            <a href="{{route('pesananSaya', Auth::user()->id)}}">
                                <i class="fa-solid fa-chevron-left"></i> Kembali
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a>ID PESANAN. 161865282920</a>
                        </div>
                        <div class="col-md-2">
                            <a>PESANAN SELESAI</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex shipping">
                        <div class="col-md-10">
                            <div class="address">Alamat Pengiriman :</div>
                            <div class="receive">Moch Surya (+62)89605279876</div>
                            <div class="street">Jalan Mahakam No 18, RT03/Rw03, Lingk.Mojoroto</div>
                        </div>
                        <div class="col-md-2">
                            <div class="card-nresi">Nomor Resi :</div>
                            <div class="card-resi">ID7899654808277080</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex orders">
                        <div class="col-md-4">
                            <img src="" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="nameproduk">Red Ferari Coupe Parked Beside Buildings</div>
                            <div class="card-qty">X2</div>
                            <div class="card-price">Rp80000</div>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('psDetails', Auth::user()->id)}}" class="btn btn-primary-all">Lacak Pesanan</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <div class="col-md-10">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-md-2 h">
                            <p>Rp178.000</p>
                        </div>

                    </div>
                    <div class="d-flex">
                        <div class="col-md-10">
                            Biaya Pengiriman</p>
                        </div>
                        <div class="col-md-2 h">
                            <p>Rp178.000</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-md-10">
                            <p>Total Pesanan</p>
                        </div>
                        <div class="col-md-2">
                            <p>Rp178.000</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-md-10">
                            <p>Metode Pembayaran</p>
                        </div>
                        <div class="col-md-2 h">
                            <p>Transfer Bank</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection