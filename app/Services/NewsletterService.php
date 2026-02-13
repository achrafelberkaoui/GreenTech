<?php

namespace App\Services;

class NewsletterService{
    public function emailSend($user){
        return 'email send a ' . $user;
    }
}