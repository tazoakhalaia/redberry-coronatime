<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
   
    public function login(LoginRequest $request) : RedirectResponse
{
    $input = $request->only('username_or_email', 'password');
    $fieldType = filter_var($request->username_or_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    if (auth()->attempt(array($fieldType => $input['username_or_email'], 'password' => $input['password']))) {
        if (!auth()->user()->verify) {
            auth()->logout();
            return redirect()->route('signup')->with('error', 'Please verify your account.');
        }
        return redirect()->route('dashboard');
    }
    return redirect()->route('signup')
        ->with('error','Invalid username or password.');
}

    public function logout(){
        Auth::logout();
        return redirect()->route('signup');
    }
}
