<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Argon Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

    <style>
        #navbar-register.navbar-scrolled {
            transform: translateY(-114%);
            transition: transform 0.3s ease-in-out;
        }

        #navbar-register {
            /* Atur posisi awal navbar */
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav id="navbar-register" class="navbar navbar-expand-lg border-radius-lg top-0 z-index-3 position-absolute mt-4 py-2 start-0 end-0 mx-4" style="background: transparent; box-shadow: none;">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('register') }}">
                            <!-- Argon Dashboard 2 -->
                            <img src="{{ asset('admin/assets/img/logo-transparent.png') }}" alt="">
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-6">
                                <li class="nav-item mx-3">
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html" style="color: #fff;">
                                        <!-- <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i> -->
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a class="nav-link me-2" href="../pages/profile.html" style="color: #fff;">
                                        <!-- <i class="fa fa-user opacity-6 text-dark me-1"></i> -->
                                        Product
                                    </a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a class="nav-link me-2" href="../pages/sign-up.html" style="color: #fff;">
                                        <!-- <i class="fas fa-user-circle opacity-6 text-dark me-1"></i> -->
                                        Category
                                    </a>
                                </li>
                                <li class="nav-item mx-3">
                                    <a class="nav-link me-2" href="../pages/sign-in.html" style="color: #fff;">
                                        <!-- <i class="fas fa-key opacity-6 text-dark me-1"></i> -->
                                        Orders
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="../pages/sign-in.html" style="color: #fff;">
                                        <!-- <i class="fas fa-key opacity-6 text-dark me-1"></i> -->
                                        Users
                                    </a>
                                </li>
                            </ul>
                            <!-- <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/product/argon-dashboard"
                                        class="btn btn-sm mb-0 me-1 btn-primary">Free Download</a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{ asset('admin/assets/img/register.png') }}'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
                        <p class="text-lead text-white">Gunakan formulir luar biasa ini untuk membuat akun baru secara gratis.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center pb-6">
                <div class="col-xl-9 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0" style="width: 800px">
                        <div class="card-header text-center pt-4">
                            <h5>Daftar Akun</h5>
                        </div>
                        <div class="card-body pt-0">
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Nama Depan</label>
                                            <input type="text" pattern="[a-zA-Z][a-zA-Z ]{2,}" name="firstName" id="form2Example11" class="form-control" placeholder="Cth. Moch" value="{{ old('firstName')}}" />
                                            <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Nama Belakang</label>
                                            <input type="text" pattern="[a-zA-Z][a-zA-Z ]{2,}" name="lastName" id="form2Example11" class="form-control" placeholder="Cth. Surya" value="{{ old('lastName')}}" />
                                            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Tanggal Lahir</label>
                                            <input type="date" name="birthdate" id="form2Example11" class="form-control" placeholder="" value="{{ old('birthdate')}}" />
                                            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="form2Example11">Jenis kelamin</label>
                                        <select class="form-select" name="category" aria-label="Category select">
                                            <option value="" selected>Jenis Kelamin</option>
                                            <option value=""> Laki-Laki</option>
                                            <option value=""> Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Email</label>
                                            <input type="email" name="email" id="form2Example11" class="form-control" placeholder="Cth. surya@example.com" value="{{ old('email')}}" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="form2Example11">Phone/Whatsapp</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default" style="background-color: #EF0003; color :#fff">+62</span>
                                            <input type="number" name="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" maxlength="11" value="{{ old('phone')}}">
                                        </div>
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Password</label>
                                            <input type="password" name="password" id="form2Example11" class="form-control" placeholder="Tulis kata sandi" required />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Konfirmasi
                                                Passsword</label>
                                            <input type="password" name="password_confirmation" id="form2Example11" class="form-control" placeholder=" Konfirmasi kata sandi" required />
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check form-check-info text-start">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Saya menyetujui <a href="javascript:;" class="text-dark font-weight-bolder">Syarat dan ketentuan</a>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <input type="hidden" name="role" value="user">
                                    <button type="submit" class="btn w-100 my-4 mb-2" style="background-color: #EF0003; color:#fff  ">Daftar Sekarang</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Masuk</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script>
        let prevScrollpos = window.pageYOffset;

        window.onscroll = function() {
            let currentScrollPos = window.pageYOffset;
            let navbar = document.getElementById("navbar-register");

            if (prevScrollpos > currentScrollPos) {
                navbar.classList.remove("navbar-scrolled");
            } else {
                navbar.classList.add("navbar-scrolled");
            }

            prevScrollpos = currentScrollPos;
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>