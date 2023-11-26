<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});
// Aqui siempre se da el primer paso para conectar rutas. 1 creo la url Despues mando a llamar a la controladora Despues la controladora aplica una orden logica y despues la vista se comunica con este modelo 
// Crear cuenta es un enlace externo y el class es para poder utilizar ese controlador y el index es metodo que se quiere llamar y el que muestra una vista se llama index . En este caso hicimos una ruta cambiada con el name ->register es la mejor manera para acceder a ellas
Route::get('/register', [RegisterController::class, 'index'])->name('register');

//Esto es cuando nos registramos o ingresamos ddatos en el login nos manda a llamar el metodo store ya que estamos haciendo un post hacia esa url
Route::post('/register', [RegisterController::class, 'store']);
// cuando visitemos muro va a llamar a la controladora login y el metodo index es una manera estandarizada de decir que va a mostrar algo
Route::get('/login', [loginController::class, 'index'])->name('login');
// El metodo store es para almacenar informacion , No hace falta escribir el name ya que ya se ha declarado en el metodo anterior
Route::post('/login', [loginController::class, 'store']);
// Utilizamos el post porque utilizar el get en un request de base de datos es inseguro y el post nos brinda el @csrf
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
// Al ponerle llaves ya lo convierte en una variable Aqui estamos utilizando un rout model bandel al user.php como referencia y gracias a ello odemos hacer una busqueda por usuario
Route::get('/{user:username}', [postController::class, 'index'])->name('posts.index');
