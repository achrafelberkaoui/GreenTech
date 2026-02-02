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
    


}