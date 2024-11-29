@extends('layouts.app')

@section('titulo')
    Crea un Post Nuevo
@endsection

@section('contenido')

@push('styles')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center"> 
                @csrf        
            </form>
        </div>


        <div class="md:w-1/2 px-10 bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
                <form action="{{route('posts.store');}}" method="POST" novalidate>
                    @csrf
                    <div class="mb-5">
                        <label 
                            for="titulo" 
                            class="mb-2 block uppercase text-gray-500 font-bold">
                            Titulo
                        </label>
                        <input 
                            type="text" 
                            name="titulo" 
                            id="titulo"
                            placeholder="Titulo del Post"
                            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        />
                        @error('titulo')
                            <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div> 

                    <div class="mb-5">
                        <label 
                            for="descripcion" 
                            class="mb-2 block uppercase text-gray-500 font-bold">
                            Descripcion
                        </label>
                        <textarea
                            type="text" 
                            name="descripcion" 
                            id="descripcion"
                            placeholder="descripcion del Post"
                            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                            value=
                        >{{{old('descripcion')}}}</textarea>
                        @error('descripcion')
                            <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div> 

                    <div class="mb-5">
                        <input
                            name="imagen" 
                            type="hidden"
                        />
                        @error('imagen')
                            <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>

                    <input 
                    type="submit"
                    value="Crear Posts"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
        </div>

    </div>
@endsection