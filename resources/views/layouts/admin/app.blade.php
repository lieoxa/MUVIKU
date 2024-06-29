<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>@yield('title')</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin') }}/dist/images/logos/logo-muviku.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!-- Owl Carousel  -->

    <style>
        * {
            font-family: 'Ubuntu';
        }

        .preloader img {
            position: absolute;
            width: 62px;
            top: 40%;
            left: -1%;
            height: 70px;
            animation: rotateZoom 3s infinite alternate;
        }

        @keyframes rotateZoom {
            0% {
                transform: scale(1) rotate(0deg);
                /* Tidak ada zoom dan rotasi */
            }

            50% {
                transform: scale(1.5) rotate(360deg);
                /* Zoom in dan rotasi setengah putaran */
            }

            100% {
                transform: scale(1.5) rotate(360deg);
                /* Kembali ke posisi awal tanpa zoom dan rotasi */
            }
        }
    </style>

    <link rel="stylesheet" href="{{ asset('admin') }}/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">

    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('admin') }}/dist/css/style.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
    <script src="//unpkg.com/alpinejs" defer></script>
    @yield('styles')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader card">
        <img src="{{ asset('admin') }}/dist/images/logos/logo-muviku.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader card">
        <img src="{{ asset('admin') }}/dist/images/logos/logo-muviku.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.admin.sidebar')
        <div class="body-wrapper">
            @include('layouts.admin.header')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('admin') }}/dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--  core files -->
    <script src="{{ asset('admin') }}/dist/js/app.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/app.init.js"></script>
    <script src="{{ asset('admin') }}/dist/js/app-style-switcher.js"></script>
    <script src="{{ asset('admin') }}/dist/js/sidebarmenu.js"></script>
    <script src="{{ asset('admin') }}/dist/js/custom.js"></script>
    <!--  current page js files -->
    <script src="{{ asset('admin') }}/dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="{{ asset('admin') }}/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('admin') }}/dist/js/dashboard.js"></script>
    @stack('scripts')
</body>

</html>
