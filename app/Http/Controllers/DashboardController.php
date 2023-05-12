<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Countires;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['countries' => Countires::all() , 'user' => auth()->user()]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginpage');
    }
}
