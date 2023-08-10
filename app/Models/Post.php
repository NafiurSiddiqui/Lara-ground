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

    public static function find($slug)
    {
     
        //find a post by its slug and pass it to the view called "post"
        //There are GLOBAL VARIABLES that we can use to build up the path
        //some of them directly includes the folder name
        // app_path()
   
       
        //always check the error case
        if(!file_exists($path = resource_path("/posts/{$slug}.html"))) {
       
            // return redirect('/'); ////Note that redirecting is the job of controller not here.

            throw new ModelNotFoundException();
        }

        //with caching we won't be running this expensive operation each time for a request

        return cache()->remember("posts.{$slug}", 1200, fn () =>file_get_contents($path));



    }



    public static function all()
    {

        // $files = File::files(resource_path("posts/"));

     

        // return array_map(function ($file) {
        //     return $file->getContents();
        // }, $files);
        //get the files
        $files = File::files(resource_path('posts'));
        
        //map over the document and get title, slug, excerpt, data and body
        return collect($files)
        ->map(fn ($file) => YamlFrontMatter::parseFile($file))
        ->map(fn ($document) =>
             new Post(
                 $document->title,
                 $document->slug,
                 $document->excerpt,
                 $document->date,
                 $document->body()
             )) ;
        // ddd($posts);
    


        
    }
}
