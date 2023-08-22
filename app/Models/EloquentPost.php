<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EloquentPost extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'slug', 'excerpt','body', 'category_id'];
    protected $guarded = []; //Mass assign anything
    protected $with = ['category', 'author']; // Now the request will be performed once. this solves n + 1

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
