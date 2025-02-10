<?php

use App\Http\Controllers\JWTAuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    $authData = ['email' => 'user@gmail.com', 'password' => 'user1234'];
    $token = JWTAuth::attempt($authData);
    return $token;
});

Route::post('register', [JWTAuthController::class, 'register'])->name('register#user');
Route::post('login', [JWTAuthController::class, 'login'])->name('login#user');
