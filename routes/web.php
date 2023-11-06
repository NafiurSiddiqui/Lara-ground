<?php

use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

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
Route::post('/newsletter', function () {

    //validate input field

    request()->validate([
        'email' => ['required','email']
    ]);
   
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us20'
    ]);

    // $response = $mailchimp->ping->get();
    // $response = $mailchimp->lists->getAllLists();
    // $response = $mailchimp->lists->getListMembersInfo('c20f296763');
    $response = $mailchimp->lists->addListMember('c20f296763', [
        'email_address' => request('email'),
        'status' => 'subscribed'
    ]);
    // dd($response);

    // $response = $mailchimp->addListMember()

    return redirect('/')->with('success', 'You are now signed up for our newsletter!');

});
