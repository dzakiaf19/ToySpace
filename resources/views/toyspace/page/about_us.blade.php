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
                <div class="col-md-6 ml-1">
                    <img src="{{ asset('toyspace/assets/img/g2.png')}}" class="img-fluid mb-3" alt="...">
                    <img src="{{ asset('toyspace/assets/img/g3.png')}}" class="img-fluid" alt="...">
                </div>
            </div>
        </div>
    </section>

    <section id="visi-misi" class="visi-misi">
        <div class="container">
            <div class="d-flex">
                <div class="image-visi mr-3">
                    <div class="overlay-visi">
                        <h4>Visi Kami :</h4>
                        <li>Menjadi penyedia utama belanja mainan online yang inovatif dan terpercaya dengan memberikan pengalaman belanja yang memuaskan</li>
                    </div>
                </div>
                <div class="image-misi">
                    <div class="overlay-misi">
                        <h4>Misi Kami :</h4>
                        <li>Memberikan akses mudah dan luas terhadap berbagai pilihan mainan berkualitas, yang sesuai dengan kebutuhan dan preferensi setiap anak.</li>
                        <li>Menyediakan layanan pelanggan yang luar biasa, dengan fokus pada kepuasan dan keamanan pengguna dalam setiap transaksi.</li>
                        <li>Menghadirkan platform e-commerce yang ramah pengguna, intuitif, dan inovatif, yang mempermudah pengguna dalam menemukan, memilih, dan membeli mainan.</li>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="cta-aboutUs" class="cta-aboutUs">
        <div class="container">
            <h5>Toyspace adalah platform e-commerce yang mengkhususkan diri dalam penjualan berbagai macam mainan dan peralatan bermain.</h5>
            <p>Platform ini menyediakan berbagai jenis produk untuk anak-anak dari berbagai kategori, mulai dari mainan edukatif, mainan interaktif, hingga peralatan bermain luar ruangan. Toyspace bertujuan untuk menyediakan pengalaman berbelanja yang menyenangkan dan aman bagi orang tua serta anak-anak dengan menyediakan produk berkualitas dan pilihan yang beragam.</p>
            <a href="#" class="btn btn-primary-all">Jelajahi Sekarang</a>
        </div>
    </section>
</main>

@endsection