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


        return view('posts', [
            //we wrap the 'search' term in an array since our custom scopeFilter method expects
            //an array of filters. But, request['search'] returns string, hence we wrap it up with array.

            'posts' => EloquentPost::latest()->filter(request(['search']))->get() ,
            'categories' => Category::all()
        ]);
    }

    public function show(EloquentPost $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }


}
