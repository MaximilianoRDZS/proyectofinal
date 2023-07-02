@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
    
        <!-- Tailwind -->
        @vite('resources/css/app.css')
        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    
            .font-family-karla {
                font-family: karla;
            }
        </style>
    </head>
    <body class="bg-white font-family-karla h-screen">
    
        <div class="w-full flex flex-wrap">
    
            <!-- Sección de iniciar sesión -->
            <div class="w-full md:w-1/2 flex flex-col">
                
                <!-- Logo -->
                <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                    <a href="#" class="bg-black text-white font-bold text-xl p-4">Logo</a>
                </div>
                
                <!-- Formulario de incio de sesión -->
                <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                    <p class="text-center text-3xl">Bienvenido.</p>
                    <form action="{{route('login')}}" method="POST" class="flex flex-col pt-3 md:pt-8" novalidate>
                        @csrf
                        @if(session('mensaje'))
                            <p class="bg-red-500 text-white my-2 rounded-lg p-2 text-center">
                                {{session('mensaje')}}
                            </p>
                        @endif
                        <!-- Campo email del usuario -->
                        <div class="flex flex-col pt-4">
                            <label for="email" class="text-lg">Email </label>
                            <input type="email" id="email" name="email" placeholder="your@email.com" class="shadow border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                            value="{{old('email')}}">
                            
                            <!--Mostrar directiva de mensaje obligatorio-->
                            @error('email')
                                <p class="bg-red-500 text-white my-2 rouded-lg text-sm p-2 text-center">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Campo contraseña del usuario -->
                        <div class="flex flex-col pt-4">
                            <label for="password" class="text-lg">Contraseña </label>
                            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" class="shadow border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                            value="{{old('password')}}">

                            <!--Mostrar directiva de mensaje obligatorio-->
                            @error('password')
                                <p class="bg-red-500 text-white my-2 rouded-lg text-sm p-2 text-center">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <!-- Boton para hacer submit del formulario -->
                        <input type="submit" value="Iniciar sesión" class="cursor-pointer uppercase bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                    </form>

                    <!-- Enlace para ir a la vista register -->
                    <div class="text-center pt-12 pb-12">
                        <p>No tienes cuenta? <a href="{{route('register')}}" class="underline font-semibold">Registrate aquí.</a></p>
                    </div>
                </div>
    
            </div>
    
            <!-- Image Section -->
            <div class="w-1/2 shadow-2xl">
                <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0" alt="Imagen de fondo">
            </div>
        </div>
    
    </body>
    </html>
