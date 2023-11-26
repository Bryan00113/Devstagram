<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- El yield nos permite mandar a llamar al titulo mas adelante --}}
    <title>Devstagram - @yield('titulo')</title>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header>

        <div class="border-bottom row">
            <h1 class="col-md-6  container fw-bold">Devstagram</h1>
            {{-- Si existe un usuario autentificado entonces imprime un mensaje --}}
            @auth
                <nav class="col-md-6 navbar-nav d-flex gap-3 flex-md-row  align-self-center justify-content-end ">
                    <a class="  text-decoration-none  text-dark" href="">Hola:
                        <span>{{ auth()->user()->username }}</span></a>
                    {{-- Aqui estamos conectandolo con el logout osea ya iniciamos secion al precionar Cerrar sesion nos manda a llamar la controladora logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class=" me-2 text-decoration-none text-dark">Cerrar sesión</button>
                    </form>
                </nav>
            @endauth
            @guest
                <nav class="col-md-6 navbar-nav d-flex gap-3 flex-md-row  align-self-center justify-content-end ">
                    <a class="  text-decoration-none  text-dark" href="">Login</a>
                    {{-- Aqui estamos conectandolo con register que definimos en wep --}}
                    <a class=" me-2 text-decoration-none text-dark" href="{{ route('register') }}">Crear
                        Cuenta</a>
                </nav>

            @endguest


        </div>
    </header>
    <main>

        <h2 class="container-xl ms-1">
            {{-- Aqui estamos llamando los section titulo y contenido de register.blade --}}
            @yield('titulo')
        </h2>
        <div class="ms-3">

            @yield('contenido')
        </div>
    </main>

    <footer class="ms-3">
        Devstagram - todos los derechos reservados
        {{ now()->year }}
    </footer>

</body>

</html>
