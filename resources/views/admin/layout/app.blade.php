<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div id="admin-app">
            <nav class="navbar navbar-expand-lg  px-4">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="/" class="text-success" style="text-decoration:none; margin-left: 35px;">{{ config('app.name', 'Laravel') }}</a>

                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarToggler">
                    <ul class="navbar-nav mx-4">
                        <li class="nav-item">
                            <a class="nav-link text-success fs-4" href="/category">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-success fs-4" href="/product">Productos</a>
                        </li>
                    </ul>
                    <form class="form-inline" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger my-2 my-sm-0" type="submit">Cerrar Sesión</button> <!-- Cambiado a btn-danger -->
                    </form>
                </div>
            </nav>
            <section class="container p-5">
                @yield('content')
            </section>
        </div>
    </body>
    @yield('scripts')
    
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                showToast('{{ session('success') }}', 'success');
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                showToast('{{ session('error') }}', 'error');
            });
        </script>
    @endif
</html>
