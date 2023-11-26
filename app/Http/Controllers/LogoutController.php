<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LogoutController extends Controller
{
    public function store()
    {
        // Helper de auth tiene el metodo logout para cerrar la secion
        auth()->logout();
        return redirect()->route('login');
    }
}
