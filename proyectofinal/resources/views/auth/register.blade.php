@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar</title>

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

        <!-- Sección de Registrar -->
        <div class="w-full md:w-1/2 flex flex-col">

            <!-- Logo -->
            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
                <a href="#" class="bg-black text-white font-bold text-xl p-4" alt="Logo">Logo</a>
            </div>

            <!-- Formulario de regitro -->
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Registrate.</p>
                <form action="{{route('crear-usuario')}}" method="POST" class="flex flex-col pt-3 md:pt-8" novalidate>
                    @csrf
                    <!-- Campo nombre del usuario -->
                    <div class="flex flex-col pt-4">
                        <label for="name" class="text-lg">Nombre </label>
                        <input type="text" id="name" name="name" placeholder="Ingrese su nombre " class="shadow border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight" 
                        value="{{old('name')}}">
                        
                        <!--Mostrar directiva de mensaje obligatorio-->
                        @error('name')
                            <p class="bg-red-500 text-white my-2 rouded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Campo apellido del usuario -->
                    <div class="flex flex-col pt-4">
                        <label for="last_name" class="text-lg">Apellido </label>
                        <input type="text" id="last_name" name="last_name" placeholder="Ingrese su apellido" class="shadow border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight"
                        value="{{old('last_name')}}">
                        
                        <!--Mostrar directiva de mensaje obligatorio-->
                        @error('last_name')
                            <p class="bg-red-500 text-white my-2 rouded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>

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
                        
                        <!-- Mostrar directiva de mensaje obligatorio-->
                        @error('password')
                            <p class="bg-red-500 text-white my-2 rouded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Campo confirmar contraseña del usuario -->
                    <div class="flex flex-col pt-4">
                        <label for="password_confirmation" class="text-lg">Confirmar contraseña </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ingrese nuevamente su contraseña" class="shadow border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight" />
                    </div> 
                    
                    <!-- Boton para hacer submit del formulario -->
                    <input type="submit" value="Registrar" class="cursor-pointer uppercase bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8" />
                </form>

                <!-- Enlace para ir a la vista login -->
                <div class="text-center pt-12 pb-12">
                    <p>Ya tienes cuenta? <a href="{{route('login')}}" class="underline font-semibold">Inicia sesión aquí.</a></p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-full hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0" alt="Imagen de fondo" />
        </div>
    </div>

</body>
</html>
