<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CoronaVirusStatisticCommandTest extends TestCase
{
    
    public function test_corona_viures_statistic_command(): void
    {
            Http::fake([
                'https://devtest.ge/countries' => Http::response([
                    [
                        'code' => 'US',
                        'name' => [
                            'en' => 'United States',
                            'ka' => 'აშშ',
                        ],
                    ],
                ]),
            ]);

            Http::fake([
                'https://devtest.ge/get-country-statistics' => Http::response([
                    'confirmed' => 100,
                    'recovered' => 50,
                    'critical' => 10,
                    'deaths' => 5,
                ]),
            ]);

            $this->artisan('fetch:covid-statistics')
                ->expectsOutput('Countries imported successfully!');
    
            $this->assertDatabaseHas('countries', [
                'name' => json_encode([
                    'en' => 'United States',
                    'ka' => 'აშშ',
                ]),
                'confirmed' => 100,
                'recovered' => 50,
                'critical' => 10,
                'deaths' => 5,
            ]);
    
    }
}
