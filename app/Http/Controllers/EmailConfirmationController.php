<?php

namespace App\Http\Controllers;

use App\User;

class EmailConfirmationController extends Controller
{
    public function confirm($token)
    {
        $user = User::where(['email_token' => $token])->first();
        if($user){
            $user->email_verified = true;
            $user->save();
        }
        return redirect('/');
        
    }
}
