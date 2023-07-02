<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Para ir al login
    public function index()
    {
        # Vista de login de usuarios
        return view('auth.login');
    }

    //Metodo de validaión de formulario de login
    public function store(Request $request){

        //Reglas de validacion
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);

        //Validacion de credenciales incorrectas
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            //Utilizar directiva "with" para llenar los valores de la sesión
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
        //Credenciales correctas
        return redirect()->route('/dashboard');
    }
}

