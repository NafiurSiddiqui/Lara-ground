<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {

    
    $path = __DIR__. "/../resources/posts/{$slug}.html";

    //always check the error case
    if(!file_exists($path)) {
        //die and dump
        // dd('File does not exist');
        //there is also ddd - DUMP, DIE, DEBUG
        // ddd('File Does not Exist');
        //abort(404)
        return redirect('/'); //to the homepage
    }

    $post = file_get_contents($path);


    return view('post', [
        'post' => $post
    ]);
});
