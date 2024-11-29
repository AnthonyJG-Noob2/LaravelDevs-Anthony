<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        // return response()->json($input);

        $imagen = $request->file('file');

        $image_name = Str::uuid().".".$imagen->extension();

        $image_server = ImageManager::gd()->read($imagen);
        $image_server ->resize(1000,1000);

        $image_path = public_path('uploads').'/'. $image_name;
        $image_server->save($image_path);

        return response()->json(['image',$image_name]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
