<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EloquentPost extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'slug', 'excerpt','body', 'category_id'];
    protected $guarded = [];

    public function category()
    {
        //some methods: hasOne, hasMany, belongsTo,belongsToMany
        return $this->belongsTo(Category::class);
        //you access this as property not callable way.
        //e.g - $post->catogory;
    }
}
