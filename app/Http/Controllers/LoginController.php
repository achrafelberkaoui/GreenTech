<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
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
    public function showRegister()
    {
       return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $this->authService->register($request);
            return redirect('/');
    }
    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return redirect('login');
    }
}
