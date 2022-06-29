<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function __invoke()
    {
        Mail::send(['text' => 'mail.mail'], ['name', 'Web dev'], function($message) {
            $message->to('formerfor84qwedf@gmail.com', 'To Web dev')->subject('Test email');
            $message->from('mybudget@inbox.ru', 'Web dev');
        });
    }
}
