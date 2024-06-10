<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Login | ToySpace
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
        .password-container {
            position: relative;
            /* width: fit-content; */
        }

        .password-container input {
            padding-right: 30px;
            /* space for the eye icon */
        }

        .password-container .fa-eye {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            font-size: 20px;
            color: #aaa;
        }
    </style>
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                {{-- <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{route ('login')}}">
                <!-- Argon Dashboard 2 -->
                <img src="{{asset ('admin/assets/img/logo (1).png')}}" alt="">
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
                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
                                <!-- <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i> -->
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link me-2" href="../pages/profile.html">
                                <!-- <i class="fa fa-user opacity-6 text-dark me-1"></i> -->
                                Product
                            </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link me-2" href="../pages/sign-up.html">
                                <!-- <i class="fas fa-user-circle opacity-6 text-dark me-1"></i> -->
                                Category
                            </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link me-2" href="../pages/sign-in.html">
                                <!-- <i class="fas fa-key opacity-6 text-dark me-1"></i> -->
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="../pages/sign-in.html">
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
            </nav> --}}
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto mt-7">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start px-0">
                                    <h4 class="font-weight-bolder">Masuk</h4>
                                    <p class="mb-0">Masukkan email dan kata sandi anda untuk melanjutkan</p>
                                </div>
                                <div class="card-body px-0">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" id="email" for="email" name="email"
                                                class="form-control form-control-lg" placeholder="Email"
                                                aria-label="Email" required autofocus autocomplete="username">
                                        </div>
                                        <div class="mb-3">
                                            <div class="password-container">
                                                <input for="password" id="password"
                                                    class="form-control form-control-lg" placeholder="Password"
                                                    aria-label="Password" type="password" name="password" required
                                                    autocomplete="current-password">
                                                <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                            </div>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="remember_me"
                                                name="remember">
                                            <label class="form-check-label" for="remember_me">Ingat akun saya</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-lg w-100 mt-4 mb-0"
                                                style="background-color: #EF0003; color: #fff;">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-1 text-sm mx-auto">
                                        <a href="{{ route('password.request') }}" class="font-weight-bold"
                                            style="color: #EF0003">
                                            Lupa kata sandi?</a>
                                    </p>
                                    <p class="mb-4 text-sm mx-auto">
                                        Belum punya akun ?
                                        <a href="{{ route('register') }}" class="font-weight-bold"
                                            style="color: #EF0003">Daftar Sekarang</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('{{ asset('admin/assets/img/login-bg.png') }}');
          background-size: cover;">
                                <!-- <span class="mask bg-gradient-primary opacity-3"></span> -->
                                <span class="mask login-bg"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">“Your ultimate toy
                                    stop”</h4>
                                <p class="text-white position-relative">The more seamless the toy store experience
                                    appears, the greater the effort invested by its creators behind the scenes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
        document.getElementById('togglePassword').addEventListener('click', function(e) {
            // toggle the type attribute
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // toggle the eye icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>
