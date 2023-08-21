<?php

use App\Models\Category;
use App\Models\EloquentPost;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

//------------------- First lecture

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/posts', function () {
//     return view('posts');
// });

// Route::get('/posts/{post}', function ($slug) {

//     //find a post by its slug and pass it to the view called "post"

//     $path = __DIR__. "/../resources/posts/{$slug}.html";

//     //always check the error case
//     if(!file_exists($path)) {
//         //die and dump
//         // dd('File does not exist');
//         //there is also ddd - DUMP, DIE, DEBUG
//         // ddd('File Does not Exist');
//         //abort(404)
//         return redirect('/'); //to the homepage
//     }

//     //with caching we won't be running this expensive operation each time for a request

//     $post = cache()->remember('posts.{slug}', now()->addMinutes(20), fn () => file_get_contents($path));

//     return view('post', [
//         'post' => $post
//     ]);
// })->where('post', '[A-z_\-]+'); //This is how you can put constraints otherwise the {slug} can be anything.



//--------- REFACTORING

Route::get('/', function () {
    return view('home');
});


// Route::get('/posts', function () {

//     return view('posts', [
//     'posts' => Post::all()
// ]);

// });

// ELOQUENT CLASS
// Route::get('/posts', function () {
//     return view('posts', [
//     'posts' => EloquentPost::all()
// ]);

// });


Route::get('/posts', function () {
    //the following logs for how many times we requested for the sql query.
    // DB::listen(function ($query) {
    //     logger($query->sql);
    // });
    //*It is better to use Clockwork for this debugging. You have it installed in your edge.
    
    return view('posts', [
    // 'posts' => EloquentPost::latest()->with('category', 'author')->get()
    //The args is passed to solve n + 1 problems.
    'posts' => EloquentPost::latest()->get(),
    'categories'=> Category::all()
]);

});
    

//SINGLE POST

// Route::get('/posts/{post}', function ($slug) {

//     //find a post by its slug and pass it to the view called "post"
//     return view('post', [
//         'post' => Post::findOrFail($slug)
//     ]);
// });


//for one post
Route::get('/posts/{post:slug}', function (EloquentPost $post) {
    //NOTE: {x} name has to be same as $x inside arg with a class passed this way.
    
    //find a post by its post and pass it to the view called "post"
    return view('post', [
        // 'post' => EloquentPost::findOrFail($id) //you can do this as well but remove EloquentPost type from the arg
        'post' => $post
    ]);
});


Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', [
        // 'posts' => $category->posts->load(['category', 'author'])
        //loading like this solves n + 1 problems. Without this we will again query for each post for each category, author, and so on.
        //if doing this everywhere does not make sense we can decalre it once in our Model class. Checkout EloquentPost's $with prop
        'posts' => $category->posts

    ]);
});

//NOTE: by default if you do not provide an additional slug, it will look for the id

Route::get('/authors/{author:username}', function (User $author) {

    return view('posts', [
        // 'posts' => $author->posts->load(['category', 'author'])
        'posts' => $author->posts
    ]);
});
