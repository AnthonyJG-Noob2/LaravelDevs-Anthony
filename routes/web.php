<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegisterController;






Route::get('/crear-cuenta', [RegisterController::class,'index'])->name('registro');
Route::post('/crear-cuenta', [RegisterController::class,'store']);

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);
Route::post('/logout', [LogoutController::class,'store'])->name('logout');

Route::middleware('auth')->group(function() {

    Route::get('/',HomeController::class)->name('home');
    
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    

    Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

     /* Perfil */
    Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

});

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');
 route::post('/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');


 /* Likes */
 Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('posts.like.store');
 Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->name('posts.like.destroy');


 Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
 Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');
 