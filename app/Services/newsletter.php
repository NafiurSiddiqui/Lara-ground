<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    //subs
    public function subscribe(string $email, string $list = null)
    {

        //optional list if provided for better reading
        $list ??= config('services.mailchimp.lists.subscribers');
        
     
        // $response = $mailchimp->ping->get();
        // $response = $mailchimp->lists->getAllLists();
        // $response = $mailchimp->lists->getListMembersInfo('c20f296763');
        return $this->client()->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
        // dd($response);

    }

    //API connection
    public function client()
    {
        $mailchimp = new ApiClient();

        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us20'
        ]);

    }
}

/**
 * This is to config our MAILCHIMP newsletter in oneplace rather than configging every where we need it.
 */
