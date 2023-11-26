{{-- Se conecta con aa.blade --}}
@extends('layouts.app')

@section('titulo')
@endsection

@section('contenido')
    <h2 class="text-center">
        Iniciar sesión en devstagram
    </h2>
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('imagenes/login.jpg') }}" alt="Imagen login de usuario">
        </div>


        <div class="col-md-6">
            {{--  Estamos aaccediendo al  modelo que esta en web y colocamos su ruta que es login  --}}
            <form action="{{ route('login') }}"method="POST" novalidate>
                {{-- Es una funcion o metodo de laravel que nos protege con un input hidden  --}}
                @csrf
                {{-- En caso de que haya un mensaje vamos a imprimir ese mensaje cpmo parrafo con el @ podemos utilizaro como un contenedor --}}
                @if (session('mensaje'))
                    <p>{{ session('mensaje') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email"class="">Email</label>
                    <input type="email" name="email" placeholder="Ingresa tu email" value={{ old('email') }}>
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password"class="">Password</label>
                    <input type="password" name="password" placeholder="Ingresa tu contraseña">

                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="checkbox" name="remember" id=""><label for=""> Mantener mi sesión
                        abierta</label>
                </div>
                <input type="submit" value="Iniciar sesión " class="">


            </form>
        </div>

    </div>
@endsection
