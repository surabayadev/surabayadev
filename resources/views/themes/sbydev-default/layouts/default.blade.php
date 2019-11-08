<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ str_finish(@$title ?: 'Page', ' - ') }} {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link href="{{ theme_asset('css/sbydev.css') }}" rel="stylesheet">
    <link href="{{ theme_asset('css/style.css') }}" rel="stylesheet">

    @yield('head')
</head>
<body>
    @include('theme::partials.navbar')

    @yield('content')

    @include('theme::partials.footer')

    <script src="{{ theme_asset('js/app.js') }}"></script>

    @yield('foot')
</body>
</html>