<?php

namespace App\Http\Controllers\register;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Mail\UserRegisteredEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index() : View{
        return view('register');
    }

    public function store(StoreUserRequest $user) : RedirectResponse{
        if ($user->input('password') !== $user->input('repeatpassword')) {
            return redirect()->back()->with('error', 'The password and repeat password fields must match.');
        }
        User::create($user->validated());
        Mail::to('tamazi.akhalaia@redberry.ge')->send(new UserRegisteredEmail($user));
        return redirect()->route('confirm-email')->with('success', 'User registered successfully.');
    }
}
