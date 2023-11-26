@extends('layouts.app')

@section('titulo')
    <h3 class="text-center">

        tu cuenta
    </h3>
@endsection

@section('contenido')
    <div class="content d-flex justify-center">
        <div class="row">
            <div class="col-6">
                <img src="{{ asset('Imagenes/usuario.svg') }}" alt="imagen de usuario" />
            </div>
            <div class="col-6">
                <p>
                    {{ auth()->user()->username }}
                </p>
            </div>
        </div>
    </div>
@endsection
