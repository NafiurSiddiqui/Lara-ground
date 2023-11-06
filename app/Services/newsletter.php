<?php

namespace App\Services;

interface Newsletter
{
    public function subscribe(string $email, string $list = null);
}


//This way, anybody implementes this interface will have a CONTRACT that forces them to implement the methods defined here.
