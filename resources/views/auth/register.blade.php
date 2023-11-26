{{-- Se conecta con aa.blade --}}
@extends('layouts.app')

@section('titulo')
@endsection

@section('contenido')
    <h2 class="text-center">
        Registrate en devstagram

    </h2>
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('imagenes/registrar.jpg') }}" alt="Imagen para registrarse">
        </div>


        <div class="col-md-6">
            {{--    Estamos accediendo al enlace crear-cuenta que ya posee un metodo --}}
            <form action="{{ route('register') }}"method="POST" novalidate>
                {{-- Es una funcion o metodo de laravel que nos protege con un input hidden  --}}
                @csrf
                <div class="mb-5">
                    <label for="name"class="">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Ingresa tu nombre"
                        {{-- Aqui guardmos el valor que ontroducimos en el input si despues nos marca un error y ya no tendriamos que volver a escribirlo --}} value={{ old('name') }}>
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username"class="">Nombre de usuario</label>
                    <input type="text" name="username" id="username" placeholder="Ingresa tu nombre de usuario"
                        value={{ old('username') }}>
                    @error('username')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
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
                <div class="mb-5">
                    <label for="password_confirmation"class="">Repetir Password</label>
                    {{-- Al colocarle password_confirmation el intuye que tiene que ser igual a password --}}
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        placeholder="Repiti tu contraseña">
                </div>
                <input type="submit" value="Crear Cuenta " class="">


            </form>
        </div>

    </div>
@endsection
