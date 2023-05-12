<?php

namespace App\Console\Commands;

use App\Models\Countires;
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
        $countires = $response->json();
        foreach ($countires as $country) {
            $c = new Countires();
            $c->name = json_encode([
                'en' => $country['name']['en'],
                'ka' => $country['name']['ka']
            ]);
            $c->save();
        }

        $this->info('Countries imported successfully!');

    }
}
