<?php

namespace Tests\Feature;

use App\Models\Currency;
use App\Models\ExchangeQuote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExchangeQuoteTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Currency::factory()->createMany([
            [
                'code' => 'USD',
            ],
            [
                'code' => 'JPY',
            ],
            [
                'code' => 'GBP',
            ],
            [
                'code' => 'EUR',
            ],
        ]);

        ExchangeQuote::factory()->createMany([
            [
                'key' => 'USDJPY',
                'base_currency_code' => 'USD',
                'quote_currency_code' => 'JPY',
            ],
            [
                'key' => 'USDGBP',
                'base_currency_code' => 'USD',
                'quote_currency_code' => 'GBP',
            ],
            [
                'key' => 'USDEUR',
                'base_currency_code' => 'USD',
                'quote_currency_code' => 'EUR',
            ],
        ]);
    }

    public function testQuoteListRouteWorks()
    {
        $this->get('/api/quotes')
            ->assertOk()
            ->assertJson([
                'status' => 'success',
                'data' => []
            ]);
    }

    public function testQuoteDBInsert()
    {
        $quote = ExchangeQuote::find(1);

        $this->assertEquals('USDJPY', $quote->key);
        $this->assertEquals('USD', $quote->base_currency_code);
        $this->assertEquals('JPY', $quote->quote_currency_code);
    }

    public function testQuoteList()
    {
        $response = $this->get('/api/quotes');
        $response
            ->assertOk()
            ->assertJson([
                'status' => 'success',
                'data' => []
            ])
            ->assertJsonStructure([
                'status',
                'data' => [
                    '*' => [
                        'id',
                        'key',
                        'base_currency_code',
                        'quote_currency_code',
                        // 'exchange_rate',
                        // 'surcharge_percentage',
                        'discount_percentage'
                    ]
                ]
            ]);

        $this->assertCount(3, $response->json()['data']);
    }
}
