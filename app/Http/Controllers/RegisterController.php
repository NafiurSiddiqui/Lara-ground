<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        // return 'We can register an user!'; TEST

        return view('register.create');
    }

    //deals with FORM value posted here
    public function store()
    {
        // var_dump(request()->all()); //TO SEE THE VALUES SUBMITTED

        $attributes = request()->validate([
            'name' => ['required', 'min:3','max:255'],
            'username'=>['required','min:3', 'max:255','unique:users,username' ],
            'email'=>['required','email','max:255' ],
            'password'=>['required', 'min:7','max:255']
        ]);

        // dd('request submitted successfully');

        User::create($attributes); //in case of success, the values returned from the request validation wil be used to create the user.

        return redirect('/');
    }


}

/**
 * @request()-validate() - In case, this fails, laravel will automatically redirect to the FORM page and the next line of code will never be submitted. In our case, USER won't be created if fails.
 */

//see more validation rules on https://laravel.com/docs/10.x/validation#available-validation-rules


/**
 * unique:users,username' : meaning, look at the table called 'users', and look for the column 'username' and see if the input value already exist.Without this the app will break into SQL integrity issue.
 */
