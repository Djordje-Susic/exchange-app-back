<?php

namespace Tests\Feature;

use App\Models\Currency;
use App\Models\ExchangeQuote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShouldStoreValidOrder()
    {
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

        $exchangeQuote = ExchangeQuote::factory()->create([
            'key' => 'USDJPY',
            'base_currency_code' => 'USD',
            'quote_currency_code' => 'JPY',
            'exchange_rate' => 107.17,
            'surcharge_percentage' => 7.5,
            'discount_percentage' => 2
        ]);

        $response = $this->post('/api/v1/orders', [
            'key' => 'USDJPY',
            'amount' => 3,
            'quote' => $exchangeQuote->quote
        ]);

        $response
            ->assertOk()
            ->assertJson([
                'status' => 'success',
                'data' => []
            ])
            ->assertJsonStructure([
                'status',
                'data' => [
                    'id',
                    'base_currency_code',
                    'quote_currency_code',
                    'exchange_rate',
                    'surcharge_percentage',
                    'discount_percentage',
                    'amount_purchased',
                    'surcharge_amount',
                    'discount_amount',
                    'amount_paid',
                    'updated_at',
                    'created_at',
                ]
            ]);

        $orderData = $response->json()['data'];

        $this->assertEquals('USD', $orderData['base_currency_code']);
        $this->assertEquals('JPY', $orderData['quote_currency_code']);
        $this->assertEquals('107.17', $orderData['exchange_rate']);
        $this->assertEquals('7.5', $orderData['surcharge_percentage']);
        $this->assertEquals('2', $orderData['discount_percentage']);
        $this->assertEquals('3', $orderData['amount_purchased']);
        $this->assertEquals('24.113249999999997', $orderData['surcharge_amount']);
        $this->assertEquals('6.912465', $orderData['discount_amount']);
        $this->assertEquals('338.710785', $orderData['amount_paid']);
    }
}
