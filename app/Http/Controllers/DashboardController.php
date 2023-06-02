<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortRequest;
use App\Models\Country;
use App\Services\CountryStatisticsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(SortRequest $request): View
{
    $sort = $request->sort;
    $direction = $request->direction ?? 'asc';
    $countries = Country::sortByField($sort, $direction)->get();

    $query = $request->query('query');
    $results = Country::where('name', 'like', '%' . $query . '%')->get();

    $countryStatisticsService = new CountryStatisticsService();
    $statistics = $countryStatisticsService->calculateStatistics();


    return view('dashboard', [
    'countries' => $countries, 
    'user' => auth()->user(), 
    'statistics' => $statistics,
    'results' => $results,
    'query' => $query,
]);
}

}
