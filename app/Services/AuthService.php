<?php

namespace App\services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(Request $request)
    {
        $logUser = $request->only('email', 'password');
        if(Auth::attempt($logUser)){
            $request->session()->regenerate();
            return true;
        }
        return false;
    }
    public function register(Request $request)
    {
       $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role' => 'client'
        ]);

        Auth::login($user);
        $request->session()->regenerate();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }


}