@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Tentang Kami')

@section('content')

<main id="about-us" class="about-us">
    <section id="title-cart" class="title-cart">
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>Kami adalah platform e-commerce yang menghadirkan berbagai macam mainan dan peralatan bermain untuk anak-anak dari segala usia, dengan komitmen memberikan pengalaman berbelanja yang menyenangkan dan aman bagi keluarga</p>
            <div class="d-flex">
                <img src="{{ asset('toyspace/assets/img/g1.png')}}" class="img-fluid" alt="...">
                <div class="row ml-2">
                    <img src="{{ asset('toyspace/assets/img/g2.png')}}" class="img-fluid mb-3" alt="...">
                    <img src="{{ asset('toyspace/assets/img/g3.png')}}" class="img-fluid mt-1" alt="...">
                </div>
            </div>
    </section>

    <section id="vs-ms" class="vs-ms">
        <div class="container d-flex">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-5">
                        <h4>Visi Kami :</h4>
                        <li>Menjadi penyedia utama belanja mainan online yang inovatif dan terpercaya dengan memberikan pengalaman belanja yang memuaskan</li>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Misi Kami :</h4>
                <li>Memberikan akses mudah dan luas terhadap berbagai pilihan mainan berkualitas, yang sesuai dengan kebutuhan dan preferensi setiap anak.</li>
                <li>Menyediakan layanan pelanggan yang luar biasa, dengan fokus pada kepuasan dan keamanan pengguna dalam setiap transaksi.</li>
                <li>Menghadirkan platform e-commerce yang ramah pengguna, intuitif, dan inovatif, yang mempermudah pengguna dalam menemukan, memilih, dan membeli mainan.</li>
            </div>
        </div>
    </section>
</main>

@endsection