<?php

namespace App\Http\Controllers\register;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index() : View{
        return view('register');
    }

    public function store(Request $request) : RedirectResponse{
        if ($request->input('password') !== $request->input('repeatpassword')) {
            return redirect()->back()->with('error', 'The password and repeat password fields must match.');
        }
        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->username = $request->input('username');
        $user->save();
        
        return redirect()->route('register')->with('success', 'User registered successfully.');
    }
}
