<?php

namespace App\Http\Controllers;

use App\Models\Country;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['countries' => Country::all() , 'user' => auth()->user()]);
    }
}
