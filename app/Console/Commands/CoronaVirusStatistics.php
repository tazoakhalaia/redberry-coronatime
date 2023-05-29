<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CoronaVirusStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve and Save Global Corona Stats by Country';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://devtest.ge/countries');
        $countries = $response->json();
        foreach ($countries as $country) {
            $countryStatisctis = Http::post('https://devtest.ge/get-country-statistics', [
                'code' => $country['code'],
            ]);
            $countryInfo = $countryStatisctis->json();
            $allCountries = new Country();
            $allCountries->name = json_encode([
                'en' => $country['name']['en'],
                'ka' => $country['name']['ka']
            ]);
            $allCountries->confirmed = $countryInfo['confirmed'];
            $allCountries->recovered = $countryInfo['recovered'];
            $allCountries->critical = $countryInfo['critical'];
            $allCountries->deaths = $countryInfo['deaths'];
            $allCountries->save();
        }

        $this->info('Countries imported successfully!');

    }
}
