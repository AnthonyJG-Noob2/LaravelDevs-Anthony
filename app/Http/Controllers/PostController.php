<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
        
    }

    public function index(User $user)
    {
    $posts = Post::where('user_id', $user->id)->latest()->paginate(8);
        return view('dashboard', [
            'user'=>$user,
            'posts'=>$posts
        ]);
    }

    public function create()
    {
       // dd('Creando....Creando....');
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen'=>'required'
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' =>$request->imagen,
            'user_id'=>Auth::user()->id
        ]);

        // request()->user()->posts()->create()([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' =>$request->imagen,
        //     'user_id'=>Auth::user()->id
        // ]);

        return redirect()->route('posts.index', Auth::user()->username);
    }

    public function show(User $user, Post $post)
    {
    
        return view('posts.show', [
            'post'=> $post,
            'user'=> $user
        ]);
    }

    public function destroy(Post $post)
    {
        //$this authorize('delete', $post);
        $post->delete();

    $imagen_path = public_path('uploads/' . $post->imagen);   
        
        if(File::exists($imagen_path)){
            unlink($imagen_path);
        }

        return redirect()->route('posts.index', Auth::user()->username);
    }
}
