<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortRequest;
use App\Models\Country;
use App\Services\CountryStatisticsService;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(SortRequest $request): View
    {
        $sort = $request->sort;
        $direction = $request->direction ?? 'asc';
        $countries = Country::sortByField($sort, $direction)->get();
        $query = $request->query('query');
        $results = Country::where(function ($queryBuilder) use ($query) {
            if (App::getLocale() === 'en') {
                $queryBuilder->where('name', 'like', '%' . $query . '%');
            } elseif (App::getLocale() === 'ka') {
                $queryBuilder->where('name->ka', 'like', '%' . $query . '%');
            }
        })->get();        
        $statistics = CountryStatisticsService::calculateStatistics();
        return view('dashboard', [
            'countries' => $countries,
            'user' => auth()->user(),
            'statistics' => $statistics,
            'results' => $results,
        ]);
    }
}
