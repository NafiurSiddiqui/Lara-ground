<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            "posts" => Post::paginate(50)
        ]);
    }

    public function create()
    {

        
        return view('admin.posts.create');
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

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            //specify which post we are editing
            'post'=> $post
        ]);
    }

    public function update(Post $post)
    {
        
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => ['image'],
            'category_id'=>['required', Rule::exists('categories', 'id')],
        ]);

        //check if thumbnail is updated

        if(isset($attributes['thumbnail'])) {
         
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        }

        $post->update($attributes);

        return back()->with('success', 'Post updated!');

    }


    public function destroy(Post  $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted!');
    }

}


/**
 * This is a resourceful controller. A total CRUD
 *
 * NOTE:
 * we ignore($post->id) on UPDATE in order to override the rule we  have
 */
