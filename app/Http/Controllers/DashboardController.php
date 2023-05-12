<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $response = Http::get('https://devtest.ge/countries');
        $data = $response->json();
        return view('dashboard', ['country' => $data]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginpage');
    }
}
