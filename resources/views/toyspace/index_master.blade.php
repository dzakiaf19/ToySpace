<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <link href="{{ asset ('toyspace/assets/img/apple-touch-icon.png') }}"
        rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset ('toyspace/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset ('toyspace/assets/vendor/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet"> -->
    <link href="{{ asset ('toyspace/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link href="{{ asset ('toyspace/assets/vendor/boxicons/css/boxicons.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset ('toyspace/assets/vendor/glightbox/css/glightbox.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset ('toyspace/assets/vendor/remixicon/remixicon.css') }}"
        rel="stylesheet">
    <link href="{{ asset ('toyspace/assets/vendor/swiper/swiper-bundle.min.css') }}"
        rel="stylesheet">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- slider detail kendaraan -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <!-- UNTUK SLIDER PRODUCT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- Template Main CSS File -->
    <link href="{{ asset ('toyspace/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    
    @include('toyspace.body.header')
    @include('sweetalert::alert')
    
    @yield('content')

    @include('toyspace.body.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset ('toyspace/assets/vendor/aos/aos.js') }}"></script>
    <script
        src="{{ asset ('toyspace/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset ('toyspace/assets/vendor/glightbox/js/glightbox.min.js') }}">
    </script>
    <script src="{{ asset ('toyspace/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}">
    </script>
    <script src="{{ asset ('toyspace/assets/vendor/swiper/swiper-bundle.min.js') }}">
    </script>
    <script src="{{ asset ('toyspace/assets/vendor/waypoints/noframework.waypoints.js') }}">
    </script>
    <script src="{{ asset ('toyspace/assets/vendor/php-email-form/validate.js') }}"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- js slider detail kendaraan -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  </script>

  <!-- Untuk slider gambar mobil -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!--  -->


    <!-- Template Main JS File -->
    <script src="{{ asset ('toyspace/assets/js/main.js') }}"></script>

</body>

</html>
