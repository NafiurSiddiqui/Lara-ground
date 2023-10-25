<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected function index()
    {


        //------- DUMPS the raw JSON result of the following result
        // return  Post::latest()->filter(
        //     request(['search', 'category', 'author'])
        // )->get();
        


        //if we tail the get() method here meaning " I am done building up the query, execute the SQL"
        // $post = Post::latest();

        
        //    $filters = $request->only(['search', 'category', 'authors']);
        //'posts.index - is just a common NAMESPACE Naming convention

        // $posts = Post::latest()->filter($filters)->get();

        return view('posts.index', [
            //we wrap the 'search' term in an array since our custom scopeFilter method expects
            //an array of filters. But, request['search'] returns string, hence we wrap it up with array.
            //----------- GENERAL FETCHING WITH FILTER

            // 'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->get() ,

            //--------------- FETCHING w/ FILTER and PAGINATION
            // 'posts' => Post::latest()->filter(
            //     request(['search', 'category', 'author'])
            // )
            //     ->paginate(6)
            //--------------- FETCHING w/ FILTER,PAGINATION and Query URL
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )
                ->paginate(6)->withQueryString()
                


        //            'posts' => $posts ,
        //            'categories' => Category::all(),
        //        👆 removed to its own component CategoryDropdown class inside VIEW for duplication
            //👇 This is how we passed a variable to highlight the active link
        //            'currentCategory'=> Category::firstWhere('slug', request('category'))
        //        REMOVED to CategoryDropdown since that is where it belongs
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }


}
