<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function sendResetEmail(Request $request)
    {  
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            $resetToken = Str::random(40);
            $user->token = $resetToken;
            $user->save();
            Mail::to($user->email)->send(new ResetPasswordEmail($resetToken));
        }

        return redirect()->route('recover.password');
    }

    public function showResetForm($recoverToken)
    {
        return view('reset_password.change-password', ['token' => $recoverToken]);
    }

    public function updatePassword(PasswordUpdateRequest $request, $recoverToken)
    {
        $user = User::where('token', $recoverToken)->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('signup')->with('success', 'Password updated successfully. You can now log in with your new password.');
    }
}
