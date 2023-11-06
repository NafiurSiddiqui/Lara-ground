<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {

       
        //validate input field

        request()->validate([
            'email' => ['required','email']
        ]);

        try {

            //we took the mailchimp config to its own class

            $newsletter->subscribe(request('email'));

        } catch (Exception $e) {
         
            throw ValidationException::withMessages(
                ['email' => 'Try a different email'],
            );
        }

        return redirect('/')->with('success', 'You are now signed up for our newsletter!');

    }
}

/**
 * THIS IS a single action controller
 * __invoke magic method is called whenever this class is called
 *
 */
