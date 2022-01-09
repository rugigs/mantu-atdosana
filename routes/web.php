<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home'); //parādīt visus sludinājumus

Route::get('posts/{post}',[PostController::class, 'show']);     //parādīt noteiktu sludinājumu
Route::get('post/create', [PostController::class, 'create'])->middleware('auth');   //izveidot jaunu sludinājumu
Route::post('posts', [PostController::class, 'store'])->middleware('auth');   //publicēt sludinājumu
Route::get('posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth');    //parāda sludinājuma rediģēšanas lapu
Route::patch('posts/{post}', [PostController::class, 'update'])->middleware('auth');    //saglabā rediģēto sludinājumu
Route::delete('posts/{post}', [PostController::class, 'destroy'])->middleware('auth');  //izdzēš


Route::get('users/{user}', [ProfileController::class, 'show']);     //parāda lietotāja sludinājumus un atsauksmes
Route::get('users/{user}/edit', [ProfileController::class, 'edit'])->middleware('auth');    //parāda lietoāja rediģēšanas lapu
Route::patch('users/{user}', [ProfileController::class, 'update'])->middleware('auth');     //saglabā veiktās izmaiņas lietotāja datos
Route::delete('users/{user}', [ProfileController::class, 'destroy'])->middleware('auth');    //izdzēš lietotāja kontu
Route::get('users', [ProfileController::class, 'index'])->middleware('admin');
Route::delete('admin/users/{user}', [ProfileController::class, 'destroyAdmin'])->middleware('admin');

Route::post('users/{user}/review', [ReviewController::class, 'store'])->middleware('auth'); ;     //saglabā izveidoto atsauksmi
Route::delete('reviews/{review}', [ReviewController::class, 'destroy'])->middleware('auth'); ;     //saglabā izveidoto atsauksmi

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');     //atgriež reģistrācijas lapu
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');     //izveido jaunu lietotāju

Route::get('login',[SessionsController::class, 'create'])->middleware('guest');     //atgriež pieslēgšanās lapu
Route::post('login',[SessionsController::class, 'store'])->middleware('guest');     //atļauj lietotājam pieslēgties
Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');   //izraksta lietotāju






