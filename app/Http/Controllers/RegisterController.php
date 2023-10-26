<?php

namespace App\Http\Controllers;

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
        request()->validate([
            'name' => ['required', 'min:3'],
            'username'=>['required','unique:users,username'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','confirmed']
        ]);
    }


}

//see more validation rules on https://laravel.com/docs/10.x/validation#available-validation-rules
