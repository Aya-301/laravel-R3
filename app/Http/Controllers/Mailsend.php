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
            Mail::to( 'yoya@email.com')->send( new sendmail(
                $request->name,
                $request->email,
                $request->phone,
                $request->subject,
                $request->content,

            ));
            return "mail sent!";
    }
}
