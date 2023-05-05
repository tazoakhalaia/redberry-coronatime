<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VerificationController extends Controller
{

        public function verify($token) : RedirectResponse{
            $user = User::where('token', $token)->first();
            $user->verify = true;
            $user->save();
            return redirect()->route('confirm', ['token' => $user->token]);
           
        }
        
}
