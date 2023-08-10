<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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


Route::get('/posts', function () {
    

    $files = File::files(resource_path('posts'));
    // ddd($posts);
    // ddd($document);
    
    //map over the document and get title, slug, excerpt, data and body
    $posts = array_map(function ($file) {

        
        $document = YamlFrontMatter::parseFile($file);
        
        // ddd($document->matter('excerpt'));

        return new Post(
            $document->title,
            $document->slug,
            $document->excerpt,
            $document->date,
            $document->body(),
        );

    }, $files) ;

    ddd($posts);
    
    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('/posts/{post}', function ($slug) {

    //find a post by its slug and pass it to the view called "post"
    return view('post', [
        'post' => Post::find($slug)
    ]);
})->where('post', '[A-z_\-]+');
