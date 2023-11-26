<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

//  t todo en este controlador tiene que estar protegido el usuario para poder publicar para dar me gusta  
class postController extends Controller
{

    //Es un construtor
    public function __construct()
    {
        // Lo protegemos con este metodo antes de que se ejecute el index se asegura que el usuario este autentificado
        $this->middleware('auth');
    }
    //Eato se muestra despues de visitar muro
    public function index(User $user)
    {

        return view('layouts.dashboard');
    }
}
