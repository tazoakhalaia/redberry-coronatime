<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportCountry extends Command
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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://devtest.ge/countries');
        $countries = $response->json();
        foreach ($countries as $country) {
            $responsePost = Http::post('https://devtest.ge/get-country-statistics', [
                'code' => $country['code'],
            ]);
            $countryInfo = $responsePost->json();
            $allCountry = new Country();
            $allCountry->name = json_encode([
                'en' => $country['name']['en'],
                'ka' => $country['name']['ka']
            ]);
            $allCountry->confirmed = $countryInfo['confirmed'];
            $allCountry->recovered = $countryInfo['recovered'];
            $allCountry->critical = $countryInfo['critical'];
            $allCountry->deaths = $countryInfo['deaths'];
            $allCountry->save();
        }

        $this->info('Countries imported successfully!');

    }
}
