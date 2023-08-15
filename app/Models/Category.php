<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        //    always remember the relationship. Ask yourself, does this category belongs to one post? No. A category has many posts. think of it like that.
        return $this->hasMany(EloquentPost::class);
    
    }


}
