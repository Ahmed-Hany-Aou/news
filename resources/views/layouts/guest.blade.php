<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div>
            @yield('content')
        </div>

        <!-- Core JS -->
        <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('backend/assets/js/off-canvas.js') }}"></script>
        <script src="{{ asset('backend/assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
        <script src="{{ asset('backend/assets/js/settings.js') }}"></script>
        <script src="{{ asset('backend/assets/js/todolist.js') }}"></script>
    </body>
</html>
