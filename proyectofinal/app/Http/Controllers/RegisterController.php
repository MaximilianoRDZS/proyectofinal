<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Metodo para retornar la vista register
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){    
        // Validar datos del formulario
        
        $this->validate($request,[
            //Pasamos las reglas de validacion de cada uno de los campos
            //Validamos "username", "email" como unico relacionados con la tabla "users", 
            //generada automaticamente con la instalacion de laravel
            'name'=>'required|min:3|max:20',
            'last_name'=>'required|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>''
        ]);
        //Insertar datos a la tabla de usuarios
         User::create([
            'name'=>$request->name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'password_confirmation'=>Hash::make($request->password_confirmation)
        ]);
        //Autenticar un usuario con el metodo "attempt" 

        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
         ]);

        //Redirecciondo
        return redirect()->route('login');
    }
}
