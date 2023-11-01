<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// //both of these are required
// Route::get('register', [RegisterController::class, 'create']); //hits the register route
// Route::post('register', [RegisterController::class, 'store']); //controls the POST request


//STAGE:2
//we show this route only when someone is not signed in
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

/**
 * @Middleware - TLDR; a piece of logic runs whenever a new request comes in.
 *There are two type of middleware -
 *1) Global Middleware : Runs automatically every time for each and every HTTP call made to our application.
 *2) Local Middleware  : Only run if we attach it to a specific group or routes.
 */
