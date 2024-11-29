@extends('layouts.app')

@section('titulo')
    Registrate en DeVstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('registro');}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label 
                        for="name" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                         Nombre
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value={{old('name')}}
                    />
                    @error('name')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div> 

                 
        
                <div class="mb-5">
                    <label 
                        for ="username" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                         Usuario
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username"
                        placeholder="Aqui su Nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value={{old('username')}}
                    />
                </div>
                @error('username')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                <div class="mb-5">
                    <label 
                        for ="email" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                         Correo
                    </label>
                    <input 
                        type="text" 
                        name="email" 
                        id="email"
                        placeholder="Aqui su Correo"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value={{old('email')}}
                    />
                </div>
                @error('email')
                <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
            @enderror
                <div class="mb-5">
                    <label 
                        for ="password" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                         Contraseña
                    </label>
                    <input 
                        type="text" 
                        name="password" 
                        id="password"
                        placeholder="Aqui su Contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                </div> 
                @error('password')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror

                <div class="mb-5">
                    <label 
                        for ="password_confirmation" 
                        class="mb-2 block uppercase text-gray-500 font-bold">
                         Repetir Contraseña
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation"
                        placeholder="Repita aqui su Contraseña"
                        class="border p-3 w-full rounded-lg"
                    />
                </div> 

                <input 
                type="submit"
                value="Crear Cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                     
            </form>
            
        </div>

        <div class="md:w-6/12">
            <img src="{{asset('img/registrar.jpg')}}" alt="Imagen Registro de Usuario">
        </div>

    </div>
@endsection