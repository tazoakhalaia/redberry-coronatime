<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function index() : View {
        return view('login');
    }

    public function login(LoginRequest $request) : RedirectResponse
{
    $isEmail = filter_var($request->username_or_email, FILTER_VALIDATE_EMAIL);

    if (auth()->attempt([$isEmail ? 'email' : 'username' => $request->username_or_email, 'password' => $request->password], true)) {
        if (!auth()->user()->verify) {
            auth()->logout();
            return redirect()->route('signup')->with('error', 'Please verify your account.');
        }
        return redirect()->route('dashboard');
    }
    return redirect()->route('signup')->with('error', 'Invalid username or password.');
}

}
