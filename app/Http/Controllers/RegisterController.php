<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\UserRegisteredEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index() : View{
        return view('register');
    }

    public function register(RegisterRequest $request) : RedirectResponse{
        if ($request->password !== $request->input('repeatpassword')) {
            return redirect()->back()->with('error', 'The password and repeat password fields must match.');
        }
        $userToken = Str::random(40);
        $user = User::create([
            ...$request->validated(), 
            'password' => Hash::make($request->password),
            'token' => $userToken
        ]);
        Mail::to($request->email)->send(new UserRegisteredEmail($request, $user->token));
        return redirect()->route('send-email', ['token' => $user->token])->with('success', 'User registered successfully.');
    }
}
