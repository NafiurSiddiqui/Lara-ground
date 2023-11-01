<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method filter(mixed $request)
 */
class Post extends Model
{
    use HasFactory;

<<<<<<< HEAD
  
    protected $guarded = []; //Mass assign anything
    protected $with = ['category', 'author'];
    //FILTER POST according to the SEARCH , CATEGORY
    public function scopeFilter($query, array $filters): void //
=======

    protected $guarded = []; //Mass assign anything
    protected $with = ['category', 'author']; // Now the request will be performed once. this solves n + 1

    //FILTER POST according to the SEARCH , CATEGORY
    public function scopeFilter($query, array $filters): void
>>>>>>> main
    {
       
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
        $query->where(
            fn ($query) =>
        
           $query ->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
        )
        );

<<<<<<< HEAD
       
=======
        

>>>>>>> main
        $query->when(
            $filters['category']?? false,
            fn ($query, $category) =>
            $query->whereHas(
                'category',
                fn ($query) =>
            $query->where('slug', $category)
            )
        );
<<<<<<< HEAD
       
=======
        
>>>>>>> main
        $query->when(
            $filters['author']?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
            $query->where('username', $author)
            )
        );


    }

    //a post has category
    public function category(): BelongsTo
    {
<<<<<<< HEAD

        
        return $this->belongsTo(Category::class);
        
    }

    
=======
        return $this->belongsTo(Category::class);
    }

   
>>>>>>> main

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
<<<<<<< HEAD


=======
>>>>>>> main
    }


}
