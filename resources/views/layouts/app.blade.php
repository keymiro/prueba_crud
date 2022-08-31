<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://kit.fontawesome.com/bbf6ac91e9.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: darkgrey">
    <div id="app">

@include('layouts.notify')
<main class="py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <a href="{{route('users.index')}}" class="btn btn-success my-2"> Inicio</a>
                        @yield('content')
                    </div>
                    <div class="card-footer text-center">
                        Derechos reservados
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
    </div>
</body>
</html>
