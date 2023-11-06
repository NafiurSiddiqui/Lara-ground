<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{

    public function __construct(
        protected ApiClient $client,
    ) {
        
    }
    //subs
    public function subscribe(string $email, string $list = null)
    {

        //optional list if provided for better reading
        $list ??= config('services.mailchimp.lists.subscribers');
        
        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
   

    }

 //we init the client inside the SERVICE provider register.
}
