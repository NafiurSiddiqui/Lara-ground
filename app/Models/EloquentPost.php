<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EloquentPost extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'slug', 'excerpt','body', 'category_id'];
    protected $guarded = [];

    //a post has category
    public function category()
    {
        //some methods: hasOne, hasMany, belongsTo,belongsToMany
        return $this->belongsTo(Category::class);
        //you access this as property not callable way.
        //e.g - $post->catogory;
    }

    //post has user
    // public function user()
    // {
      
    //     return $this->belongsTo(User::class); // EloquentCLass->user
        
    // }
    
    public function author()
    {
      
        return $this->belongsTo(User::class, 'user_id'); // name is different than our function name, which won't match our DB column, Hence we the 'user_id' as second argument
        
    }


}
