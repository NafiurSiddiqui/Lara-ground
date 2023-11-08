<?php

namespace App\Providers;

use App\Models\User;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // return the value 'bar' of the key 'foo'.
        //this will make this value availble all over the app.
        // $this->app->bind('foo', function () {
        //     return 'bar';
        // });


        $this->app->bind(Newsletter::class, function () {
           
            $client = new ApiClient();

            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us20'
            ]);


            return new MailchimpNewsletter($client);
        });

        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Unrestricts mass assignment
        //Model::unguarded()

        Gate::define('admin', function (User $user) {
            
            return $user->username === 'Eddie'; //TO DEFINE AN ADMIN

        });
    }
}


/**
 * Regitser -
 * when we have a situation where we are providing a dependency inside a constructor of a class, e. g- <string $foo>, Lara won't know how to AR ( Auto Resolve) that. In that case, we can declare such foreign-to-laravel values here inside the register.
 * you can get this value by accessing -
 * app()->get('foo') OR resolve('foo')
 *
 * This is how you store any values inside the SERVICE CONTAINER. In most cases, it will be a KEY=>VALUE pair.
 *
 * In our app's case, we now have the value for the $foo inside our App\Services\Newsletter construct class. Now Lara will be able to resolve this.
 *
 *
 * ## GATE
 *
 * Is a way of telling what people to let in or not.
 */
