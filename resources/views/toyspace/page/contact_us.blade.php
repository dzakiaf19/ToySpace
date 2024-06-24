@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Checkout Product')

@section('content')

    <main id="contact-us" class="contact-us">
        <section id="title-cart" class="title-cart">
            <div class="container">
                <h2>Kontak Kami</h2>
                <p>Kami adalah platform e-commerce yang menghadirkan berbagai macam mainan dan peralatan bermain untuk
                    anak-anak dari segala usia, dengan komitmen memberikan pengalaman berbelanja yang menyenangkan dan aman
                    bagi keluarga</p>
                {{-- <div class="card">
                    <div class="card-body p-5">
                        <div class="d-flex mb-3">
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" placeholder="cth. Moch Surya"
                                    aria-label="default input example">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="cth.name@example.com">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="subjek" class="form-label">Subjek</label>
                            <input class="form-control" type="text" placeholder="cth. Pembayaran gagal"
                                aria-label="default input example">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Tuliskan pesan anda disini" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <a href="#" class="btn btn-primary-all">Kirim Pesan</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <section id="cta-chatNow" class="cta-chatNow">
            <div class="container">
                <div class="col-md-9">
                    <h4>Kirim Pesan Secara Real Time Menggunakan Whatsapp?</h4>
                    <p>Kirim pesan real-time dengan satu klik saja, mudah dan cepat, memastikan komunikasi yang efisien dan
                        langsung dengan customer kami</p>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-primary-all">Kirim Pesan</a>
                </div>
            </div>
        </section>
    </main>

@endsection
