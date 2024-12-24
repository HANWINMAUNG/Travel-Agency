<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Travel Packages Management System</title>
    <link rel="shortcut icon" href="{{asset('frontend/assets/images/fav.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('frontend/assets/images/fav.jpg')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/plugins/slider/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/plugins/slider/css/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/swiper.min.css')}}" />
    @stack('header')
</head>
    <body>
            <div class="wrapper">
                    @include('frontend.layouts.header')
                    @yield('content')
                    @include('frontend.layouts.footer')
            </div>
            <script src="{{asset('frontend/assets/js/jquery-3.2.1.min.js')}}"></script>
            <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
            <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('frontend/assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
            <script src="{{asset('frontend/assets/plugins/slider/js/owl.carousel.min.js')}}"></script>
            <script src="{{asset('frontend/assets/js/script.js')}}"></script>
            <script src="{{asset('frontend/assets/js/swiper.min.js')}}"></script>
            
            @stack('script')

    </body>
</html>