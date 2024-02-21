<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @yield('meta')
    @livewireStyles
    @livewireScripts
    <!-- Favicons -->
	<link href="{{ asset('assets/favicon.png') }}" rel="icon">
	<link href="{{ asset('assets/favicon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <script src="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet-gesture-handling"></script>
    <script src="{{ asset('js/provinsi.js') }}"  ></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/betterWMS.js') }}"  ></script>



</head>

<body class="font-sans selection-bg">

    @yield('content')
    <script src="{{ asset('dist/PruneCluster.js') }}"></script>
    @stack('scripts')
</body>
</html>
