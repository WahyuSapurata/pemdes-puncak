<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $module }} | {{ config('app.name') }}</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/fonts/flaticon.css') }}" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo-sinjai.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('logo-sinjai.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('logo-sinjai.png') }}" sizes="16x16">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>

<body>
    <div class="boxed_wrapper">

        @include('landing.layouts.header')

        @yield('content')

        <!--footer-->
        @include('landing.layouts.footer')
        <!--/End footer-->

        <!-- Scroll Top Button -->
        <button class="scroll-top tran3s color2_bg">
            <span class="fa fa-angle-up"></span>
        </button>
        <!-- pre loader  -->
        <div class="preloader"></div>

        <!-- jQuery js -->
        <script src="{{ asset('assets-landing/js/jquery.js') }}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('assets-landing/js/bootstrap.min.js') }}"></script>
        <!-- jQuery ui js -->
        <script src="{{ asset('assets-landing/js/jquery-ui.js') }}"></script>
        <!-- jQuery validation -->
        <script src="{{ asset('assets-landing/js/jquery.validate.min.js') }}"></script>
        <!-- mixit up -->
        <script src="{{ asset('assets-landing/js/wow.js') }}"></script>
        <script src="{{ asset('assets-landing/js/jquery.mixitup.min.js') }}"></script>
        <script src="{{ asset('assets-landing/js/jquery.fitvids.js') }}"></script>
        <script src="{{ asset('assets-landing/js/bootstrap-select.min.js') }}"></script>
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- fancy box -->
        <script src="{{ asset('assets-landing/js/jquery.fancybox.pack.js') }}"></script>
        <script src="{{ asset('assets-landing/js/jquery.polyglot.language.switcher.js') }}"></script>
        <script src="{{ asset('assets-landing/js/nouislider.js') }}"></script>
        <script src="{{ asset('assets-landing/js/jquery.bootstrap-touchspin.js') }}"></script>
        <script src="{{ asset('assets-landing/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('assets-landing/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets-landing/js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('assets-landing/js/isotope.js') }}"></script>
        <script src="{{ asset('assets-landing/js/validation.js') }}"></script>
        <script src="{{ asset('assets-landing/js/custom.js') }}"></script>

        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @stack('scripts')

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif
    </div>

</body>

</html>
