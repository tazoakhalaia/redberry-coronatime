<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailResetRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ResetEmailRequest;
use App\Http\Requests\ResetPasswordEmailRequest;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function sendResetEmail(ResetPasswordEmailRequest $request)
    {
        $user = User::where('email', $request->email)->first();
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
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('signup')->with('success', 'Password updated successfully. You can now log in with your new password.');
    }
}
