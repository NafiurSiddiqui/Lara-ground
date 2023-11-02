<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    protected function index()
    {


        return view('posts.index', [
            
          
            'posts' => Post::latest()->
                        filter(request(['search', 'category', 'author']))
                        ->paginate(3) ,


    
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }


}
