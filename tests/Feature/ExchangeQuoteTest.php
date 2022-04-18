<?php

namespace Tests\Feature;

use App\Models\ExchangeQuote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExchangeQuoteTest extends TestCase
{
    use RefreshDatabase;

    public function testQuoteListRouteWorks()
    {
        $this->get('/api/quotes')
            ->assertOk()
            ->assertJson([
                'status' => 'success',
                'data' => []
            ]);
    }

    public function testQuoteMassDBInsert()
    {
        ExchangeQuote::factory(30)->create();

        // Rows exist in database
        $this->assertDatabaseCount('exchange_quotes', 30);
    }

    public function testQuoteDBInsert()
    {
        ExchangeQuote::factory()->create([
            'id' => 1,
            'key' => 'USDJPY',
            'currency_code' => 'JPY',
        ]);

        $quote = ExchangeQuote::find(1);

        $this->assertEquals('USDJPY', $quote->key);
        $this->assertEquals('JPY', $quote->currency_code);
    }

    public function testQuoteList()
    {
        ExchangeQuote::factory()->create([
            'id' => 1,
            'key' => 'USDJPY',
            'currency_code' => 'JPY',
        ]);

        ExchangeQuote::factory(30)->create();

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
                        'currency_code',
                        // 'exchange_rate',
                        // 'surcharge_percentage',
                        'discount_percentage'
                    ]
                ]
            ]);

        $this->assertEquals('USDJPY', $response->json()['data'][0]['key']);
        $this->assertCount(31, $response->json()['data']);
    }
}
