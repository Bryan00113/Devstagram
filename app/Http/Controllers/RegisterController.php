<?php

namespace App\Http\Controllers;

use App\Models\User;

//Es la clase request ya venia cuando la creamos 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// Hashshea los password osea oculta la informacion
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Routing\Route;

class RegisterController extends Controller
{
    // El index es por que es la url principal
    public function index()
    {
        //Cuando ingresas en crear cuenta aqui mandamos a llamr la vista
        return view('auth.register');
    }
    // Se utiliza store por ser un metodopost y creamos la variable request de la clase ya existente Request
    public function store(Request $request)
    {
        // Esta funcion lo que hace es imprimir lo que le asigne pero detiene la ejecucion total de laravellaravel
        // dd($request->get('name'));
        //Validaciones Aqui estan la validaciones sobre colocar los datos en el formulario Validate es un metodo de laravel vara validar datos
        $this->validate($request, [
            // El nombre debe de ser obligatorio y la cantidad de letras
            'name' => 'required|max:30',
            // El username debe ser unico y dirigido a una tabla users que laravel crea por defecto y verifica que sea unico
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:50',
            'password' => 'required|confirmed|min:6',
        ]);
        //  Es como utilizar un user into en la BD es necesario para crear un registro en este caso de user que acabamos de crear
        User::create([
            'name' => $request->name,
            // Lo comvierte en formato url ya que lo deja en minusculas y sin espacios solo los - 
            'username' => Str::slug($request->username),
            'email' => $request->email,
            // Encripta las contraseñas aunque en esta nueva version no hay que colocarselo
            'password' => Hash::make($request->password)
        ]);

        // Autentificar un usuario
        // objeto de autentificacion el attemp es un objeto booliano y si devuelve true lo manda a auth esta es una forma 
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);
        // Esta es otra
        auth()->attempt($request->only('email', 'password'));
        // Redireccionar
        //aqui nos manda a esta ruta que esta creada en wep 
        return redirect()->route('posts.index');
    }
}
