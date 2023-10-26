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
}
