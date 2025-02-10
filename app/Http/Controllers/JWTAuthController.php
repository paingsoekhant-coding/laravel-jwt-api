<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class JWTAuthController extends Controller
{
    public function register(Request $request)
    {
        // return response($request->all());
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ];
        $user = User::create($userData);
        $token = JWTAuth::fromUser($user);
        return response()->json(['token' => $token]);
    }

    public function login(Request $request)
    {
        $loginData = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $token = JWTAuth::attempt($loginData);
        if (!$token) {
            return "Email & Password does not match!";
        }
        return response()->json(['token' => $token]);
    }
}
