<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $guarded = []; //don't wanna deal with fillables here.

    public function post()
    {
        return $this->belongsTo(Post::class); // 1-to-many relationship with Post model (inverse of comments)
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); // foreign key name is user_id
    }
}


/**
 * The method naming convention works as, lara will automatically associate the '*_id' based on the method name.
 * SO, in this case,
 * we did not define a 'post_id' since we have a 'post_id' in db.
 * BUT we do not have an 'author_id' but rather an 'user_id' exists inside DB.BUT our method NAME is 'author', which lara would associate as 'author_id'. In that case, it would not work. Hence, we explicitly define the 'user_id' here.
 *
 *
 * ALWAYS, either guard or define fillable, other wise you will face 'fillable property to mass assignment' exception.
 *
 * Another way you can define is to unrestrict mass assingment in AppServiceProvider boot() method.
 * Model::unguard(),
 * BUT in that case, the input is not guarded. Never ever direactly do something like -
 * Comments::create(request()->all()); You will regret.
 */
