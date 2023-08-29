<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method filter(mixed $request)
 */
class EloquentPost extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'slug', 'excerpt','body', 'category_id'];
    protected $guarded = []; //Mass assign anything
    protected $with = ['category', 'author']; // Now the request will be performed once. this solves n + 1

    // QUERY SCOPE - Look up readme
    //FILTER POST according to the SEARCH , CATEGORY
    public function scopeFilter($query, array $filters): void //EloquentPost::newQuery()->filter()
    {
//        ONE WAY of building this query
//        if ($filters['search'] ?? false) {
//            //in this case look for the title that equals to the search result inside DB.
//            // This is a SQL query - '%value%' => anything that has value in it.
//            $query
//                ->where('title', 'like', '%' . request('search') . '%')
//                ->orWhere('body', 'like', '%' . request('search') . '%');
//        }

        //ANOTHER WAY - For SEARCH
//        $query->when($filters['search'] ?? false, fn($query, $search)=>
//        $query
//            ->where('title', 'like', '%' . $search . '%')
//            ->orWhere('body', 'like', '%' . $search . '%')
//        );

        //ANOTHER WAY - This time it is grouped
        //e. g - WHERE ( 'title' LIKE '%search%' OR 'body' ... )
        //without this the category and search sync breaks.
        //as a result you will get other posts with different category that contain the SEARCH term
        $query->when($filters['search'] ?? false, fn($query, $search)=>
        $query->where(fn($query) =>
        //NOW the following is grouped inside a parenthesis
           $query ->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
        )
        );

        //FOR CATEGORY
        /**
         * SQL for the following would be =
         * SELECT * EloquentPost
         * WHERE EXISTS(
         * SELECT * categories
         * WHERE category.id = EloquentPost.id
         * AND categoreis.slug =
         */

        //👆 TRANSLATING THE SQL 👇 # 1

//        $query->when($filters['category']?? false, fn($query, $category ) =>
//            $query->whereExists(
//                fn($query)=>
//                $query->from('categories')
//                ->whereColumn('categories.id', 'eloquent_posts.category_id')
//                    //👆 This is necessary since 2nd arg is TYPE sensitive.
//                        //it requires integer but we are passing string
//                        //in this case you wanna use `whereColumn`
//                ->where('categories.slug', $category )
//            )
//        );
        //👆 TRANSLATING THE SQL 👇 # 2
        //"Yo, Post, Gimme the post where you have a category that matches the slug

        $query->when($filters['category']?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query)=>
            $query->where('slug', $category )
            )
        );
//        WHEN you need to query, ask, what is the relationshiop between this class
        //and the thing you need to query for.
        //in this case -
        //give me post when the request is for AUTHOR, where post has author
        //that matches up with the 'username'
        $query->when($filters['author']?? false, fn($query, $author)=>
            $query->whereHas('author', fn($query)=>
            $query->where('username', $author)
            )
        );


    }

    //a post has category
    public function category(): BelongsTo
    {

        //some methods: hasOne, hasMany, belongsTo,belongsToMany
        return $this->belongsTo(Category::class);
        //you access this as property not callable way.
        //e.g - $post->catogory;
    }

    //a post has user

    // public function user()
    // {

    //     return $this->belongsTo(User::class); // EloquentCLass->user

    // }

    public function author(): BelongsTo
    {

        return $this->belongsTo(User::class, 'user_id');

        // by default this function will look for author_id which we do not have.
        // But the DB id name is different from our function name, which won't match our DB column, Hence we created the 'user_id' as second argument instead of author_id.

    }


}
