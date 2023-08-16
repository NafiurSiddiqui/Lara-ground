<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\EloquentPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        //*Running the following will drop the corresponding tables. Necessry if we need to drop the table first and then seed.
        // User::truncate();
        // Category::truncate();
        // EloquentPost::truncate();

        // $user = User::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $gaming = Category::create([
        //     "name" => "Gaming",
        //     "slug" => "gaming"
        // ]);

        // $it = Category::create([
        //     "name" => "IT",
        //     "slug" => "it"
        // ]);
        
        // $music = Category::create([
        //     "name" => "Music",
        //     "slug" => "music"
        // ]);

        // EloquentPost::create([
        //     "title"=> "The Last of Us Part II (2021)",
        //     "excerpt"=>"A game about a girl who is trying to save her family from an evil empire.",
        //     "body"=> "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, quo? Voluptatem doloremque
        //     </p>",
        //     "slug" => "the-last-of-us-part-ii",
        //     "user_id" => $user->id,
        //     "category_id"=>$gaming->id
        // ]);

        // EloquentPost::create([
        //     "title"=> "The Legendary Guitarist",
        //     "excerpt"=>"This song was written by <NAME>, and it has been called one of the greatest songs ever recorded in history, as well as",
        //     "body" => "<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi ducimus ipsa aspernatur? Obcaecati voluptate repudiandae distinctio deserunt dignissimos reiciendis qui!</p>  ",
        //     "slug" => "the-legendary-guitarist",
        //     "user_id" => $user->id,
        //     "category_id"=>$music->id
        // ]);
        
        // EloquentPost::create([
        //     "title"=> "Serverless sucks",
        //     "excerpt" => "<p>how serverless fucked up the .. </P>"            ,
        //     "body"=> "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, quo? Voluptatem doloremque
        //     </p>",
        //     "slug" => "serverless-sucs",
        //     "user_id" => $user->id,
        //     "category_id"=>$it->id
        // ]);

        //--------WITH FACTORY


        EloquentPost::factory()->create();
    }
}
