<?php


namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    
    public function __construct(
        public $title,
        public $slug,
        public $excerpt,
        public $date,
        public $body,
    ) {
       
    }
    public static function all()
    {
        //TIPS: you might wanna use service providers to bootstrap all of the following logic here. Doesn't make sense to put all of this inside a model.

        //with caching we won't be running this expensive operation each time for a request

        return cache()->rememberForever('posts.all', function () {
            //map over the document and get title, slug, excerpt, data and body
            return collect(File::files(resource_path('posts')))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($document) =>
                 new Post(
                     $document->title,
                     $document->slug,
                     $document->excerpt,
                     $document->date,
                     $document->body()
                 ))
                 ->sortByDesc('date') ;

        });
        
       
        // ddd($posts);
    


        
    }

    
    public static function find($slug)
    {
     
        //find a post by its slug and pass it to the view called "post"
        //There are GLOBAL VARIABLES that we can use to build up the path
        //some of them directly includes the folder name
        // app_path()
   
        //always check the error case
        // if(!file_exists(resource_path("/posts/{$slug}.html"))) {
       
        //     // return redirect('/'); ////Note that redirecting is the job of controller not here.

        //     throw new ModelNotFoundException();
        // }

        return static::all()->firstWhere('slug', $slug);


    }

    public static function findOrFail($slug)
    {
     
    
        $post = static::all()->firstWhere('slug', $slug);

        if(!$post) {
            throw new ModelNotFoundException();
        }
     

        return $post;

    }
}
