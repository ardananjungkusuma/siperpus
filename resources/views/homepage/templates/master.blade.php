<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="SIPERPUS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/home/library.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/slicknav.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">
</head>

<body>
    @include('homepage.templates.header')

    @yield('content')

    @include('homepage.templates.footer')
    <!-- link that opens popup -->
    <!-- JS here -->
    <script src="{{ asset('assets/home/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/home/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/scrollIt.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/home/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/slick.min.js') }}"></script>


    <script src="{{ asset('assets/home/js/main.js') }}"></script>
</body>

</html>