<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{trans('home.title')}}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">{{trans('home.home')}}</a>
            @else
                <a href="{{ route('login') }}">{{trans('home.login')}}</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{trans('home.register')}}</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>
        <div class="links">
        </div>
    </div>
</div>
</body>
</html>
