<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'account_selection' => ['required'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'account_selection' => $request['account_selection'],
            'email' => $request['email'],
            'email_token' => bin2hex(openssl_random_pseudo_bytes(30)),
            'api_token' => bin2hex(openssl_random_pseudo_bytes(30)),
            'password' => Hash::make($request['password']),
        ]);

        return new UserResource($user);
    }
}
