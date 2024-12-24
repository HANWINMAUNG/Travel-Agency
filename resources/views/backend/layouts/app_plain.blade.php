<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    <title>@yield('title')</title>
    <link href="{{ asset('backend/login/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/login/css/style.css') }}" rel="stylesheet">
    @stack('header')
</head>
<body>
    @yield('content')
    <script src="{{ asset('backend/login/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('backend/login/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/login/js/bootstrap.min.js') }}"></script>
    @stack('script')
</body>
</html>
