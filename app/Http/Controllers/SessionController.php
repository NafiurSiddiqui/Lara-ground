<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    /**
     * Display the session create view
     *
     * @return View
     */
    
    public function create(): View
    {
        return view('sessions.create');
    }

    public function store()
    {
        //validate the request
        $attributes = request()->validate([
            'email' => [ 'required', 'email' ],
            'password' => ['required']
        ]);
        //attempt to auth and login the user
        //based on the provide creds
        /**
         * @attempt - takes care of both sceneario of our pseudo-code
         */
        if(auth()->attempt($attributes)) {
            //session fixation [CONCEPT of an attack]
            session()->regenerate();
            //redirect with a flash message
            return redirect('/')->with('success', 'Welcome back!');
        }

        //auth fails

        // return back()
        // ->withInput()
        // ->withErrors([
        //     'email'=>'Your provided credentials could not be verified.'
        // ]);

        //or we can do this on fail

        throw ValidationException::withMessages([
            'email'=>'Your provided credentials could not be verified.'
        ]);

    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'See ya!');
    }
}
