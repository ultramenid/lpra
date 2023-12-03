<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/fa5to5aij0r418tqooxyrmncb8eapldn87crb04im234j80z/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @vite('resources/css/app.css')
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/dark.js') }}"></script>

    @livewireScripts

</head>

<body class="font-backend selection-bg dark:selection-bg bg-gray-100 dark:bg-newgray-900">

    @yield('content')
    @stack('scripts')

</body>
</html>
