@extends('layouts.app')

@section('titulo')
    Bienvenido a Devyogram
    
@endsection
        
@section('contenido')
    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
    <x-listar-post :posts="$posts" />

@endsection
