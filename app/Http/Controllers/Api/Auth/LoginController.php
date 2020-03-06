<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApiLoginRequest;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\UserLoginResource;

class LoginController extends Controller
{
    private function credentials($request)
    {
        return $request->only('email', 'password');
    }
    public function login(ApiLoginRequest $request)
    {

        $userExist = Auth::attempt($this->credentials($request));
        if (!$userExist) {
            return Response::make('no user', 404);
        }

        $user = User::where(['email' => $request->email])->first();
        return new UserLoginResource($user);
    }
}
