<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(private AuthService $authService) 
    {

    }

    public function showLogin()
    {
       return view('auth.login');
    }
    public function autenticate(LoginRequest $request)
    {
        if($this->authService->login($request)){
            return redirect()->intended('/');
        }

        return back()->withErrors(['email'=>'identifiants incorrects']);
    }
}
