<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <script>
        const Laravel = {
            csrf: "{{ csrf_token() }}",
            route: "{{ request()->route()->getName() }}"
        };
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.png" type="image/png">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="is-dark">
    <navbar guest="{{ auth()->guest() }}" @if(auth()->check()) username="{{ auth()->user()->name }}" @endif></navbar>

    <div class="container main">
        @section('main')
            <div class="columns">
                <div class="column">
                    @auth
                        <dashboard-menu></dashboard-menu>
                    @endauth
                </div>
                <div class="column is-three-fifths content-section">
                    <div class="section">
                        @section('content')

                        @show
                    </div>
                </div>
                <div class="column">

                </div>
            </div>
        @show
    </div>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>Linso</strong> by <a href="#">Demian Avtamonov</a>.
            </p>
        </div>
    </footer>
</div>
</body>
</html>
