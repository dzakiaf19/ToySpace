<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>
        ToySpace | Admin
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('admin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="...">

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    <style>
        /* Gaya untuk dropdown */
        /* .dropdown-menu-sidenav {
            display: none;
            background-color: #fff;
            border-color: #5e72e4;
            border: 1px solid;
            border-radius: 6px;
            min-width: 100px;
            z-index: 1;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, opacity 0.3s ease;
            margin: 0 34px;
            font-size: 0.875rem;
        }

        .dropdown-menu-sidenav li {
            margin: 10px 0 10px 0;
        }

        .dropdown-menu-sidenav li:hover {
            color: #5e72e4;
        }

        .dropdown-menu-sidenav.show {
            display: block;
            opacity: 1;
            max-height: 200px;
        } */
        /* #dropBox {
            min-width: 400px;
            max-width: 75%;
            min-height: 300px;
            border: 3px dashed black;
            text-align: center;
            background: lightgrey;
            padding: 3em;
            margin: auto;
        }

        #dropBox.hover {
            border-color: darkslateblue;
            background: aliceblue;
        } */

        .add-image .button {
            display: inline-block;
            padding: 0 1em .5em 0;
            /* background: black; */
            cursor: pointer;
            /* border-radius: 5px; */
            /* border: 1px solid darkslateblue; */
            color: #344767;
            transition: .4s;
            width: 100%;
            height: 70px;
            /* margin-bottom: 40px; */
        }

        /* .add-image .button:hover {
            background: darkslateblue;
        } */

        .add-image #imgUpload {
            display: none;
        }

        .add-image #gallery {
            text-align: center;
            margin-top: 1.5em;
        }

        .add-image #gallery div {
            display: inline-block;
            margin: .5em 1em;
        }

        .add-image #gallery img {
            max-height: 100px;
        }

        .add-image #gallery .fName,
        .add-image #gallery .fSize {
            display: block;
        }

        .add-image #gallery .fName {
            color: brown;
        }

        .add-image #gallery .fSize {
            font-size: .8em;
        }

        .add-image #gallery .fType {
            font-size: .7em;
        }


        /* Untuk icon silang up image */
        /* CSS untuk icon close */
        .image-container {
            position: relative;
            display: inline-block;
            margin: 10px;
            overflow: hidden;
            position: relative;
        }

        .close-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border-radius: 100%;
            cursor: pointer;
            padding: 8px;
            line-height: 1;
            display: none;
            font-size: 24px;
        }

        .image-container:hover .close-icon {
            display: block;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 position-absolute w-100" style="background:#24263D;"></div>
    @include('admin.body.aside')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.body.header')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('content')
            @include('admin.body.footer')
        </div>
    </main>
    @include('sweetalert::alert')
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- UNTUK DRAG AND DROP MULTIPLE IMAGE -->
    <script>
        let dropBox = document.getElementById('dropBox');

        // modify all of the event types needed for the script so that the browser
        // doesn't open the image in the browser tab (default behavior)
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(evt => {
            dropBox.addEventListener(evt, prevDefault, false);
        });

        function prevDefault(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // remove and add the hover class, depending on whether something is being
        // actively dragged over the box area
        ['dragenter', 'dragover'].forEach(evt => {
            dropBox.addEventListener(evt, hover, false);
        });
        ['dragleave', 'drop'].forEach(evt => {
            dropBox.addEventListener(evt, unhover, false);
        });

        function hover(e) {
            dropBox.classList.add('hover');
        }

        function unhover(e) {
            dropBox.classList.remove('hover');
        }

        // the DataTransfer object holds the data being dragged. it's accessible
        // from the dataTransfer property of drag events. the files property has
        // a list of all the files being dragged. put it into the filesManager function
        dropBox.addEventListener('drop', mngDrop, false);

        function mngDrop(e) {
            let dataTrans = e.dataTransfer;
            let files = dataTrans.files;
            filesManager(files);
        }

        // use FormData browser API to create a set of key/value pairs representing
        // form fields and their values, to send using XMLHttpRequest.send() method.
        // Uses the same format a form would use with multipart/form-data encoding
        function upFile(file) {
            //only allow images to be dropped
            let imageType = /image.*/;
            if (file.type.match(imageType)) {
                let url = 'HTTP/HTTPS URL TO SEND THE DATA TO';
                // create a FormData object
                let formData = new FormData();
                // add a new value to an existing key inside a FormData object or add the
                // key if it doesn't exist. the filesManager function will loop through
                // each file and send it here to be added
                formData.append('file', file);

                // standard file upload fetch setup
                fetch(url, {
                        method: 'put',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(result => {
                        console.log('Success:', result);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                console.error("Only images are allowed!", file);
            }
        }


        // use the FileReader API to get the image data, create an img element, and add
        // it to the gallery div. The API is asynchronous so onloadend is used to get the
        // result of the API function
        function previewFile(file) {
            // only allow images to be dropped
            let imageType = /image.*/;
            if (file.type.match(imageType)) {
                let fReader = new FileReader();
                let gallery = document.getElementById('gallery');

                fReader.readAsDataURL(file);
                fReader.onloadend = function() {
                    let wrap = document.createElement('div');
                    wrap.classList.add('image-container');

                    let img = document.createElement('img');
                    img.src = fReader.result;

                    let closeIcon = document.createElement('span');
                    closeIcon.classList.add('close-icon');
                    closeIcon.innerHTML = '&times;';
                    closeIcon.addEventListener('click', function() {
                        gallery.removeChild(wrap);
                    });

                    let imgCapt = document.createElement('p');
                    let fSize = (file.size / 1000) + ' KB';
                    imgCapt.innerHTML =
                        `<span class="fName">${file.name}</span><span class="fSize">${fSize}</span><span class="fType">${file.type}</span>`;

                    wrap.appendChild(img);
                    wrap.appendChild(closeIcon);
                    wrap.appendChild(imgCapt);
                    gallery.appendChild(wrap);
                }
            } else {
                console.error("Only images are allowed!", file);
            }
        }

        function filesManager(files) {
            // spread the files array from the DataTransfer.files property into a new
            // files array here
            files = [...files];
            // send each element in the array to both the upFile and previewFile
            // functions
            files.forEach(upFile);
            files.forEach(previewFile);
        }
    </script>



    <!-- Untuk allert success -->
    <script>
        // Menunggu dokumen siap
        document.addEventListener("DOMContentLoaded", function() {
            // Menentukan waktu munculnya alert dalam milidetik (3000 ms = 3 detik)
            var alertTimeout = 3000;

            // Cari elemen alert
            var alertElement = document.getElementById('success-alert');

            // Jika elemen alert ditemukan
            if (alertElement) {
                // Atur timeout untuk menyembunyikan alert setelah waktu tertentu
                setTimeout(function() {
                    alertElement.style.display = 'none';
                }, alertTimeout);
            }
        });
    </script>

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            function handleDropdownClick(event) {
                const dropdownMenu = event.currentTarget.querySelector(".dropdown-menu-sidenav");

                if (dropdownMenu.classList.contains("show")) {
                    dropdownMenu.style.maxHeight = "0";
                    setTimeout(() => {
                        dropdownMenu.classList.remove("show");
                    }, 300);
                } else {
                    const allDropdowns = document.querySelectorAll(".dropdown-menu-sidenav");
                    allDropdowns.forEach(function(dropdown) {
                        dropdown.style.maxHeight = "0";
                        dropdown.classList.remove("show");
                    });

                    dropdownMenu.classList.add("show");
                    dropdownMenu.style.maxHeight = dropdownMenu.scrollHeight + "px";
                }

                event.stopPropagation();
            }

            const dropdowns = document.querySelectorAll(".nav-item");

            dropdowns.forEach(function(dropdown) {
                dropdown.addEventListener("click", handleDropdownClick);
            });

            document.addEventListener("click", function(event) {
                const dropdowns = document.querySelectorAll(".dropdown-menu-sidenav");
                dropdowns.forEach(function(dropdown) {
                    dropdown.style.maxHeight = "0";
                    setTimeout(() => {
                        dropdown.classList.remove("show");
                    }, 300);
                });
            });
        });
    </script> -->

    <script src="https://kit.fontawesome.com/your_kit_id.js" crossorigin="anonymous"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    @yield('scripts')
</body>

</html>
