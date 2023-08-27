<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('assetsEnduser/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('assetsEnduser/images/icon.png')}}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assetsEnduser/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetsEnduser/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('assetsEnduser/css/style.css')}}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{asset('assetsEnduser/css/custom.css')}}">

    <!-- Modernizer js -->
    <script src="{{asset('assetsEnduser/js/vendor/modernizr-3.5.0.min.js')}}"></script>



</head>
<body>
    <div id="app">
        <div class="wrapper" id="wrapper">
            @include('partials.enduser.header')
            <main>
                @yield('content')
            </main>
            @include('partials.enduser.footer')
        </div>
    </div>

    @include('sweetalert::alert')
    <!-- JS Files -->
    <script src="{{asset('assetsEnduser/js/vendor/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assetsEnduser/js/popper.min.js')}}"></script>
    <script src="{{asset('assetsEnduser/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assetsEnduser/js/plugins.js')}}"></script>
    <script src="{{asset('assetsEnduser/js/active.js')}}"></script>

{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</body>

