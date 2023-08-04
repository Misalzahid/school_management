<!DOCTYPE html>
<html lang="en">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <title>Shoes-Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet') }}">

    <!'-- Animate.css -->
        <link rel="stylesheet" href="{{ asset('public/css/animate.css') }}">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{ asset('public/css/icomoon.css') }}">
        <!-- Ion Icon Fonts-->
        <link rel="stylesheet" href="{{ asset('public/css/ionicons.min.css') }}">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">

        <!-- Magnific Popup -->
        <link rel="stylesheet" href="{{ asset('public/css/magnific-popup.css') }}">

        <!-- Flexslider  -->
        <link rel="stylesheet" href="{{ asset('public/css/flexslider.css') }}">

        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css') }}">

        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset('public/css/bootstrap-datepicker.css') }}">
        <!-- Flaticons  -->
        <link rel="stylesheet" href="{{ asset('public/fonts/flaticon/font/flaticon.css') }}">

        <!-- Theme style  -->
        <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">

</head>

<body>
    <div class="loader"></div>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('frontend.common.header')
            @yield('content')
            @include('frontend.common.footer')
        </div>
    </div>
    {{-- <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
</div> --}}

    <!-- jQuery -->
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <!-- popper -->
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <!-- bootstrap 4.1 -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <!-- jQuery easing -->
    <script src="{{ asset('public/js/jquery.easing.1.3.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('public/js/jquery.waypoints.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('public/js/jquery.flexslider-min.js') }}"></script>
    <!-- Owl carousel -->
    <script src="{{ asset('public/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('public/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/js/magnific-popup-options.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('public/js/bootstrap-datepicker.js') }}"></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('public/js/jquery.stellar.min.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('public/js/main.js') }}"></script>
    <!-- If using a CDN -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    @yield('css')
    @yield('js')
</body>

</html>
