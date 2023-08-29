<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\EloquentPost;
use Illuminate\Http\Request;

class EloquentPostController extends Controller
{
    protected function index()
    {
        //if we tail the get() method here meaning " I am done building up the query, execute the SQL"
//        $post = EloquentPost::latest();

        //'posts.index - is just a common NAMESPACE Naming convention
//        $filters = $request->only(['search', 'category', 'authors']);
//
//        $posts = EloquentPost::latest()->filter($filters)->get();

        return view('posts.index', [
            //we wrap the 'search' term in an array since our custom scopeFilter method expects
            //an array of filters. But, request['search'] returns string, hence we wrap it up with array.

            'posts' => EloquentPost::latest()->filter(request(['search', 'category', 'author']))->get() ,
//            'posts' => $posts ,
//            'categories' => Category::all(),
//        👆 removed to its own component CategoryDropdown class inside VIEW for duplication
            //👇 This is how we passed a variable to highlight the active link
//            'currentCategory'=> Category::firstWhere('slug', request('category'))
//        REMOVED to CategoryDropdown since that is where it belongs
        ]);
    }

    public function show(EloquentPost $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }


}
