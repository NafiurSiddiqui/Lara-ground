<?php

namespace App\Providers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
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
        $this->app->bind('foo', function () {
            return 'bar';
        });


        // STAGE-1: BINDING a value to the service containers


        // $this->app->bind(Newsletter::class, function () {
        //     return new Newsletter(
        //         new ApiClient,
        //         'bar'
        //     );
        // });

        //STAGE - 2: Binding the newsletter class here ( Just for the purpose of learning)

        // $this->app->bind(Newsletter::class, function () {
           
        //     $client = new ApiClient();

        //     $client->setConfig([
        //         'apiKey' => config('services.mailchimp.key'),
        //         'server' => 'us20'
        //     ]);


        //     return new Newsletter($client);
        // });


        // STAGE - 3 : Binding Mailchimp Specific newsletter ( At this point we changed the name to MailchimpNewsletter)

        // $this->app->bind(MailchimpNewsletter::class, function () {
           
        //     $client = new ApiClient();

        //     $client->setConfig([
        //         'apiKey' => config('services.mailchimp.key'),
        //         'server' => 'us20'
        //     ]);


        //     return new Newsletter($client);
        // });


        //STAGE - 4
        //Here we define the interface and tell laravel that we don't care about the specific class, just give me the class that implements the contracts ( methods defined inside interface)
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
 */
