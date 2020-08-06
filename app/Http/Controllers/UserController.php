<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function ResendEmail()
    {

        if(Auth::user()->email_verified_at === NULL)
            Auth::user()->sendEmailVerificationNotification();

        return redirect('/edit/profile');
    }

    public function UpdateUser()
    {
        
    }
}
