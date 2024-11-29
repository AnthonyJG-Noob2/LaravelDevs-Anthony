@extends('layouts.app')

@section('titulo')
    Iniciar Sesion
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center">

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('login')}}" method="POST" novalidate>
                @csrf

                @if(session('mensaje'))
                 <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}</p>
                @endif

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
                     
                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label>Mantener mi sesion abierta</label>

                </div>

                <input 
                type="submit"
                value="Iniciar Sesion"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
            
        </div>

        <div class="md:w-6/12">
            <img src="{{asset('img/login.jpg')}}" alt="Imagen Registro de Usuario">
        </div>

    </div>
@endsection
