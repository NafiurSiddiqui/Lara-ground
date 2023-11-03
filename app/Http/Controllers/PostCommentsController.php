<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        //check if the submitted data comes in
        // dd($post);
        // dd(request()->all());


        //validate the request
        request()->validate([
            'body' => ['required', 'min:3']
            ]);
          

        //add a comment to the given post
        // $comment = new Comment();
        // $comment->body = request('body');
        // $comment->user_id = auth()->id();
        // $post->comments()->save($comment);

        //alternative way of adding comments using mass assignment
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
            ]);

        return back();
    }
}

/**
 * NOTICE - how we stuck to our restful action naming convention and methods?
 *
 * ACTIONS:
 * Validate, Perform an action, Redirect
 */
