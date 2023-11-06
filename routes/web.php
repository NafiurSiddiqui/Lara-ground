<?php

use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentsController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);//MUST READ THE PostController Notes for explanation here.

/**
 * Never make long URL, keep it as short as possible.
 */





Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');


// mailchimp test

// Route::post('/newsletter', function (Newsletter $newsletter) {

//     //validate input field

//     request()->validate([
//         'email' => ['required','email']
//     ]);

//     try {

//         //we took the mailchimp config to its own class

//         //we instantiate the class here to use the service

//         // $newsletter = new Newsletter();

//         $newsletter->subscribe(request('email'));

//     } catch (\Exception $e) {

//         throw ValidationException::withMessages(
//             ['email' => 'Try a different email'],
//         );
//     }

//     return redirect('/')->with('success', 'You are now signed up for our newsletter!');

// });

// STAGE2
Route::post('/newsletter', NewsletterController::class); //single action based class
