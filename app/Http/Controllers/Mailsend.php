<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendmail;
use Mail;

class Mailsend extends Controller
{
    public function Contact()
    {
        return view('contactUs');
    }
    public function sendemail(Request $request)
    {
        $data= ([
            'name'=>'required|string|max:150',
            'email'=>'required|string|max:20', 
            'phone' => 'required|string|max:50',
            'subject' => 'required|string|max:100',
            'content' => 'required'
        ]);
            Mail::to('yoya@email.com')->send(
            new sendmail($data)
        );
            return "mail sent!";
    }
}
