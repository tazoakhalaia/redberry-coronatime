<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class VerificationController extends Controller
{
    public function verify(User $user): RedirectResponse
    {
        $user->verify = true;
        $user->save();
        return redirect()->route('confirm', ['token' => $user->token]);
    }

}
