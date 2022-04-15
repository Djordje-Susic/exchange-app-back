<?php

namespace Database\Seeders;

use App\Models\ExchangeQuote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeQuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExchangeQuote::factory()->createMany([
            [
                'key' => 'USDJPY',
                'currency_code' => 'JPY',
                'exchange_rate' => 107.17,
                'surcharge_percentage' => 7.5,
            ],
            [
                'key' => 'USDGBP',
                'currency_code' => 'GBP',
                'exchange_rate' => 0.711178,
                'surcharge_percentage' => 5,
                'send_email' => true,
            ],
            [
                'key' => 'USDEUR',
                'currency_code' => 'EUR',
                'exchange_rate' => 0.884872,
                'surcharge_percentage' => 5,
                'discount_percentage' => 2,
            ],

        ]);
    }
}
