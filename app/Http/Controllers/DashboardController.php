<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request) : View
    {
        $countries = Country::all(); 
        if ($request->input('sort') == 'location') {
            $countries = $countries->sortBy('name');
        } elseif ($request->input('sort') == 'recovered') {
            $countries = $countries->sortByDesc('recovered', SORT_NUMERIC);
        } elseif ($request->input('sort') == 'deaths') {
            $countries = $countries->sortByDesc('deaths', SORT_NUMERIC);
        } elseif ($request->input('sort') == 'confirmed') {
            $countries = $countries->sortByDesc('confirmed', SORT_NUMERIC);
        }
        return view('dashboard', ['countries' => $countries, 'user' => auth()->user()]);
    }
}
