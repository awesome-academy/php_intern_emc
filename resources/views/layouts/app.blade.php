<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Link FontAwesome -->
    <script src="https://kit.fontawesome.com/a5910b1756.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito&family=Anton"" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/home.css') }}" rel="stylesheet">
    <link href="{{ mix('css/products.css') }}" rel="stylesheet">
    <link href="{{ mix('css/cart.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        @include('components.menu')

        @yield('header')

        <main class="py-4">
            @yield('content')
        </main>

        @yield('scroll')
    </div>

    <script src="{{ mix('js/logout.js') }}"></script>
    <script src="{{ mix('js/scroll.js') }}"></script>

</body>
</html>
