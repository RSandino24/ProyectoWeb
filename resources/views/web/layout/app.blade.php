<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div id="app">
            <div class="navbar">
                <a href="/" class="text-success" style="text-decoration:none; margin-left: 35px;">{{ config('app.name', 'Laravel') }}</a>
                <div>
                    <a href="{{ route('login') }}" class="text-success" style="text-decoration:none; font-size: 1.5em; margin-left: -85px;">login</a>
                    <!-- Puedes añadir más enlaces aquí -->
                </div>
            </div>

            <main class="container-fluid">
                @yield('content')
            </main>
        </div>
    </body>
    @yield('scripts')
</html>
