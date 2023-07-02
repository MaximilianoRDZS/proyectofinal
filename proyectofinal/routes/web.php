<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
    return view('auth.login');
});

//Ruta para mostrar vista "register"
Route::get('/register', [RegisterController::class,'index'])->name('register');
//Ruta para registrar un usuario en la base de datos
Route::post('/register', [RegisterController::class,'store'])->name('crear-usuario');

//Ruta para vista del "login"
Route::get('/login',[LoginController::class, 'index'])->name('login');
//Ruta para la validar las credenciales del usuario
Route::post('/login', [LoginController::class, 'store']);

//Ruta para mostrar el dashboard
Route::get('/dashboard',function(){
    return view('dashboard');
} );
