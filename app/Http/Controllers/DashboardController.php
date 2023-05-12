<?php

namespace App\Http\Controllers;

use App\Models\Countires;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // $response = Http::get('https://devtest.ge/countries');
        // $data = $response->json();
        return view('dashboard', ['countries' => Countires::all() , 'user' => $user]);
    }

    public function search(Request $request){
       
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginpage');
    }
}
