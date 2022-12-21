<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; 

class MailController extends Controller
{
    //

    public function sendMail() {
        $name  = 'test name for email';
        
        Mail::send('test.mail', compact('name'), function ($email) {
            $email -> to('lehanh29102019@gmail.com', ''); // error here
        });
       dd('success');
    }
}
