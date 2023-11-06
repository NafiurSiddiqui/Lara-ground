<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

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

    public function create()
    {

        
        return view('posts.create');
    }

    public function store()
    {
        // dd(request()->all());

        // //Playing around with filesystem
        // // dd(request()->file('thumbnail'));
        // //let's store the image insid the directory called thumbnails
        // $path = request()->file('thumbnail')->store('thumbnails');
        // return 'Done ' . $path;
        
        //validate input

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => ['required', 'image'],
            'category_id'=>['required', Rule::exists('categories', 'id')],
        ]);

        //associate user_id to this post

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');//NOTE we store the filepath not the actual file itself

        //store
        Post::create($attributes);

        //return
        return redirect('/');
    }


}


/**
 * A general rule of thumb
 * Try always stick to the 7 restFul Actions, such as -
 *
 * index => show all of the resource,
 * show => show one resource,
 * create => show a page to create a new item,
 * store => when the form is submitted, persist the item
 * edit => show a page to edit the item,
 * update => when the edit form is submitted, updated the item,
 * destroy => An input to destroy the item,
 *
 * Other than this, if something is kind of pointing to the controller that does not fit the 7 restful actions, probably it is better to create a new controller for that, than modifying names like 'storeComment'.
 *
 * NOTICE: our methods names here fits the restful actions category.
 */
