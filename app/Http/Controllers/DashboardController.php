<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
{
    $sort = $request->input('sort');
    $direction = $request->input('direction', 'asc'); 
    $countries = Country::sortByField($sort, $direction)->get();
    
    return view('dashboard', ['countries' => $countries, 'user' => auth()->user()]);
}

}
