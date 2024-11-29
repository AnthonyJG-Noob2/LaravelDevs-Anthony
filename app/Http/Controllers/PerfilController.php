<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;

class PerfilController extends Controller
{
    public function index()
    {
        return view('perfil.index');
    }

    public function store( Request $request){

        $request->request->add(['username' => Str::slug($request->username)]); 

        $request->validate([
            'username' => ['required','unique:users,username,'.Auth::user()->id, 'min:3','max:20', 
            'not_in:twitter,facebook'],
            'email' => ['required','unique:users,email,'.Auth::user()->id,'email', 'min:3','max:20', 
            'not_in:twitter,facebook'],
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');

            $image_name = Str::uuid().".".$imagen->extension();
            $image_server = ImageManager::gd()->read($imagen);
            $image_server ->resize(1000,1000);
    
            $image_path = public_path('profiles').'/'. $image_name;
            $image_server->save($image_path);

            // Guardar cambios
            $usuario = User::find(Auth::user()->id);
            $usuario->username = $request->username;
            $usuario->imagen= $image_name ?? Auth::user()->imagen ?? null;

            $usuario->save();

            //Redireccionar
            return redirect()->route('posts.index', $usuario->username);
        }
    }

}
