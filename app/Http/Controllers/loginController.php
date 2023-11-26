<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {
        // Es la vista login.blade que ya tiene que estar creada 
        return view('auth.login');
    }
    public function store(Request $request)
    {



        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Aqui retornaremos un true o false lo iniciaremos como falso asi si es falso de volvera el mensaje que le estamos indicando aqui
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            // El mensaje se esta creando aqui el back es una manera de redirigirnos donde estabamos sin necesidad de una url en otras palabras palabras devuelvete a lapagina anterior con este mensaje
            return back()->with('mensaje', 'credenciales Incorrectas');
        }
        return redirect()->route('posts.index');
    }
}
