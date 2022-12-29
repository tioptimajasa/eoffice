<!doctype html>
<html lang="en">
<head>
    <title>e-office</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/web/images/icon.png') }}" />
    <!-- bootstrap -->
    <link href="{{ asset('assets/web/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font awesome -->
    <link href="{{ asset('assets/web/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- ionicons icon -->
    <link href="{{ asset('assets/web/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- mega menu -->
    <link href="{{ asset('assets/web/css/mega-menu/mega_menu.css') }}" rel="stylesheet" type="text/css" />
    <!-- owl-carousel -->
    <link href="{{ asset('assets/web/css/owl-carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <!-- magnific popup -->
    <link href="{{ asset('assets/web/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
    <!-- animate -->
    <link href="{{ asset('assets/web/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- media element player -->
    <link href="{{ asset('assets/web/css/mediaelementplayer.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- REVOLUTION STYLE SHEETS -->
    <link href="{{ asset('assets/web/revolution/css/settings.css') }}" rel="stylesheet" type="text/css">
    <!-- ADD-ONS CSS FILES -->
    <link href="{{ asset('assets/web/revolution/css/revolution.addon.particles.css') }}" rel="stylesheet" type="text/css">
    <!-- shortcodes -->
    <link href="{{ asset('assets/web/css/shortcodes.css') }}" rel="stylesheet" type="text/css" />
    <!-- main style -->
    <link href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- shop -->
    <link href="{{ asset('assets/web/css/shop.css') }}" rel="stylesheet" type="text/css" />
    <!-- responsive -->
    <link href="{{ asset('assets/web/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom -->
    <link href="{{ asset('assets/web/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/custom-css.css') }}">

</head>
<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    @include('web.topmenu')
    @yield('content')
    @include('web.footer')
    @include('web.script')
</body>
</html>
