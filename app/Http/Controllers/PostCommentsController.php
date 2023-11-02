<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        //add a comment to the given post
    }
}

/**
 * NOTICE - how we stuck to our restful action naming convention and methods?
 *
 */
