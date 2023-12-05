<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TaskController extends Controller
{
    public function task(Request $request)
    {
        $email = $request->input('email');
        $pwd = $request->input('pwd');
    
        return 'Your email is ' . $email .'<br>' . ' and Your password is '. $pwd;
        
    }
}
