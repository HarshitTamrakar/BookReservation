<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="container-fluid">
        @if (Route::has('login'))
        <div class="text-right">
            @auth
            <a href="{{ url('/home') }}" class="btn btn-lg btn-primary right-0 m-2">{{Auth::user()->name}}</a>
            @else
            <a href="{{ route('login') }}" class="btn btn-lg btn-success right-0 m-2">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-lg btn-primary right-0 m-2">Register</a>
            @endif
            @endif
        </div>
        @endif
        <div class="text-center">
            <h2>{{env('APP_NAME')}}</h2>
        </div>
    </div>
</body>

</html>