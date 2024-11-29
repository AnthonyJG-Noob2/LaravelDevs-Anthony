<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
   public function index() 
   {
        return view('auth.register');
    }

    public function store(Request $request) 
   {

    $request->request->add(['username' => Str::slug($request->username)]);    
       //dd($request);
       //dd($request->get('name'));

       // Validate the incoming request
        $request->validate([
        'name' => 'required|min:2',
        'username' => 'required|unique:users|min:3|max:20',
        'email' => 'required|unique:users|email|max:60',
        'password' => 'required|confirmed|max:20'
    ]);

    User::create([
        'name'=>$request->name,
        'username'=> $request->username,
        'email'=>$request->email,
        'password'=>$request->password,
    ]);

    Auth::attempt([
        'email' => $request->email, 
        'password' => $request->password]);

    return redirect()->route('posts.index');
    }
}
