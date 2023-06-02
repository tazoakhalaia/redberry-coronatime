<?php

namespace App\Services;

use App\Models\Country;

class CountryStatisticsService
{
    public function calculateStatistics(): array
    {
        $countries = Country::all();

        $totalConfirmed = $countries->sum('confirmed');
        $totalDeaths = $countries->sum('deaths');
        $totalRecovered = $countries->sum('recovered');

        return [
            'totalConfirmed' => $totalConfirmed,
            'totalDeaths' => $totalDeaths,
            'totalRecovered' => $totalRecovered,
        ];
    }
}
