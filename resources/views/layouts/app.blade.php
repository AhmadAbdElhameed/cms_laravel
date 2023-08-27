<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

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
    <!-- the fileinput plugin styling CSS file -->
{{--    <link href="{{asset('assetsEnduser/js/bootstrap-fileinput/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />--}}
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    @yield('style')

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



    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/plugins/buffer.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/plugins/filetype.min.js" type="text/javascript"></script>

    <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/plugins/piexif.min.js" type="text/javascript"></script>

    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/plugins/sortable.min.js" type="text/javascript"></script>

    <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/fileinput.min.js"></script>

    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`). Uncomment if needed. -->
    <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/themes/fas/theme.min.js"></script -->

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.2/js/locales/LANG.js"></script>
    @yield('scripts')
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</body>

