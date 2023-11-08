<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        ////guard the route
        // if(auth()->guest()) {
        //     // abort(403, "You must be logged in to do that");
        //     abort(Response::HTTP_FORBIDDEN);
        // }

        // //if you are logged in but not admin
        // if(auth()->user()?->username !== 'Eddie') {
        //     abort(Response::HTTP_UNAUTHORIZED);
        // }

        //ADVANCED

        if(auth()->user()?->cannot('admin')) {
            abort(Response::HTTP_FORBIDDEN);
        }


        //pass the status of this request cycle to the next. refer to the NOTES->middlewares
        return $next($request);
    }
}


/**
 * We generated our own middleware in order to use this common auth logic over and over again.
 */


/**
 * WE CAN ENTIRELY DELETE THIS AND USE THE HTTP\KERNEL Can method on our routes
 */
