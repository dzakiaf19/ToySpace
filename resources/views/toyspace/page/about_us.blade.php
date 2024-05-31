@extends('toyspace.index_master')
@section('title', 'TOYSPACE. INC | Tentang Kami')

@section('content')

<main id="about-us" class="about-us">
    <section id="title-cart" class="title-cart">
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>Kami adalah platform e-commerce yang menghadirkan berbagai macam mainan dan peralatan bermain untuk anak-anak dari segala usia, dengan komitmen memberikan pengalaman berbelanja yang menyenangkan dan aman bagi keluarga</p>
            <div class="d-flex">
                <div class="">
                    <img src="{{ asset('toyspace/assets/img/g1.png')}}" class="img-fluid" alt="...">
                </div>
            </div>
        </div>
    </section>
</main>

@endsection