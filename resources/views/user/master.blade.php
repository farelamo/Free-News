<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @stack('title') -
        Free News
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">

    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    @stack('styles')
    <style>
        .top-ads {
            width: 750px;
            height: 100px;
            background-image: url('https://i0.wp.com/www.top-news.id/wp-content/uploads/2021/08/IKLAN-BANNER-A.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    @include('user.partials.header')

    <main>
        @yield('content')
    </main>

    @include('user.partials.footer')

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('/js/wow.min.js') }}"></script>
    <script src="{{ asset('/js/animated.headline.js') }}"></script>
    <script src="{{ asset('/js/jquery.magnific-popup.js') }}"></script>

    <!-- Breaking New Pluging -->
    <script src="{{ asset('/js/jquery.ticker.js') }}"></script>
    <script src="{{ asset('/js/site.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('/js/contact.js') }}"></script>
    <script src="{{ asset('/js/jquery.form.js') }}"></script>
    <script src="{{ asset('/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/mail-script.js') }}"></script>
    <script src="{{ asset('/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('/js/plugins.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>

    <script>
        let w = $("#weather");
        $.ajax({url: "http://api.openweathermap.org/data/2.5/weather?q=malang&units=metric&appid=2e1771d6989168058859fdd4b1b30d89"})
        .done((res)=>w.text(`${Math.floor(res.main.temp)}°C, ${res.weather[0].main} (${res.name})`))
        .fail(()=>w.text("error"));
    </script>

    @stack('scripts')
</body>

</html>