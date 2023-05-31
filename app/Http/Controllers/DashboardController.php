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
    
    $totalConfirmed = $countries->sum('confirmed');
    $totalDeaths = $countries->sum('deaths');
    $totalRecovered = $countries->sum('recovered');

    $query = $request->input('query');
    $results = Country::where('name', 'like', '%' . $query . '%')->get();

    return view('dashboard', [
    'countries' => $countries, 
    'user' => auth()->user(), 
    'totalConfirmed' => $totalConfirmed,
    'totalDeaths' => $totalDeaths,
    'totalRecovered' => $totalRecovered,
    'results' => $results,
    'query' => $query,
]);
}

}
